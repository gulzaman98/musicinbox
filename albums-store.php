<?php
include "header.php";
include "connection.php";
?>

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <h2>Latest Albums</h2>
    </div>
</section>

<div class="container mt-5 mb-100">
    <div class="row">
        <?php
        // Join query taake artist name bhi show ho
        $fetchalbum = mysqli_query($con,"SELECT add_albums.*, artist.artist_name 
                                         FROM add_albums 
                                         JOIN artist ON add_albums.artist_id = artist.artist_id");
        while($album = mysqli_fetch_assoc($fetchalbum)){
        ?>
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="single-album-area shadow-sm p-2 text-center">
                <div class="album-thumb">
                    <img src="image_upload/<?php echo $album['album_image']; ?>" style="height:180px; width:100%; object-fit:cover;">
                    <div class="play-icon">
                        <a href="album-songs.php?id=<?php echo $album['album_id']; ?>"><span class="icon-play-button"></span></a>
                    </div>
                </div>
                <div class="album-info mt-2">
                    <h5><?php echo $album['album_name']; ?></h5>
                    <p><?php echo $album['artist_name']; ?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php"; ?>