<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 18:04
 */
include("includes/config.php");
if (isset($_SESSION['userLoggedIn'])) {
    $loginUsername = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotify!</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div id="mainContainer">

    <?php include ("includes/navBarContainer.php")?>
    <?php include ("includes/nowPlayingBarContainer.php")?>



</body>
</html>
