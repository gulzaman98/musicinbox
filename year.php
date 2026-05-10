<?php
include "header.php";
include 'connection.php'; 

// 1. Saare saal fetch karne ke liye (Buttons ke liye)
$sql_years = "SELECT * FROM song_year ORDER BY release_year DESC";
$result_years = mysqli_query($con, $sql_years);
?>

<style>
    .years-container { padding: 40px; text-align: center; border-bottom: 1px solid #ddd; }
    .year-link { 
        display: inline-block; 
        padding: 12px 25px; 
        background: black; 
        color: white; 
        text-decoration: none; 
        border-radius: 8px; 
        margin: 10px;
        font-weight: bold;
        transition: 0.3s;
    }
    .year-link:hover { background: #333; color: white; transform: scale(1.05); }
    .songs-display { padding: 40px; }
    .song-card { border: 1px solid #eee; padding: 15px; margin-bottom: 10px; border-radius: 5px; background: #f9f9f9; }
</style>

<div class="years-container">
    <h2>Browse Songs by Year</h2>
    <?php
    if ($result_years && mysqli_num_rows($result_years) > 0) {
        while($row = mysqli_fetch_assoc($result_years)) {
            ?>
            <a href="year.php?y_id=<?php echo $row['year_id']; ?>" class="year-link">
                <?php echo $row['release_year']; ?>
            </a>
            <?php
        }
    } 
    ?>
</div>

<div class="songs-display">
    <?php
    if (isset($_GET['y_id'])) {
        $selected_year_id = $_GET['y_id'];

        // 1. Audio Songs fetch karein
        $sql_audio = "SELECT * FROM add_songs WHERE year_id = '$selected_year_id'";
        $result_audio = mysqli_query($con, $sql_audio);

        // 2. Video Songs fetch karein
        $sql_video = "SELECT * FROM add_video WHERE year_id = '$selected_year_id'";
        $result_video = mysqli_query($con, $sql_video);

        echo "<h3>Content for Selected Year:</h3><br>";

        // --- AUDIO SECTION ---
        if (mysqli_num_rows($result_audio) > 0) {
            echo "<h4>Audio Songs</h4>";
           // --- AUDIO SECTION ---
while ($audio = mysqli_fetch_assoc($result_audio)) {
    ?>
   <div class="song-card d-flex align-items-center mb-3 p-3 shadow-sm bg-white rounded">
    <div class="song-thumbnail me-3">
        <img src="images/<?php echo $audio['song_image']; ?>" 
             alt="song" 
             style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
    </div>

    <div class="song-details flex-grow-1">
        <h5 class="mb-1"><?php echo $audio['song_name']; ?></h5>
        
        <audio controls style="width: 100%;">
            <source src="audio/<?php echo $audio['song_audio']; ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>
</div>
    <?php
}
        }

        // --- VIDEO SECTION ---
       // --- VIDEO SECTION ---
// --- VIDEO SECTION ---
if (mysqli_num_rows($result_video) > 0) {
    echo "<h4 class='mt-5'>Video Songs</h4>";
    
    // Updated Query: add_video aur artist table ko join kiya hai
    $sql_video = "SELECT add_video.*, artist.artist_name 
                  FROM add_video 
                  LEFT JOIN artist ON add_video.artist_id = artist.artist_id 
                  WHERE year_id = '$selected_year_id'";
    $result_video = mysqli_query($con, $sql_video);

    while ($video = mysqli_fetch_assoc($result_video)) {
        ?>
        <div class="song-card mb-4 p-3 shadow-sm bg-white rounded">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="images/<?php echo $video['video_image']; ?>" 
                         alt="thumbnail" 
                         class="img-fluid rounded mb-2" 
                         style="width: 100%; height: 180px; object-fit: cover;">
                    
                    <h5 class="mb-1 text-dark"><?php echo $video['video_name']; ?></h5>
                    <p class="text-muted" style="font-size: 14px;">
                        <i class="fa fa-user"></i> Artist: <?php echo $video['artist_name'] ? $video['artist_name'] : "Unknown Artist"; ?>
                    </p>
                </div>

                <div class="col-md-8">
                    <video width="100%" height="auto" controls class="rounded shadow-sm">
                        <source src="video/<?php echo $video['add_video']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
        <?php
    }
}

        // Agar dono tables khali hon
        if (mysqli_num_rows($result_audio) == 0 && mysqli_num_rows($result_video) == 0) {
            echo "<p>Is saal ka koi audio ya video content nahi mila.</p>";
        }

    } else {
        echo "<p class='text-center text-muted'>Please click on a year to see content.</p>";
    }
    ?>
</div>

<?php 
include "footer.php";
?>