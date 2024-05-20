<!-- 
    Individual Project (UAS Lab)
    Frederick Armando Jerusha - 222203085
    delete.php
 -->

<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $query = $conn->prepare("SELECT music, album FROM `songs` WHERE id = ?");
    $query->execute([$id]);
    $song = $query->fetch(PDO::FETCH_ASSOC);

    if ($song) {
        if ($song['music'] && file_exists('uploaded_music/' . $song['music'])) {
            unlink('uploaded_music/' . $song['music']);
        }
        if ($song['album'] && file_exists('uploaded_album/' . $song['album'])) {
            unlink('uploaded_album/' . $song['album']);
        }

        $delete = $conn->prepare("DELETE FROM `songs` WHERE id = ?");
        $delete->execute([$id]);

        header("Location: index.php");
        exit();
    } else {
        $message = 'Song not found!';
    }
} else {
    header("Location: index.php");
    exit();
}
?>
