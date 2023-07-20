<?php
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
          <span>'.$message .'</span>
    <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
</div>";
    }
}
?>
<section class="form-container">
    <h3 class="heading">upload music</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <p>music name <span>*</span></p>
        <input class="input" type="text" name="name" placeholder="Enter music name" required maxlength="100">
        <p>artist name <span>*</span></p>
        <input class="input" type="text" name="name" placeholder="Enter artist name" required maxlength="100">
        <p>select music <span>*</span></p>
        <input class="input" type="file" name="music" accept="audio/*" required>
        <p>select album <span>*</span></p>
        <input class="input" type="file" name="album" accept="image/*" required>
        <input class="btn" type="submit" name="submit" value="upload music">
        <a href="home.php" class="option-btn">go to home</a>

    </form>
</section>
</body>
</html>