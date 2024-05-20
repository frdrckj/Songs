<!-- 
    Individual Project (UAS Lab) 
    Frederick Armando Jerusha - 222203085 
    about.php 
-->

<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Citfy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .about {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 17rem; 
        }

        .about .content {
            max-width: 800px;
            text-align: center;
            padding: 2rem;
        }

        .about .content h3 {
            font-size: 3rem;
            color: var(--black);
            margin-bottom: 2rem;
        }

        .about .content p {
            font-size: 1.8rem;
            color: var(--light-color);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <section class="about">
        <div class="content">
            <h3>Citify - Individual Project (UAS Lab)</h3>
            <br>
            <br>
            <p>The project aims to develop a music streaming platform with comprehensive CRUD (Create, Read, Update, Delete) capabilities, enabling users to create and manage their own playlists.</p>
            <p>Individual Project from IBDA2012 class by Frederick Armando Jerusha - 222203085.</p>
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

    <script src="js/script.js"></script>
</body>
</html>