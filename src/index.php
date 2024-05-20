<!-- Individual Project (UAS Lab) Frederick Armando Jerusha - 222203085 home.php -->
<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Citify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .home {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 13rem;
        }
        .home .content {
            text-align: center;
            max-width: 800px;
        }
        .home .content h3 {
            font-size: 3.5rem;
        }
        .home .content p {
            font-size: 2rem;
            margin: 2rem 0;
        }
        .home .content .btn {
            font-size: 2rem;
            padding: 1.5rem 4rem;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <section class="home">
        <div class="content">
            <h3>Welcome to Citify</h3>
            <br>
            <br>
            <br>
            <a href="list.php" class="btn">Browse Music</a>
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