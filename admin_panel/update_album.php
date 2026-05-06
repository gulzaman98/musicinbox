<?php
include "../connection.php"; // Folder structure ke mutabiq path check kar lein

// 1. URL se ID pakadna
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $fetch_data = mysqli_query($con, "SELECT * FROM add_albums WHERE album_id = '$id'");
    $row = mysqli_fetch_assoc($fetch_data);
} else {
    header("location: public.php?add_albums");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update Album - MusicInbox</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap & Styles (DASHMIN ki tarah) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Apna path check karein -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 justify-content-center">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4 shadow-sm">
                    <h3 class="mb-4 text-center">Update Album</h3>
                    
                    <!-- Form start -->
                    <form action="../code.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Hidden ID Field: Iske baghair update nahi hoga -->
                        <input type="hidden" name="id" value="<?php echo $row['album_id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Album Name</label>
                            <input type="text" class="form-control" name="album-name" value="<?php echo $row['album_name']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Release Year</label>
                            <input type="number" class="form-control" name="album_year" value="<?php echo $row['album_year']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Artist</label>
                            <select name="artist_id" class="form-select" required>
                                <?php
                                $artists = mysqli_query($con, "SELECT * FROM artist");
                                while($artist_row = mysqli_fetch_assoc($artists)){
                                    $selected = ($artist_row['artist_id'] == $row['artist_id']) ? "selected" : "";
                                    echo "<option value='".$artist_row['artist_id']."' $selected>".$artist_row['artist_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 text-center">
                            <p>Current Image:</p>
                            <img src="../image_upload/<?php echo $row['album_image']; ?>" width="100" class="rounded mb-2 shadow-sm">
                            <input type="file" class="form-control" name="album_image">
                            <small class="text-muted">Nayi image select karein agar tabdeel karni hai</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" name="update_album" class="btn btn-primary w-100">Save Changes</button>
                            <a href="public.php?add_albums" class="btn btn-secondary w-100">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>