<!-- 
    Individual Project (UAS Lab)
    Frederick Armando Jerusha - 222203085
    index.php
 -->

<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citfy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
        }

        .dropdown-content form {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content form:hover {
            background-color: #FFFFFF;
        }

        .dropdown.show .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <section class="playlist">
        <h3 class="heading">Citfy</h3>
        <div class="box-container">
            <?php
            $select_songs = $conn->prepare("SELECT * FROM `songs`");
            $select_songs->execute();
            if($select_songs->rowCount() > 0){
                while($fetch_song = $select_songs->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="box">
                <?php if($fetch_song['album'] != ''){ ?>
                <img src="uploaded_album/<?= $fetch_song['album']; ?>" alt="" class="album">
                <?php }else{ ?>
                <img src="images/disc.png" alt="" class="album">
                <?php } ?>
                <div class="name"><?= htmlspecialchars($fetch_song['name']); ?></div>
                <div class="artist"><?= htmlspecialchars($fetch_song['artist']); ?></div>
                <div class="flex">
                    <div class="play" data-src="uploaded_music/<?= htmlspecialchars($fetch_song['music']); ?>"><i class="fas fa-play"></i><span>Play</span></div>
                    <div class="dropdown">
                        <i class="fas fa-ellipsis-v" onclick="toggleDropdown(this)"></i>
                        <div class="dropdown-content">
                            <form action="update.php" method="post" class="update-form">
                                <input type="hidden" name="id" value="<?= $fetch_song['id']; ?>">
                                <button type="submit" class="play"><i class="fas fa-edit"></i><span>Update</span></button>
                            </form>
                            <form action="delete.php" method="post" class="delete-form">
                                <input type="hidden" name="id" value="<?= $fetch_song['id']; ?>">
                                <button type="submit" class="play"><i class="fas fa-trash-alt"></i><span>Delete</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
            <div class="box more-btn">
                <a href="upload.php" class="btn">Upload New Song</a>
            </div>
        </div>
    </section>

    <div class="music-player">
        <i class="fas fa-times" id="close"></i>
        <div class="box">
            <img src="" class="album" alt="">
            <div class="name"></div>
            <div class="artist"></div>
            <audio src="" controls class="music"></audio>
        </div>
    </div>

    <!-- custom js file link -->
    <script src="js/script.js"></script>
    <script>
        function toggleDropdown(element) {
            var dropdown = element.parentNode;
            dropdown.classList.toggle("show");
        }
    </script>
</body>
</html>