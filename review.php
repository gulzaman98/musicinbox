<?php 
include "header.php"; 
$id = $_GET['id'];
$type = $_GET['type'];

if($type == 'audio') {
    $res = mysqli_query($con, "SELECT song_name as name FROM add_songs WHERE s_id='$id'");
} else {
    $res = mysqli_query($con, "SELECT video_name as name FROM add_video WHERE video_id='$id'");
}
$item = mysqli_fetch_assoc($res);
?>

<div class="container" style="padding: 100px 0;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h4 class="text-center">Rate: <?= $item['name'] ?></h4>
                <form action="submit_review.php" method="POST">
                    <input type="hidden" name="item_id" value="<?= $id ?>">
                    <input type="hidden" name="item_type" value="<?= $type ?>">
                    
                    <div class="form-group mb-3">
                        <label>Your Name</label>
                        <input type="text" name="u_name" class="form-control">
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
                        <textarea name="comment" class="form-control" rows="4"></textarea>
                    </div>

                    <button type="submit" name="submit_review" class="btn btn-info w-100">Submit Review</button>
                    <a href="songs.php" class="btn btn-warning w-100">Back</a>                    
                </form>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>