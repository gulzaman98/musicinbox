<?php
include "header.php";
?>

<section class="hero-area">
    <div class="hero-slides owl-carousel">
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <div class="slide-img bg-img" style="background-image: url(images/slide3.png);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                            <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                            <a data-animation="fadeInUp" data-delay="500ms" href="albums-store.php" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <div class="slide-img bg-img" style="background-image: url(images/slide4.png);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content text-center">
                            <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                            <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music <span>Colorlib Music</span></h2>
                            <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="latest-albums-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading style-2">
                    <p>See what’s new</p>
                    <h2>Top Artist</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="albums-slideshow owl-carousel">
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "sound");
                    $fetch_artist = mysqli_query($con, "SELECT * FROM artist");
                    foreach($fetch_artist as $artist){
                    ?>
                    <div class="single-album">
                        <img src="image_upload/<?php echo $artist['artist_image'];?>" style="height: 300px; object-fit: cover; object-position:center;" alt="">
                        <div class="album-info">
                            <a href="artist.php?id=<?php echo $artist['artist_id'];?>">
                                <h5><?php echo $artist['artist_name'];?></h5>
                            </a>
                            <p>Top Trending</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading style-2">
                    <p>Listen to the best</p>
                    <h2>New Top Trending Audio Songs</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php
            $audio_sql = "SELECT s.*, a.artist_name 
                          FROM add_songs s 
                          JOIN artist a ON s.artist_id = a.artist_id 
                          JOIN song_year y ON s.year_id = y.year_id 
                          ORDER BY s.s_id DESC 
                          LIMIT 5";
            $all_songs = mysqli_query($con, $audio_sql);

            foreach($all_songs as $song): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-5" style="flex: 0 0 20%; max-width: 20%; padding: 0 10px;">
                    <div class="single-album-area shadow-sm" style="background: #fff; padding: 15px; border-radius: 15px; display: flex; flex-direction: column; min-height: 330px;">
                        <div class="album-thumb">
                            <img src="image_upload/<?= $song['song_image'] ?>" style="height:150px; width:100%; object-fit:cover; border-radius: 12px;">
                        </div>
                        <div class="album-info mt-3 text-center" style="flex-grow: 1;">
                            <h5 style="font-size: 15px; margin-bottom: 5px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $song['song_name'] ?></h5>
                            <p style="font-size: 13px;"><?= $song['artist_name'] ?></p>
                        </div>
                        <div class="audio-player-container" style="width: 100%; overflow: hidden;">
                            <audio controls style="width: 100%; height: 30px;">
                                <source src="audio/<?= $song['song_audio'] ?>" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
     <div class="row">
            <div class="col-12 text-center mt-30">
                <a href="songs.php" class="btn oneMusic-btn">View All Songs <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
</section>

<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading style-2">
                    <p>Watch latest clips</p>
                    <h2>New Top Trending Song's Videos</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php
            // Video Limit 5 for home page
            $v_sql = "SELECT v.*, a.artist_name FROM add_video v 
                      JOIN artist a ON v.artist_id = a.artist_id 
                      JOIN song_year y ON v.year_id = y.year_id 
                      ORDER BY v.video_id DESC LIMIT 5";
            $all_videos = mysqli_query($con, $v_sql);

            foreach($all_videos as $video): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-5" style="flex: 0 0 20%; max-width: 20%; padding: 0 10px;">
                    <div class="single-album-area shadow-sm" style="background: #fff; padding: 15px; border-radius: 15px;">
                        <div class="album-thumb">
                            <img src="image_upload/<?= $video['video_image'] ?>" style="height:150px; width:100%; object-fit:cover; border-radius: 12px;">
                            <div class="play-icon">
                                <a href="viewvideo.php?id=<?= $video['video_id'] ?>" target="_blank">
                                    <span class="icon-play-button"></span>
                                </a>
                            </div>
                        </div>
                        <div class="album-info mt-3 text-center">
                            <h5 style="font-size: 15px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= $video['video_name'] ?></h5>
                            <p style="font-size: 13px;"><?= $video['artist_name'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="row">
            <div class="col-12 text-center mt-30">
                <a href="videosongs.php" class="btn oneMusic-btn">View All Videos <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading white">
                    <p>See what’s new</p>
                    <h2>Feedback</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-form-area">
                   <form action="code.php" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" 
                                       pattern="[A-Za-z ]{3,}" 
                                       title="Sirf letters likhein (Kam se kam 3)" required>
                            </div>
                            
                            <div class="col-md-6 mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Your E-mail" required>
                            </div>

                            <div class="col-12 mb-4">
                                <input type="text" name="contact" class="form-control" placeholder="Subject" required>
                            </div>

                            <div class="col-12 mb-4">
                                <textarea name="message" class="form-control" cols="30" rows="5" 
                                          placeholder="Message (Kam se kam 10 characters)" 
                                          minlength="10" required></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn oneMusic-btn mt-30" type="submit" name="feedback">
                                    Send Feedback <i class="fa fa-angle-double-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>