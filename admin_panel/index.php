<?php
if(!isset($_SESSION['admin'])){
    header("location:../login.php#login");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <h1 class="text-center mt-3">User's Data</h1>

  <table class="table" border="2">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>address</th>
      <th>Phone_no</th>
      <th>Role</th>
      <th>Status</th>
      <th colspan="2" class="text-center">Action</th>
    </tr>

    <?php
   $con =  mysqli_connect("localhost", "root", "", "sound");
   $fetch_data = mysqli_query($con, "SELECT * FROM register");

   foreach($fetch_data as $data){

    ?>

      <tr>
        <td><?php echo $data['id'];?></td>
        <td><?php echo $data['Name'];?></td>
        <td><?php echo $data['Email'];?></td>
        <td><?php echo $data['Password'];?></td>
        <td><?php echo $data['Address'];?></td>
        <td><?php echo $data['phone_no'];?></td>
        <td><?php echo $data['Role'];?></td>
        <td><?php echo $data['Status'];?></td>
        <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update<?php echo $data['id'];?>">
  Update
</button></td>

<!-- update Modal -->
<div class="modal fade" id="update<?php echo $data['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="../code.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update box</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" value="<?php echo $data['id'];?>" class="form-control mt-3" name="id">
        <input type="text" value="<?php echo $data['Name'];?>"  class="form-control mt-3" placeholder="Enter your name" name="name">

        <input type="email" value="<?php echo $data['Email'];?>"  class="form-control mt-3" placeholder="Enter your email" name="email">

        <input type="text" value="<?php echo $data['Password'];?>"  class="form-control mt-3" placeholder="Enter your password" name="pass">

        <input type="text" value="<?php echo $data['Status'];?>"  class="form-control mt-3" placeholder="update status" name="status">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="update_data">Update</button>
      </div>

      </form>
    </div>
  </div>
</div>

<td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $data['id'];?>">
  Delete
</button></td>

<!-- delete Modal -->
<div class="modal fade" id="delete<?php echo $data['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="../code.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Box</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you Really want to delete this?
        <input type="hidden" value="<?php echo $data['id'];?>" class="form-control mt-3" name="id">
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="delete_data">Delete</button>
      </div>

      </form>
    </div>
  </div>
</div>
    
      </tr>
    <?php
   }

    ?>
  </table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>