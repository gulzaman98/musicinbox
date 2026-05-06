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
                <input type="text" name="search" class="form-control" placeholder="Search song or artist..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" style="border-radius: 20px 0 0 20px;">
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
            // --- UPDATE WALA KAAM YAHAN HAI ---
            
            // 1. Base query banayein
            $sql = "SELECT s.*, ar.artist_name 
                    FROM add_songs s 
                    LEFT JOIN artist ar ON s.artist_id = ar.artist_id";

            // 2. Check karein agar user ne search kiya hai
            if (isset($_GET['search']) && !empty($_GET['search'])) {
                $search = mysqli_real_escape_string($con, $_GET['search']);
                // Query mein WHERE clause add karein
                $sql .= " WHERE s.song_name LIKE '%$search%' OR ar.artist_name LIKE '%$search%'";
            }

            // 3. Last mein ordering add karein
            $sql .= " ORDER BY s.s_id DESC";

            $res = mysqli_query($con, $sql);

            // 4. Check karein agar results mile ya nahi
            if(mysqli_num_rows($res) > 0) {
                foreach($res as $song): 
                    $s_id = $song['s_id'];

                    // Rating nikalne ki logic
                    $rating_q = mysqli_query($con, "SELECT AVG(rating) as avg_r FROM reviews WHERE item_id='$s_id' AND item_type='audio'");
                    $rating_data = mysqli_fetch_assoc($rating_q);
                    $average = round($rating_data['avg_r'], 1);
            ?>            
            
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <div class="single-album-area">
                    <div class="album-thumb">
                        <img src="image_upload/<?= $song['song_image'] ?>" style="height:200px; width:100%; object-fit:cover; border-radius:10px;">
                    </div>      
                    
                    <div class="album-info mt-3 text-center">
                        <h5><?= $song['song_name'] ?></h5>
                        <p><?= $song['artist_name'] ?></p>

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

                        <a href="review.php?type=audio&id=<?= $song['s_id'] ?>" class="btn btn-sm btn-info mb-3" style="font-size: 12px; border-radius: 20px; color:white;">
                             Rate & Review
                        </a>
                    </div>

                    <audio controls style="width: 100%; height: 30px;">
                        <source src="audio/<?= $song['song_audio'] ?>" type="audio/mpeg">
                    </audio>
                </div>
            </div>
            
            <?php 
                endforeach; 
            } else {
                // Agar search match na kare
                echo "<div class='col-12 text-center'><h4 class='mt-5'>No songs found for '" . htmlspecialchars($_GET['search']) . "'</h4></div>";
            }
            ?>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>