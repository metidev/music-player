<?php
global $conn;
include "connect.php";
?>
<style>
    <?php
     include "css/style.css";
     ?>
</style>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<section class="playlist">
    <h3 class="heading">
        music playList
    </h3>
    <div class="box-container">
        <a class="add-btn" href="upload_music.php"><i class="fas fa-plus"></i></a>
        <?php
        $select_songs = $conn->prepare("SELECT * FROM `songs`");
        $select_songs->execute();

        if ($select_songs->rowCount() > 0) {
            while ($fetch_song = $select_songs->fetch(PDO::FETCH_ASSOC)) {


                ?>
                <div class="box">
                    <?php
                    if ($fetch_song['album'] != '') { ?>
                        <img class="album" src="uploaded_album/<?= $fetch_song['album'] ?>" alt="album image"/>
                        <?php
                    } else { ?>
                        <img class="album" src="images/disc.png" alt="album image"/>
                    <?php } ?>
                    <div>
                        <div class="name"><?= $fetch_song['name'] ?></div>
                        <div class="artist"><?= $fetch_song['artist'] ?></div>
                    </div>
                    <div class="flex">
                        <div class="play" data-src="uploaded_music/<?= $fetch_song['music'] ?>"><i
                                    class="fas fa-play"></i></div>
                        <a href="uploaded_music/<?= $fetch_song['music'] ?>" download><i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</section>
</body>
</html>