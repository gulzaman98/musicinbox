<?php
include "../connection.php"; 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Song Year</title>
  </head>
  <body>
  <!-- Add Year -->
  <h1 class="text-center mt-5 text-info">Add Year</h1>
  <div class="container">
      <div class="row">
          <div class="col-8 mx-auto">
              <form action="../code.php" method="post">
                  <input type="text" placeholder="Enter Release Year" class="form-control mt-3" name="year-name" required>
                  <div class="d-grid gap-2">
                      <button type="submit" class="btn btn-info mt-3 mb-5" name="add_year">Add Song Release Year</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <!-- View Years -->
  <h1 class="text-center">View Years</h1>
  <div class="container">
      <div class="row">
          <div class="col-12">
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Year ID</th>
                          <th>Release Year</th>
                          <th colspan="2" class="text-center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT * FROM song_year");
                  foreach($query as $value){
                  ?>
                      <tr>
                          <td><?php echo $value['year_id']; ?></td>
                          <td><?php echo $value['release_year']; ?></td>

                          <!-- Update Modal Button -->
                          <td>
                              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateyear<?php echo $value['year_id']; ?>">
                                  Update
                              </button>
                          </td>

                          <!-- Delete Modal Button -->
                          <td>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteyear<?php echo $value['year_id']; ?>">
                                  Delete
                              </button>
                          </td>
                      </tr>

                      <!-- Update Modal -->
                      <div class="modal fade" id="updateyear<?php echo $value['year_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <form action="../code.php" method="post">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Update Year</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                      </div>
                                      <div class="modal-body">
                                          <input type="hidden" name="id" value="<?php echo $value['year_id']; ?>">
                                          <input type="text" name="year-name" class="form-control" value="<?php echo $value['release_year']; ?>" required>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="update_year" class="btn btn-info">Update</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                      <!-- Delete Modal -->
                      <div class="modal fade" id="deleteyear<?php echo $value['year_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <form action="../code.php" method="post">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Delete Year</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                      </div>
                                      <div class="modal-body">
                                          Do you really want to delete this year?
                                          <input type="hidden" name="id" value="<?php echo $value['year_id']; ?>">
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" name="delete_year" class="btn btn-danger">Delete</button>
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