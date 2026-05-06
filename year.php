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
            while ($audio = mysqli_fetch_assoc($result_audio)) {
                ?>
                <div class="song-card">
                    <strong><?php echo $audio['song_name']; ?></strong>
                </div>
                <?php
            }
        }

        // --- VIDEO SECTION ---
        if (mysqli_num_rows($result_video) > 0) {
            echo "<h4>Video Songs</h4>";
            while ($video = mysqli_fetch_assoc($result_video)) {
                ?>
                <div class="song-card">
                    <strong><?php echo $video['video_name']; ?></strong>
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