<?php 
include "header.php"; 
$id = mysqli_real_escape_string($con, $_GET['id']); // Security ke liye escape kiya
$type = mysqli_real_escape_string($con, $_GET['type']);

if($type == 'audio') {
    $res = mysqli_query($con, "SELECT song_name as name FROM add_songs WHERE s_id='$id'");
} else {
    $res = mysqli_query($con, "SELECT video_name as name FROM add_video WHERE video_id='$id'");
}
$item = mysqli_fetch_assoc($res);
?>

<div class="container" style="padding: 50px 0;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow mb-5">
                <h4 class="text-center">Rate: <?= $item['name'] ?></h4>
                <form action="submit_review.php" method="POST">
                    <input type="hidden" name="item_id" value="<?= $id ?>">
                    <input type="hidden" name="item_type" value="<?= $type ?>">
                    
                    <div class="form-group mb-3">
                        <label>Your Name</label>
                        <input type="text" name="u_name" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Rating (1 to 5)</label>
                        <select name="rating" class="form-control">
                            <option value="5">⭐⭐⭐⭐⭐ (Excellent)</option>
                            <option value="4">⭐⭐⭐⭐ (Good)</option>
                            <option value="3">⭐⭐⭐ (Average)</option>
                            <option value="2">⭐⭐ (Fair)</option>
                            <option value="1">⭐ (Poor)</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Review</label>
                        <textarea name="comment" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" name="submit_review" class="btn btn-info w-100 mb-2" style="color:white;">Submit Review</button>
                    <a href="songs.php" class="btn btn-warning w-100" style="color:white;">Back</a>
                </form>
            </div>

            <div class="reviews-list">
                <h5 class="mb-4 border-bottom pb-2">Recent Reviews for this <?= ucfirst($type) ?></h5>
                
                <?php
                // Database se is specific song/video ke reviews fetch karna
                // Note: Check karein ke column names aapke table 'reviews' se match karte hain
                $rev_query = "SELECT * FROM reviews WHERE item_id = '$id' AND item_type = '$type' ORDER BY r_id DESC";
                $rev_result = mysqli_query($con, $rev_query);

                if(mysqli_num_rows($rev_result) > 0) {
                    while($row = mysqli_fetch_assoc($rev_result)) {
                        ?>
                        <div class="card mb-3 border-0 shadow-sm" style="background-color: #f8f9fa;">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-primary mb-1"><?= htmlspecialchars($row['user_name']) ?></h6>
                                    <small class="text-muted"><?= date('d M, Y', strtotime($row['created_at'])) ?></small>
                                </div>
                                <div class="mb-2" style="color: #f1c40f; font-size: 12px;">
                                    <?php 
                                        for($i=1; $i<=5; $i++) {
                                            echo ($i <= $row['rating']) ? '★' : '☆';
                                        }
                                    ?>
                                </div>
                                <p class="mb-0 text-dark" style="font-size: 14px;">
                                     "<?= htmlspecialchars($row['comment']) ?>"
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<div class='text-center text-muted'><p>No reviews yet. Be the first to review!</p></div>";
                }
                ?>
            </div>
            </div>
    </div>
</div>

<?php include "footer.php"; ?>