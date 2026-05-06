<?php
include "header.php";
include "connection.php";
?>
<section class="artist-list-section section-padding-100">
    <div class="container">
        <?php
        $artist_query = "SELECT * FROM artist ORDER BY artist_name ASC";
        $artist_result = mysqli_query($con, $artist_query);

        if (mysqli_num_rows($artist_result) > 0) {
            
            while ($row = mysqli_fetch_assoc($artist_result)) {
                $aid = $row['artist_id'];
                $a_name = $row['artist_name'];
                $a_img = $row['artist_image'];
                $a_desc = $row['artist_description'];
        ?>
                <div class="row align-items-center mb-50" style="background: #f9f9f9; padding: 25px; border-radius: 12px; border: 1px solid #eee;">
                    <div class="col-lg-4 col-md-5 text-center">
                        <img src="image_upload/<?php echo $a_img; ?>" alt="<?php echo $a_name; ?>" style="width: 280px; height: 280px; object-fit: cover; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="artist-info-text">
                            <h2 style="font-weight: 600; color: #222; margin-bottom: 15px;"><?php echo $a_name; ?></h2>
                            <p style="font-size: 15px; line-height: 1.7; color: #555;">
                                <?php echo !empty($a_desc) ? $a_desc : "Artist details will be updated soon."; ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12 mb-30">
                        <h4 style="border-left: 4px solid #ed3237; padding-left: 15px;">Latest Tracks</h4>
                    </div>
                    
                    <?php
                    // Songs fetch karne ki optimized query
                    $song_sql = "SELECT s.*, y.release_year FROM add_songs s LEFT JOIN song_year y ON s.year_id = y.year_id WHERE s.artist_id = '$aid'";
                    
                    $song_res = mysqli_query($con, $song_sql);

                    if(mysqli_num_rows($song_res) > 0) {
                        while($song = mysqli_fetch_assoc($song_res)){
                    ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="single-song-item mb-40">
                                <div class="song-thumb">
                                    <img src="image_upload/<?php echo $song['song_image'];?>" alt="" style="width:100%; height:220px; object-fit:cover; border-radius: 5px;">
                                </div>
                                <div class="song-details mt-15">
                                    <h5 style="margin-bottom: 5px;"><?php echo $song['song_name'];?></h5>
                                    <p class="text-danger" style="font-size: 13px; font-weight: bold;"><?php echo $song['release_year'];?></p>
                                    <audio src="audio/<?php echo $song['song_audio']; ?>" controls style="width: 100%; height: 35px; margin-top: 10px;"></audio>
                                </div>
                            </div>
                        </div>
                    <?php 
                        } 
                    } else {
                        echo "<div class='col-12'><p class='alert alert-light'>No tracks available for this artist.</p></div>";
                    }
                    ?>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <hr style="margin: 40px 0; border-top: 1px dashed #ccc;">
                    </div>
                </div>

        <?php 
            }
        } else {
            echo "<div class='text-center py-5'><h3>No artists found in the records.</h3></div>";
        }
        ?>
    </div>
</section>
<?php include "footer.php"; ?>