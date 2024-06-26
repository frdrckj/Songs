<!-- 
    Individual Project (UAS Lab)
    Frederick Armando Jerusha - 222203085
    upload.php
 -->

<?php

include 'connect.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $artist = $_POST['artist'];
   $artist = filter_var($artist, FILTER_SANITIZE_STRING);

   if(!isset($artist)){
      $artist = '';
   }

   $album = $_FILES['album']['name'];
   $album = filter_var($album, FILTER_SANITIZE_STRING);
   $album_size = $_FILES['album']['size'];
   $album_tmp_name = $_FILES['album']['tmp_name'];
   $album_folder = 'uploaded_album/'.$album;

   if(isset($album)){
      if($album_size > 2000000){
         $message[] = 'album size is too large!';
      }else{
         move_uploaded_file($album_tmp_name, $album_folder);
      }
   }else{
      $album = '';
   }

   $music = $_FILES['music']['name'];
   $music = filter_var($music, FILTER_SANITIZE_STRING);
   $music_size = $_FILES['music']['size'];
   $music_tmp_name = $_FILES['music']['tmp_name'];
   $music_folder = 'uploaded_music/'.$music;

   if($music_size > 100000000){
      $message[] = 'music size is too large!';
   }else{
      $upload_music = $conn->prepare("INSERT INTO `songs`(name, artist, album, music) VALUES(?,?,?,?)");
      $upload_music->execute([$name, $artist, $album, $music]);
      move_uploaded_file($music_tmp_name, $music_folder);
      $message[] = 'Upload Successful!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>upload</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <?php include 'navbar.php'; ?>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<section class="form-container">

   <h3 class="heading">upload</h3>

   <form action="" method="POST" enctype="multipart/form-data">
      <p>Title <span>*</span></p>
      <input type="text" name="name" placeholder="enter song title" required maxlength="100" class="box">
      <p>Artist <span>*</span></p>
      <input type="text" name="artist" placeholder="enter artist name" maxlength="100" class="box">
      <p>Select Song File <span>*</span></p>
      <input type="file" name="music" class="box" required accept="audio/*">
      <p>Select Album Cover <span>*</span></p>
      <input type="file" name="album" class="box" accept="image/*">
      <input type="submit" value="upload" class="btn" name="submit">
      <a href="list.php" class="option-btn">Back Home</a>
   </form>

</section>

</body>
</html>