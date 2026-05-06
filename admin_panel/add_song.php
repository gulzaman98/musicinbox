<?php
include "../connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Songs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <h1 class="text-center mt-2 mb-3 text-info">Add Songs</h1>

    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto">
          <form action="../code.php" method="post" enctype="multipart/form-data">
            <label class="h5 text-info">Enter Song Name :</label>
            <input type="text" name="song-name" placeholder="Enter Song Name" class="form-control mb-3" required>
            
            <label class="h5 text-info">Upload Song Image :</label>
            <input type="file" name="song-image" class="form-control mb-3">

            <label class="h5 text-info">Upload Song Audio :</label>
            <input type="file" name="song-audio" class="form-control mb-3">

            <label class="h5 text-info">Select Album :</label>
            <select name="album-name" class="form-select mb-3" required>
              <option value="">Select album name</option>
              <?php
              $albums = mysqli_query($con, "SELECT * FROM add_albums");
              foreach($albums as $a){
                  echo "<option value='{$a['album_id']}'>{$a['album_name']}</option>";
              }
              ?>
            </select>

            <label class="h5 text-info">Select Artist :</label>
            <select name="artist-name" class="form-select mb-3" required>
              <option value="">Select artist name</option>
              <?php
              $artists = mysqli_query($con, "SELECT * FROM artist");
              foreach($artists as $ar){
                  echo "<option value='{$ar['artist_id']}'>{$ar['artist_name']}</option>";
              }
              ?>
            </select>

            <label class="h5 text-info">Select Year :</label>
            <select name="song-year" class="form-select mb-3" required>
              <option value="">Select Year</option>
              <?php
              $years = mysqli_query($con, "SELECT * FROM song_year");
              foreach($years as $y){
                  echo "<option value='{$y['year_id']}'>{$y['release_year']}</option>";
              }
              ?>
            </select>

            <div class="d-grid gap-2">
              <button class="btn btn-info mt-3" type="submit" name="add_song">Add Song</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- View Songs -->
    <h1 class="text-center mt-5">View Songs</h1>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Song Name</th>
                <th>Image</th>
                <th>Audio</th>
                <th>Album</th>
                <th>Artist</th>
                <th>Year</th>
                <th colspan="2" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $songs = mysqli_query($con,"SELECT s.*, a.album_name, ar.artist_name, y.release_year
                                          FROM add_songs s
                                          LEFT JOIN add_albums a ON s.album_id = a.album_id
                                          LEFT JOIN artist ar ON s.artist_id = ar.artist_id
                                          LEFT JOIN song_year y ON s.year_id = y.year_id");
              foreach($songs as $s){
              ?>
                <tr>
                  <td><?php echo $s['s_id']; ?></td>
                  <td><?php echo $s['song_name']; ?></td>
                  <td><img src="../image_upload/<?php echo $s['song_image'];?>" width="50" height="50"></td>
                  <td><audio src="../audio/<?php echo $s['song_audio'];?>" controls></audio></td>
                  <td><?php echo $s['album_name']; ?></td>
                  <td><?php echo $s['artist_name']; ?></td>
                  <td><?php echo $s['release_year']; ?></td>
                  
                  <!-- Update Button -->
                  <td>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateSong<?php echo $s['s_id']; ?>">Update</button>
                  </td>
                  <!-- Delete Button -->
                  <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSong<?php echo $s['s_id']; ?>">Delete</button>
                  </td>
                </tr>

                <!-- Update Modal -->
                <div class="modal fade" id="updateSong<?php echo $s['s_id']; ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="../code.php" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Song</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id" value="<?php echo $s['s_id']; ?>">
                          <label>Song Name</label>
                          <input type="text" name="song-name" class="form-control mb-2" value="<?php echo $s['song_name']; ?>" required>
                          
                          <label>Song Image</label>
                          <input type="file" name="song-image" class="form-control mb-2">
                          
                          <label>Song Audio</label>
                          <input type="file" name="song-audio" class="form-control mb-2">
                          
                          <label>Album</label>
                          <select name="album-name" class="form-select mb-2" required>
                            <?php
                            $albums = mysqli_query($con, "SELECT * FROM add_albums");
                            foreach($albums as $a){
                                $selected = ($a['album_id'] == $s['album_id']) ? "selected" : "";
                                echo "<option value='{$a['album_id']}' $selected>{$a['album_name']}</option>";
                            }
                            ?>
                          </select>

                          <label>Artist</label>
                          <select name="artist-name" class="form-select mb-2" required>
                            <?php
                            $artists = mysqli_query($con, "SELECT * FROM artist");
                            foreach($artists as $ar){
                                $selected = ($ar['artist_id'] == $s['artist_id']) ? "selected" : "";
                                echo "<option value='{$ar['artist_id']}' $selected>{$ar['artist_name']}</option>";
                            }
                            ?>
                          </select>

                          <label>Year</label>
                          <select name="song-year" class="form-select mb-2" required>
                            <?php
                            $years = mysqli_query($con, "SELECT * FROM song_year");
                            foreach($years as $y){
                                $selected = ($y['year_id'] == $s['year_id']) ? "selected" : "";
                                echo "<option value='{$y['year_id']}' $selected>{$y['release_year']}</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="update_song" class="btn btn-info">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteSong<?php echo $s['s_id']; ?>" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="../code.php" method="post">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Song</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this song?
                          <input type="hidden" name="id" value="<?php echo $s['s_id']; ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="delete_song" class="btn btn-danger">Delete</button>
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