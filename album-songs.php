<?php
include "header.php";
include "connection.php";


$album_id = $_GET['id'];


$album_info = mysqli_query($con, "SELECT add_albums.*, artist.artist_name 
 FROM add_albums JOIN artist ON add_albums.artist_id = artist.artist_id 
    WHERE album_id = '$album_id'");
$album = mysqli_fetch_assoc($album_info);
?>

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>Listen to your favorite tracks</p>
        <h2><?php echo $album['album_name']; ?></h2>
    </div>
</section>

<div class="container mt-5 mb-100">
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="image_upload/<?php echo $album['album_image']; ?>" class="img-fluid rounded shadow">
            <h3 class="mt-3"><?php echo $album['album_name']; ?></h3>
            <p class="text-muted">Artist: <?php echo $album['artist_name']; ?></p>
        </div>

        <div class="col-md-8">
            <h4 class="mb-4 text-info">Tracklist</h4>
            
            <?php
            // Sirf is album ke gaane nikalna
            $songs_query = mysqli_query($con, "SELECT * FROM add_songs WHERE album_id = '$album_id'");
            
            if(mysqli_num_rows($songs_query) > 0) {
                while($song = mysqli_fetch_assoc($songs_query)) {
                ?>
                <div class="d-flex align-items-center justify-content-between p-3 mb-3 bg-light rounded shadow-sm">
                    <div>
                        <h6 class="mb-0"><?php echo $song['song_name']; ?></h6>
                    </div>
                    <audio controls style="height: 35px;">
                        <source src="audio/<?php echo $song['song_audio']; ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
                <?php 
                }
            } else {
                echo "<div class='alert alert-warning'>Is album mein abhi koi gaana nahi hai.</div>";
            }
            ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>