<?php 
include "header.php"; 
?>

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg); height: 350px;">
    <div class="brcumbContent text-center">
        <p style="color:white">See what’s new</p>
        <h2 style="color:white">Latest Songs</h2>
    </div>
</section>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search song or artist..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" style="border-radius: 20px 0 0 20px;">
                <button type="submit" class="btn btn-info" style="border-radius: 0 20px 20px 0; color:white;">Search</button>
            </form>
            <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                <div class="text-center mt-2">
                    <a href="songs.php" class="text-danger small">Clear Search Results</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">
            <?php
            // Optimized Query: JOIN aur Group By ke saath rating calculate karna
        $sql = "SELECT s.*, ar.artist_name, y.release_year, AVG(rv.rating) as avg_r 
        FROM add_songs s 
        LEFT JOIN artist ar ON s.artist_id = ar.artist_id 
        LEFT JOIN song_year y ON s.year_id = y.year_id 
        LEFT JOIN reviews rv ON s.s_id = rv.item_id AND rv.item_type = 'audio' ";

          if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = mysqli_real_escape_string($con, $_GET['search']);
        $sql .= " WHERE (s.song_name LIKE '%$search%' 
              OR ar.artist_name LIKE '%$search%' 
              OR y.release_year LIKE '%$search%') ";


}

           $sql .= " GROUP BY s.s_id ORDER BY s.s_id DESC";
            $res = mysqli_query($con, $sql);        

            if(mysqli_num_rows($res) > 0) {
                while($song = mysqli_fetch_assoc($res)): 
                    $average = round($song['avg_r'], 1);
            ?>            
            
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <div class="single-album-area p-3 shadow-sm" style="border-radius: 15px; background: #fff;">
                    <div class="album-thumb">
                        <img src="image_upload/<?= $song['song_image'] ?>" style="height:200px; width:100%; object-fit:cover; border-radius:10px;">
                    </div>      
                    
                    <div class="album-info mt-3 text-center">
                        <h6 class="mb-1"><?= $song['song_name'] ?></h6>
                        <p class="text-muted mb-2" style="font-size: 14px;"><?= $song['artist_name'] ?></p>

                        <div class="rating-display mb-2">
                            <span style="color: #f1c40f; font-size: 14px;">
                                <?php 
                                    if($average > 0) {
                                        // Stars logic
                                        for($i=1; $i<=5; $i++) {
                                            echo ($i <= round($average)) ? '★' : '☆';
                                        }
                                        echo " ($average)";
                                    } else {
                                        echo "No Ratings";
                                    }
                                ?>
                            </span>
                        </div>

                        <a href="review.php?type=audio&id=<?= $song['s_id'] ?>" class="btn btn-sm btn-outline-info mb-3" style="font-size: 11px; border-radius: 20px;">
                             Rate & Review
                        </a>
                    </div>

                    <audio controls style="width: 100%; height: 35px;">
                        <source src="audio/<?= $song['song_audio'] ?>" type="audio/mpeg">
                    </audio>
                </div>
            </div>
            
            <?php 
                endwhile; 
            } else {
                echo "<div class='col-12 text-center'><h4 class='mt-5'>No songs found.</h4></div>";
            }
            ?>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>