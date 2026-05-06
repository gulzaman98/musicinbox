<?php
include "../connection.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Artists</title>
  </head>
  <body>

  <h1 class="text-center mt-2">Add Artist</h1>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
              <form action="../code.php" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Enter artist Name" class="form-control mt-3" name="artist_name" required>
                <input type="text" placeholder="Enter artist Descripton" class="form-control mt-3" name="artist_description" required>
                
                <input type="file" class="form-control mt-3" name="artist_image" required>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-info mt-3" name="add_artist">Add Artist</button>
                </div>
            </form>
            </div>
        </div>
    </div>

  <h1 class="text-center mt-5">View Artist</h1>
    <div class="container mb-5">
        <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Artist Id</th>
                        <th>Artist Name</th>
                        <th>Description</th> <th>Artist Image</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($con,"SELECT * FROM artist");
                while($value = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $value['artist_id'];?></td>
                    <td><?php echo $value['artist_name'];?></td>
                    
                    <td><?php echo substr($value['artist_description'], 0, 60); ?>...</td>
                    
                    <td><img src="../image_upload/<?php echo $value['artist_image'];?>" width="50" height="50" style="object-fit:cover;"></td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updatealbum<?php echo $value['artist_id'];?>">
                        Update
                        </button>
                    </td>

                    <div class="modal fade" id="updatealbum<?php echo $value['artist_id'];?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="../code.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Artist</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" value="<?php echo $value['artist_id'];?>" name="id">
                                        
                                        <label class="mt-2">Artist Name</label>
                                        <input type="text" value="<?php echo $value['artist_name'];?>" class="form-control" name="artist_name">
                                        
                                        <label class="mt-3">Description</label>
                                        <textarea class="form-control" name="artist_description" rows="4"><?php echo $value['artist_description'];?></textarea>
                                        
                                        <label class="mt-3">Update Image</label>
                                        <input type="file" class="form-control" name="artist_image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info" name="update_artist">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <td class="text-center">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $value['artist_id'];?>">
                        Delete
                        </button>
                    </td>

                    <div class="modal fade" id="delete<?php echo $value['artist_id'];?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="../code.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Artist</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>Do you really want to delete <strong><?php echo $value['artist_name'];?></strong>?</p>
                                        <input type="hidden" value="<?php echo $value['artist_id'];?>" name="id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete_artist">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>