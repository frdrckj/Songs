<!-- 
    Individual Project (UAS Lab)
    Frederick Armando Jerusha - 222203085
    update.php
 -->

<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $query = $conn->prepare("SELECT * FROM `songs` WHERE id = ?");
    $query->execute([$id]);
    $song = $query->fetch(PDO::FETCH_ASSOC);

    if (!$song) {
        $message[] = 'Song not found!';
    }

    if (isset($_POST['update'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $artist = filter_var($_POST['artist'], FILTER_SANITIZE_STRING);
        $artist = $artist ?: '';

        $album = $song['album'];
        if (isset($_FILES['album']) && $_FILES['album']['error'] == UPLOAD_ERR_OK) {
            $album = filter_var($_FILES['album']['name'], FILTER_SANITIZE_STRING);
            $album_size = $_FILES['album']['size'];
            $album_tmp_name = $_FILES['album']['tmp_name'];
            $album_folder = 'uploaded_album/' . $album;

            if ($album_size > 2000000) {
                $message[] = 'Album size is too large!';
            } else {
                if (move_uploaded_file($album_tmp_name, $album_folder)) {
                    // Delete the old album file if it exists
                    if ($song['album'] && file_exists('uploaded_album/' . $song['album'])) {
                        unlink('uploaded_album/' . $song['album']);
                    }
                } else {
                    $message[] = 'Failed to upload album image!';
                }
            }
        }

        $music = $song['music'];
        if (isset($_FILES['music']) && $_FILES['music']['error'] == UPLOAD_ERR_OK) {
            $music = filter_var($_FILES['music']['name'], FILTER_SANITIZE_STRING);
            $music_size = $_FILES['music']['size'];
            $music_tmp_name = $_FILES['music']['tmp_name'];
            $music_folder = 'uploaded_music/' . $music;

            if ($music_size > 100000000) {
                $message[] = 'Music size is too large!';
            } else {
                if (move_uploaded_file($music_tmp_name, $music_folder)) {
                    // Delete the old music file if it exists
                    if ($song['music'] && file_exists('uploaded_music/' . $song['music'])) {
                        unlink('uploaded_music/' . $song['music']);
                    }
                } else {
                    $message[] = 'Failed to upload music file!';
                }
            }
        }

        $update = $conn->prepare("UPDATE `songs` SET name = ?, artist = ?, album = ?, music = ? WHERE id = ?");
        $update->execute([$name, $artist, $album, $music, $id]);

        $message[] = 'Song updated successfully!';
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

    <style>
        .album-cover {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
    </style>

</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '
        <div class="message">
            <span>' . htmlspecialchars($msg) . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
        ';
    }
}
?>

<section class="form-container">
    <h3 class="heading">Update</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($song['id']); ?>">
        <p>Title <span>*</span></p>
        <input type="text" name="name" placeholder="Enter song title" required maxlength="100" class="box" value="<?= htmlspecialchars($song['name']); ?>">
        <p>Artist</p>
        <input type="text" name="artist" placeholder="Enter artist name" maxlength="100" class="box" value="<?= htmlspecialchars($song['artist']); ?>">
        
        <p>Current Music</p>
        <audio controls>
            <source src="uploaded_music/<?= htmlspecialchars($song['music']); ?>" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <p>Upload New Song (optional)</p>
        <input type="file" name="music" class="box" accept="audio/*">

        <p>Current Album Cover</p>
        <?php if ($song['album']) { ?>
            <img src="uploaded_album/<?= htmlspecialchars($song['album']); ?>" alt="Current Album" class="album-cover">
        <?php } ?>
        <p>Upload New Album Cover (optional)</p>
        <input type="file" name="album" class="box" accept="image/*">

        <input type="submit" value="Update" class="btn" name="update">
        <a href="index.php" class="option-btn">Back Home</a>
    </form>
</section>

</body>
</html>