<?php 
include "header.php"; 
?>

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg); height: 350px;">
    <div class="brcumbContent text-center">
        <p style="color:white">Watch latest clips</p>
        <h2 style="color:white">Video Songs</h2>
    </div>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search video or artist..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="border-radius: 20px 0 0 20px;">
                <button type="submit" class="btn btn-info" style="border-radius: 0 20px 20px 0; color:white;">Search</button>
            </form>
            <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                <div class="text-center mt-2">
                    <a href="videosongs.php" class="text-danger small">Clear Search Results</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">

            <?php
            // --- SEARCH LOGIC START ---
           $video_sql = "SELECT v.*, ar.artist_name, y.release_year 
              FROM add_video v 
              LEFT JOIN artist ar ON v.artist_id = ar.artist_id
              LEFT JOIN song_year y ON v.year_id = y.year_id";

        if(isset($_GET['search']) && !empty($_GET['search'])) {
         $search = mysqli_real_escape_string($con, $_GET['search']);
            // Ab ye Video Name, Artist Name aur Release Year teeno mein search karega
            $video_sql .= " WHERE v.video_name LIKE '%$search%' 
                    OR ar.artist_name LIKE '%$search%' 
                    OR y.release_year LIKE '%$search%'";
}

            $video_sql .= " ORDER BY v.video_id DESC";
            // --- SEARCH LOGIC END ---

            $video_res = mysqli_query($con, $video_sql);

            if(mysqli_num_rows($video_res) > 0) {
                foreach($video_res as $video): 
                    $v_id = $video['video_id'];

                    // Average Rating query
                    $rating_q = mysqli_query($con, "SELECT AVG(rating) as avg_r FROM reviews WHERE item_id='$v_id' AND item_type='video'");
                    $rating_data = mysqli_fetch_assoc($rating_q);
                    $average = round($rating_data['avg_r'], 1);
                ?>
                
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    <div class="single-album-area">
                        <div class="album-thumb">
                            <img src="image_upload/<?= $video['video_image'] ?>" style="height:200px; width:100%; object-fit:cover; border-radius:10px;">
                            <div class="play-icon">
                                <a href="viewvideo.php?id=<?= $video['video_id'] ?>" target="_blank">
                                    <span class="icon-play-button"></span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="album-info mt-3 text-center">
                            <h5><?= $video['video_name'] ?></h5>
                            <p><?= $video['artist_name'] ?></p>

                            <div class="rating-display mb-2">
                                <span style="color: #f1c40f;">
                                    <?php 
                                        if($average > 0) {
                                            echo str_repeat('★', floor($average)) . " ($average)";
                                        } else {
                                            echo "No Ratings";
                                        }
                                    ?>
                                </span>
                            </div>

                            <a href="review.php?type=video&id=<?= $video['video_id'] ?>" class="btn btn-sm btn-info mb-2" style="font-size: 12px; border-radius: 20px; color:white;">
                                 Rate & Review
                            </a>
                        </div>
                    </div>
                </div>

                <?php endforeach; 
            } else {
                echo "<div class='col-12 text-center'><h4>No videos found for this search.</h4></div>";
            }
            ?>

        </div>
    </div>
</section>

<?php include "footer.php"; ?>