<?php include "../connection.php"; ?>
<h1 class="text-center mt-2">Add Albums</h1>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4 shadow-sm">
                <form action="../code.php" method="post" enctype="multipart/form-data">
                    <input type="text" placeholder="Enter album Name" class="form-control mb-3" name="album-name" required>
                    <input type="number" placeholder="Release Year" class="form-control mb-3" name="album_year" required>
                    <select name="artist_id" class="form-select mb-3" required>
                        <option value="">Select Artist</option>
                        <?php
                        $artists = mysqli_query($con, "SELECT * FROM artist");
                        while($row = mysqli_fetch_assoc($artists)){
                            echo "<option value='".$row['artist_id']."'>".$row['artist_name']."</option>";
                        }
                        ?>
                    </select>
                    <input type="file" class="form-control mb-3" name="album_image" required>
                    <button type="submit" class="btn btn-primary w-100" name="add_album">Add Album</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View Albums Table -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <h3 class="mb-4">View Albums</h3>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Artist</th>
                        <th>Year</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($con, "SELECT add_albums.*, artist.artist_name FROM add_albums LEFT JOIN artist ON add_albums.artist_id = artist.artist_id");
                while($value = mysqli_fetch_assoc($query)){
                ?>
                    <tr>
                        <td><?php echo $value['album_id'];?></td>
                        <td><?php echo $value['album_name'];?></td>
                        <td><?php echo $value['artist_name'] ?? 'No Artist';?></td>
                        <td><?php echo $value['album_year'];?></td>
                        <td><img src="../image_upload/<?php echo $value['album_image'];?>" width="50" height="50"></td>
                        <td>
                            <!-- Direct Link for Delete (Recommended) -->
                            <a class="btn btn-sm btn-info text-white" href="update_album.php?id=<?php echo $value['album_id'];?>">Update</a>
                            <a class="btn btn-sm btn-primary" href="../code.php?del_album=<?php echo $value['album_id'];?>" onclick="return confirm('Confirm Delete?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>