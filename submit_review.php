<?php
include "connection.php";

if(isset($_POST['submit_review'])){
    $item_id = $_POST['item_id'];
    $item_type = $_POST['item_type'];
    $u_name = $_POST['u_name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (item_id, item_type, user_name, rating, comment) 
            VALUES ('$item_id', '$item_type', '$u_name', '$rating', '$comment')";

    if(mysqli_query($con, $sql)){
        echo "<script>
                alert('Review Submitted Successfully!');
                window.location.href = '".($item_type == 'audio' ? 'songs.php' : 'videosongs.php')."';
              </script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>