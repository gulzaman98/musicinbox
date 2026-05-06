<?php
session_start();
include "connection.php";

        //  register code start
        if(isset($_POST['register'])){
            $name = $_POST['uname'];
            $email = $_POST['uemail'];
            $pass = $_POST['upass'];
            $address = $_POST['uaddress'];
            $phone = $_POST['ucontact'];

            $query =  mysqli_query($con, "INSERT INTO register(Name, Email, Password, Address, phone_no)VALUES('$name', '$email', '$pass', '$address', '$phone')");

            if($query){
                echo "<script>
                alert('Data inserted successfully');
                location.assign('login.php');
                </script>";
            }
        }



// login code start

if(isset($_POST['login'])){
    $email = $_POST['uemail'];
    $pass = $_POST['upass'];

    $query = mysqli_query($con, "SELECT * FROM register WHERE Email = '$email' AND Password = '$pass'");

    if(mysqli_num_rows($query) > 0 ){

        $data = mysqli_fetch_assoc($query);

        if($data['Status'] == 'verified'){
            if($data['Role'] == 'admin'){
                $_SESSION['admin'] = $data['Name'];
                echo "<script>
                alert('welcome to admin panel');
                location.assign('admin_panel/public.php?index');
                </script>";
            }else{
                $_SESSION['user'] = $data['id'];
                echo "<script>
                alert('welcome to wesbite');
                location.assign('home.php');
                </script>";
            }

        }else{
            echo "<script>
            alert('please verify first');
            location.assign('login.php');
            </script>";
        }
       
    }else{
        echo "<script>
        alert('invalid email or password');
        location.assign('register.php');
        </script>";
    }

}


// update user's data

