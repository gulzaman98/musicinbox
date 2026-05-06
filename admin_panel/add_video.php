<?php
include "../connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Video Songs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <h1 class="text-center mt-2 mb-3 text-info">Add Video Songs</h1>

    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
          <form action="../code.php" method="post" enctype="multipart/form-data">
            <label class="h5 text-info">Enter Song Name :</label>
            <input type="text" name="video-name" placeholder="Enter Song Name" class="form-control mb-3">

            <label class="h5 text-info">Upload Song Image :</label>
            <input type="file" name="video-image" class="form-control mb-3">

            <label class="h5 text-info">Upload Song Video :</label>
            <input type="file" name="song-video" class="form-control mb-3">

            <select name="album-name" class="form-select mb-3">
                <option value="">Select Album Name</option>
                <?php
                $albums = mysqli_query($con, "SELECT * FROM add_albums");
                foreach($albums as $a){
                    echo "<option value='{$a['album_id']}'>{$a['album_name']}</option>";
                }
                ?>
            </select>

            <select name="artist-name" class="form-select mb-3">
                <option value="">Select Artist Name</option>
                <?php
                $artists = mysqli_query($con, "SELECT * FROM artist");
                foreach($artists as $ar){
                    echo "<option value='{$ar['artist_id']}'>{$ar['artist_name']}</option>";
                }
                ?>
            </select>

            <select name="song-year" class="form-select mb-3">
                <option value="">Select Year</option>
                <?php
                $years = mysqli_query($con, "SELECT * FROM song_year");
                foreach($years as $y){
                    echo "<option value='{$y['year_id']}'>{$y['release_year']}</option>";
                }
                ?>
            </select>

            <div class="d-grid gap-2">
              <button class="btn btn-info mt-3" type="submit" name="add_video">Add Video Song</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- View Videos -->
    <h1 class="text-center mt-5">View Video Songs</h1>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Song Id</th>
                <th>Song Name</th>
                <th>Image</th>
                <th>Video</th>
                <th>Album</th>
                <th>Artist</th>
                <th>Year</th>
                <th colspan="2" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $videos = mysqli_query($con,"SELECT v.*, a.album_name, ar.artist_name, y.release_year
                                           FROM add_video v
                                           LEFT JOIN add_albums a ON v.album_id = a.album_id
                                           LEFT JOIN artist ar ON v.artist_id = ar.artist_id
                                           LEFT JOIN song_year y ON v.year_id = y.year_id");
              foreach($videos as $v){
              ?>
                <tr>
                  <td><?php echo $v['video_id']; ?></td>
                  <td><?php echo $v['video_name']; ?></td>
                  <td><img src="../image_upload/<?php echo $v['video_image'];?>" width="50" height="50"></td>
                  <td><video src="../video/<?php echo $v['add_video'];?>" controls width="300"></video></td>
                  <td><?php echo $v['album_name']; ?></td>
                  <td><?php echo $v['artist_name']; ?></td>
                  <td><?php echo $v['release_year']; ?></td>

                  <td>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateVideo<?php echo $v['video_id']; ?>">Update</button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteVideo<?php echo $v['video_id']; ?>">Delete</button>
                  </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updateVideo<?php echo $v['video_id']; ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="../code.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Video Song</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $v['video_id']; ?>">

                          <label>Song Name</label>
                          <input type="text" name="video-name" class="form-control mb-2" value="<?php echo $v['video_name']; ?>" required>

                          <label>Song Image</label>
                          <input type="file" name="video-image" class="form-control mb-2">

                          <label>Song Video</label>
                          <input type="file" name="song-video" class="form-control mb-2">

                          <label>Album</label>
                          <select name="album-name" class="form-select mb-2">
                            <?php
                            $albums = mysqli_query($con, "SELECT * FROM add_albums");
                            foreach($albums as $a){
                                $sel = ($a['album_id'] == $v['album_id']) ? "selected" : "";
                                echo "<option value='{$a['album_id']}' $sel>{$a['album_name']}</option>";
                            }
                            ?>
                          </select>

                          <label>Artist</label>
                          <select name="artist-name" class="form-select mb-2">
                            <?php
                            $artists = mysqli_query($con, "SELECT * FROM artist");
                            foreach($artists as $ar){
                                $sel = ($ar['artist_id'] == $v['artist_id']) ? "selected" : "";
                                echo "<option value='{$ar['artist_id']}' $sel>{$ar['artist_name']}</option>";
                            }
                            ?>
                          </select>

                          <label>Year</label>
                          <select name="song-year" class="form-select mb-2">
                            <?php
                            $years = mysqli_query($con, "SELECT * FROM song_year");
                            foreach($years as $y){
                                $sel = ($y['year_id'] == $v['year_id']) ? "selected" : "";
                                echo "<option value='{$y['year_id']}' $sel>{$y['release_year']}</option>";
                            }
                            ?>
                          </select>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="update_video" class="btn btn-info">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteVideo<?php echo $v['video_id']; ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="../code.php" method="post">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Video Song</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this video song?
                          <input type="hidden" name="id" value="<?php echo $v['video_id']; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="delete_video" class="btn btn-danger">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>