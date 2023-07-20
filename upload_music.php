<?php
global $conn;
include "connect.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $artist = $_POST['artist'];
    $artist = filter_var($artist, FILTER_SANITIZE_STRING);
    if (!isset($artist)) {
        $artist = '';
    }

    $album = $_FILES['album']['name'];
    $album = filter_var($album, FILTER_SANITIZE_STRING);
    $album_size = $_FILES['album']['size'];
    $album_tmp_name = $_FILES['album']['tmp_name'];
    $album_folder = 'uploaded_album/' . $album;

    if (isset($album)) {
        if ($album_size > 2000000) {
            $message[] = 'album size is too large';
        } else {
            move_uploaded_file($album_tmp_name, $album_folder);
        }
    } else {
        $album = "";
    }

    $music = $_FILES['music']['name'];
    $music = filter_var($music, FILTER_SANITIZE_STRING);
    $music_size = $_FILES['music']['size'];
    $music_tmp_name = $_FILES['music']['tmp_name'];
    $music_folder = 'uploaded_music/' . $music;

    if ($music_size > 100000000) {
        $message[] = 'music size is too large';
    } else {
        $upload_music = $conn->prepare("INSERT INTO `songs`(name,artist,album,music) VALUES(?,?,?,?)");
        $upload_music->execute([$name, $artist, $album, $music]);
        move_uploaded_file($music_tmp_name, $music_folder);
        $message[] = "new music uploaded";
    }
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload music</title>
</head>
<body>
<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo "<div class='message'>
          <span>$message</span>
    <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
</div>";
    }
}
?>
<section class="form-container">
    <h3 class="heading sign">
        <span class="fast-flicker">u</span>ploa<span class="flicker">d</span> music
    </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <p>music name <span>*</span></p>
        <input class="input" type="text" name="name" placeholder="Enter music name" required maxlength="100">
        <p>artist name</p>
        <input class="input" type="text" name="artist" placeholder="Enter artist name" maxlength="100">
        <p>select music <span>*</span></p>
        <input class="input" type="file" name="music" accept="audio/*" required>
        <p>select album</p>
        <input class="input" type="file" name="album" accept="image/*">
        <input class="btn" type="submit" name="submit" value="upload music">
        <a href="home.php" class="option-btn">go to home</a>

    </form>
</section>
</body>
</html>