if(isset($_POST['update_data'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $status = $_POST['status'];

    $update_data = mysqli_query($con, "UPDATE register SET Name = '$name', Email = '$email', Password = '$pass', Status = '$status' WHERE id = '$id'");

    if($update_data){
        echo "<script>
        alert('data updated successfully');
        location.assign('admin_panel/public.php?index');
        </script>";
    }


}

// delete data
if(isset($_POST['delete_data'])){
    $id = $_POST['id'];

    $delete_data = mysqli_query($con, "DELETE FROM register WHERE id ='$id'");

    if($delete_data){
        echo "<script>
        alert('data deleted successfully');
        location.assign('admin_panel/public.php?index');
        </script>";
    }
}

// add album
// add album
if(isset($_POST['add_album'])){
    $album_name = mysqli_real_escape_string($con, $_POST['album-name']);
    $artist_id = $_POST['artist_id']; 
    $album_year = $_POST['album_year']; 
    
    // Yahan name hamesha wahi rakhein jo aapke HTML form mein hai (album_image)
    if(isset($_FILES['album_image']) && $_FILES['album_image']['error'] == 0){
        
        $albumimage = time()."_".$_FILES['album_image']['name'];
        $tmp_name = $_FILES['album_image']['tmp_name'];
        $size = $_FILES['album_image']['size'];
        $imagetype = strtolower(pathinfo($albumimage, PATHINFO_EXTENSION));
        $destination = 'image_upload/'.$albumimage;

        if($size <= 2000000){
            // Yahan 'jfif' ko condition mein shamil karna zaroori hai
            if($imagetype == 'jpeg' || $imagetype == 'png' || $imagetype == 'jpg' || $imagetype == 'jfif'){
                
                if(move_uploaded_file($tmp_name, $destination)){
                    $query = mysqli_query($con, "INSERT INTO add_albums(album_name, artist_id, album_year, album_image) 
                                                 VALUES('$album_name', '$artist_id', '$album_year', '$albumimage')");

                    if($query){
                        echo "<script>
                        alert('Album uploaded successfully');
                        location.assign('admin_panel/public.php?add_albums');
                        </script>";
                    }
                } else {
                    echo "<script>alert('Failed to move file'); window.history.back();</script>";
                }
            } else {
                // Ab yeh error sirf tab aayega jab extension waqai in 4 ke ilawa hogi
                echo "<script>alert('Only JPG, JPEG, PNG, and JFIF allowed'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('File size must be less than 2MB'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Please select an image or check for upload errors'); window.history.back();</script>";
    }
}
    // add artist
    if (isset($_POST['add_artist'])) {

        
$artist_name = mysqli_real_escape_string($con, $_POST['artist_name']);
$artist_description = mysqli_real_escape_string($con, $_POST['artist_description']);
        $artistimage = $_FILES['artist_image']['name'];
        $tmp_name = $_FILES['artist_image']['tmp_name'];
        $size = $_FILES['artist_image']['size'];
        $imagetype = pathinfo($artistimage, PATHINFO_EXTENSION);
        $destination = 'image_upload/' . $artistimage;
    
    
    
       
        if ($size <= 10000000) {
    
            
            if ($imagetype == 'jpeg' || $imagetype == 'png' || $imagetype == 'jpg' || $imagetype == 'jfif') {
    
                if (move_uploaded_file($tmp_name, $destination)) {
                  
                    // 2. Ab query chalayein (Query same rahegi)
                    $query = mysqli_query($con, "INSERT INTO artist(artist_name, artist_image, artist_description) VALUES('$artist_name', '$artistimage', '$artist_description')");

                    if ($query) {
                        echo "<script>
                        alert('Artist uploaded successfully');
                        location.assign('admin_panel/public.php?add_artist');
                        </script>";
                    } else {
                        echo "<script>
                        alert('Error adding artist to database');
                        location.assign('admin_panel/public.php?add_artist');
                        </script>";
                    }
                } else {
                    echo "<script>
                    alert('Failed to move uploaded file');
                    location.assign('admin_panel/public.php?add_artist');
                    </script>";
                }
            } else {
                echo "<script>
                alert('Only JPEG, PNG, JFIF, or JPG images are allowed'); 
                location.assign('admin_panel/public.php?add_artist');
                </script>";
            }
        } else {
            echo "<script>
            alert('File size must be less than or equal to 10MB');
            location.assign('admin_panel/public.php?add_artist');
            </script>";
        }
    }
    

    // // add songs code start
if(isset($_POST['add_song'])){
    $songname = $_POST['song-name'];
    $album_name = $_POST['album-name'];
    $artistname = $_POST['artist-name'];
    $song_year = $_POST['song-year'];


    $simgname = $_FILES['song-image']['name'];
    $size = $_FILES['song-image']['size'];
    $tmp_name = $_FILES['song-image']['tmp_name'];
    $img_type = pathinfo($simgname, PATHINFO_EXTENSION);

    $img_destination = "image_upload/".$simgname;

    $song_audio = $_FILES['song-audio']['name'];
    $size = $_FILES['song-audio']['size'];
    $tmp_name_song = $_FILES['song-audio']['tmp_name'];
    $img_type = pathinfo($song_audio, PATHINFO_EXTENSION);

    $audio_destination = "audio/".$song_audio;

    if($size <= 20000000 ){

        if($img_type == 'jpeg' || $img_type == 'png' || $img_type == 'jpg'  || $img_type == 'mp3' || $img_type == 'mp4'){

            if(move_uploaded_file($tmp_name,$img_destination)){

                move_uploaded_file($tmp_name_song,$audio_destination);

                $query = mysqli_query($con, "INSERT INTO add_songs (song_name, album_id, artist_id, year_id, song_image, song_audio)VALUES ('$songname', '$album_name', '$artistname', '$song_year', '$simgname', '$song_audio')");



                if($query){
                    echo "<script>
                alert('image and audio uploaded successfully');
                location.assign('admin_panel/public.php?add_song');
                </script>";
                }

            }else{
                echo "<script>
                alert('image or audio not inserted');
                 location.assign('admin_panel/public.php?add_song');
                </script>";
            }

        }else{
            echo "<script>
            alert('only allow jpeg, png or jpg images and mp3 files ');
            location.assign('admin_panel/public.php?add_song');
            </script>";
        }

    }else{
        echo "<script>
        alert('file size should be less than or equal 20MB ');
         location.assign('admin_panel/public.php?add_song');
        
        </script>";
    }
}
    // song upload code end

    // upat song code start
   

if(isset($_POST['update_song'])){
    $id = $_POST['id'];
    $song_name = $_POST['song-name'];
    $album_id = $_POST['album-name'];
    $artist_id = $_POST['artist-name'];
    $year_id = $_POST['song-year'];

    $song_image = $_FILES['song-image']['name'];
    $song_audio = $_FILES['song-audio']['name'];

    $image_tmp = $_FILES['song-image']['tmp_name'];
    $audio_tmp = $_FILES['song-audio']['tmp_name'];

    $update_fields = "song_name='$song_name', album_id='$album_id', artist_id='$artist_id', year_id='$year_id'";

    if(!empty($song_image)){
        move_uploaded_file($image_tmp, "image_upload/".$song_image);
        $update_fields .= ", song_image='$song_image'";
    }

    if(!empty($song_audio)){
        move_uploaded_file($audio_tmp, "audio/".$song_audio);
        $update_fields .= ", song_audio='$song_audio'";
    }

    $query = mysqli_query($con, "UPDATE add_songs SET $update_fields WHERE s_id='$id'");

    if($query){
        echo "<script>
        alert('Song Updated Successfully'); 
        location.assign('admin_panel/public.php?add_song');
        </script>";
    }else{
        echo "<script>
        alert('Song not Updated'); 
        location.assign('admin_panel/public.php?add_song');
        </script>";
    }
}


    // update song code end 
    // delete song code start

    if(isset($_POST['delete_song'])){
    $id = $_POST['id'];
    $query = mysqli_query($con, "DELETE FROM add_songs WHERE s_id='$id'");

    if($query){
        echo "<script>
        alert('Song Deleted Successfully'); 
        location.assign('admin_panel/public.php?add_song');
        </script>";
    }else{
        echo "<script>
        alert('Song not Deleted'); 
        location.assign('admin_panel/public.php?add_song');
        </script>";
    }
} 
    // delete song code end 


 // // video songs add code start
 if (isset($_POST['add_video'])) {
  
    $songname = $_POST['video-name'];
    $album_name = $_POST['album-name'];
    $artistname = $_POST['artist-name'];
    $song_year = $_POST['song-year'];

    // Image file upload
    $simgname = $_FILES['video-image']['name'];
    $simg_tmp_name = $_FILES['video-image']['tmp_name'];
    $simg_size = $_FILES['video-image']['size'];
    $simg_type = pathinfo($simgname, PATHINFO_EXTENSION);
    $img_destination = "image_upload/" . $simgname; 

   
    $song_video = $_FILES['song-video']['name'];
    $video_tmp_name = $_FILES['song-video']['tmp_name'];
    $video_size = $_FILES['song-video']['size'];
    $video_type = pathinfo($song_video, PATHINFO_EXTENSION);
    $video_destination = "video/" . $song_video; 


    if ($simg_size <= 30000000 && $video_size <= 30000000) {

        
        if ($simg_type == 'jpeg' || $simg_type == 'png' || $simg_type == 'jpg' || $video_type == 'mp4') {

            
            if (move_uploaded_file($simg_tmp_name, $img_destination)) {

               
                if (move_uploaded_file($video_tmp_name, $video_destination)) {

                    $query = mysqli_query($con, "INSERT INTO add_video(video_name, album_id, artist_id, year_id, video_image, add_video) 
                    VALUES ('$songname', '$album_name', '$artistname', '$song_year', '$simgname', '$song_video')");

                    if ($query) {
                        echo "<script>
                        alert('Video uploaded successfully');
                        location.assign('admin_panel/public.php?add_video');
                        </script>";
                    } else {
                        echo "<script>
                        alert('Failed to insert video into database');
                        location.assign('admin_panel/public.php?add_video');
                        </script>";
                    }

                } else {
                    echo "<script>
                    alert('Failed to upload video');
                    location.assign('admin_panel/public.php?add_video');
                    </script>";
                }

            } else {
                echo "<script>
                alert('Failed to upload image');
                location.assign('admin_panel/public.php?add_video');
                </script>";
            }

        } else {
            echo "<script>
            alert('Only jpeg, png, jpg images and mp4 videos are allowed');
            location.assign('admin_panel/public.php?add_video');
            </script>";
        }

    } else {
        echo "<script>
        alert('File size should be less than or equal to 20MB');
        location.assign('admin_panel/public.php?add_video');
        </script>";
    }

}

    // video upload code end

    // update video code start
    
if(isset($_POST['update_video'])){
    $id = $_POST['id'];
    $video_name = $_POST['video-name'];
    $album_id = $_POST['album-name'];
    $artist_id = $_POST['artist-name'];
    $year_id = $_POST['song-year'];

    $video_image = $_FILES['video-image']['name'];
    $video_file = $_FILES['song-video']['name'];

    $img_tmp = $_FILES['video-image']['tmp_name'];
    $vid_tmp = $_FILES['song-video']['tmp_name'];

    $update_fields = "video_name='$video_name', album_id='$album_id', artist_id='$artist_id', year_id='$year_id'";

    if(!empty($video_image)){
        move_uploaded_file($img_tmp, "image_upload/".$video_image);
        $update_fields .= ", video_image='$video_image'";
    }

    if(!empty($video_file)){
        move_uploaded_file($vid_tmp, "video/".$video_file);
        $update_fields .= ", add_video='$video_file'";
    }

    $query = mysqli_query($con, "UPDATE add_video SET $update_fields WHERE video_id='$id'");

    if($query){
        echo "<script>
        alert('Video Song Updated Successfully'); 
        location.assign('admin_panel/public.php?add_video');
        </script>";
    }else{
        echo "<script>
        alert('Update Failed'); 
        location.assign('admin_panel/public.php?add_video');
        </script>";
    }
}


    // update video code end

    // delete video code start
    if(isset($_POST['delete_video'])){
    $id = $_POST['id'];
    $query = mysqli_query($con, "DELETE FROM add_video WHERE video_id='$id'");
    if($query){
        echo "<script>
        alert('Video Song Deleted Successfully'); 
        location.assign('admin_panel/public.php?add_video');
        </script>";
    }else{
        echo "<script>
        alert('Delete Failed'); 
        location.assign('admin_panel/public.php?add_video');
        </script>";
    }
}

    // delete video code end
    

// update album start

if(isset($_POST['update_album'])){
    $id = $_POST['id'];
    $album_name = mysqli_real_escape_string($con, $_POST['album-name']);
    $artist_id = $_POST['artist_id'];
    $album_year = $_POST['album_year'];
    
    // Agar nayi image select ki hai
    if(!empty($_FILES['album_image']['name'])){
        $img_name = time()."_".$_FILES['album_image']['name'];
        move_uploaded_file($_FILES['album_image']['tmp_name'], "image_upload/".$img_name);
        
        $query = mysqli_query($con, "UPDATE add_albums SET album_name='$album_name', artist_id='$artist_id', album_year='$album_year', album_image='$img_name' WHERE album_id='$id'");
    } else {
        // Agar image wahi purani rehne deni hai
        $query = mysqli_query($con, "UPDATE add_albums SET album_name='$album_name', artist_id='$artist_id', album_year='$album_year' WHERE album_id='$id'");
    }

    if($query){
        echo "<script>alert('Album Updated Successfully!'); location.assign('admin_panel/public.php?add_albums');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

// update album end

// delete album start 

if(isset($_GET['del_album'])){

    $id = $_GET['del_album'];

    $query = mysqli_query($con,"DELETE FROM add_albums WHERE album_id='$id'");

    if($query){
        echo "<script>
        alert('Album Deleted Successfully');
        location.assign('admin_panel/public.php?add_albums');
        </script>";
    }else{
        echo "<script>
        alert('Album not deleted');
        location.assign('admin_panel/public.php?add_albums');
        </script>";
    }

}
// delete album end 

// add year code start


if(isset($_POST['add_year'])){
    $year_name = $_POST['year-name'];

    $songquery = mysqli_query($con, "INSERT INTO song_year(release_year)VALUES('$year_name')");

    if($songquery){
        echo "<script>
        alert('year added successfully');
        location.assign('admin_panel/public.php?add_year');
        </script>";
    }else{
        echo "<script>
        alert('year not added');
        location.assign('admin_panel/public.php?add_year');
        </script>";
    }
    
             
    }
    

// add year code end

// update year code start 

if(isset($_POST['update_year'])){
    $id = $_POST['id'];
    $year_name = $_POST['year-name'];

    $query = mysqli_query($con,"UPDATE song_year SET release_year='$year_name' WHERE year_id='$id'");

    if($query){
        echo "<script>alert('Year updated successfully'); location.assign('admin_panel/public.php?add_year');</script>";
    } else {
        echo "<script>alert('Error updating year'); location.assign('admin_panel/public.php?add_year');</script>";
    }
}

// update year code end

// delete year code start

if(isset($_POST['delete_year'])){
    $id = $_POST['id'];

    $query = mysqli_query($con,"DELETE FROM song_year WHERE year_id='$id'");

    if($query){
        echo "<script>alert('Year deleted successfully'); location.assign('admin_panel/public.php?add_year');</script>";
    } else {
        echo "<script>alert('Error deleting year'); location.assign('admin_panel/public.php?add_year');</script>";
    }
}

// delete year code end 



// artist update code start

if(isset($_POST['update_artist'])){
    $id = $_POST['id'];
    $artist_name = $_POST['artist_name'];

    if(!empty($_FILES['artist_image']['name'])){
        $img_name = $_FILES['artist_image']['name'];
        $img_size = $_FILES['artist_image']['size'];
        $tmp_name = $_FILES['artist_image']['tmp_name'];
        $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $destination = "image_upload/".time().$img_name;

        if($img_size <= 3000000){
            if($img_type == 'jpeg' || $img_type == 'jpg' || $img_type == 'png'){
                if(move_uploaded_file($tmp_name, $destination)){
                    $query = mysqli_query($con,"UPDATE artist SET artist_name='$artist_name', artist_image='".time().$img_name."' WHERE artist_id='$id'");
                }
            } else {
                echo "<script>alert('Only JPG, JPEG, PNG allowed'); location.assign('admin_panel/public.php?add_artist');</script>";
                exit();
            }
        } else {
            echo "<script>alert('File size must be <= 3MB'); location.assign('admin_panel/public.php?add_artist');</script>";
            exit();
        }
    } else {
        $query = mysqli_query($con,"UPDATE artist SET artist_name='$artist_name' WHERE artist_id='$id'");
    }

    if($query){
        echo "<script>alert('Artist updated successfully'); location.assign('admin_panel/public.php?add_artist');</script>";
    }
}

// artist update code end 

// artist delete code start

if(isset($_POST['delete_artist'])){
    $id = $_POST['id'];


    $query = mysqli_query($con,"DELETE FROM artist WHERE artist_id='$id'");
    if($query){
        echo "<script>alert('Artist deleted successfully'); 
        location.assign('admin_panel/public.php?add_artist');</script>";
    } else {
        echo "<script>alert('Error deleting artist'); 
        location.assign('admin_panel/public.php?add_artist');</script>";
    }
}

// artist delete code end 

//feedback form code start

if(isset($_POST['feedback'])){
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];

    $query = "INSERT INTO feedback (name, email, contact, message) VALUES ('$name', '$email', '$contact', '$message')";
    
    $run = mysqli_query($con, $query);

    if($run){
        echo "<script>
        alert('Feedback submited successfully');
        location.assign('home.php');
        </script>";
    }
}
//feedback form code end
?>