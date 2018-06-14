<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/27/2018
 * Time: 21:39
 */

include("includes/config.php");

//require "autoload.php";
include("includes/classes/Helper.php");
include("includes/classes/Album.php");
include("includes/classes/Artist.php");
include("includes/classes/Song.php");

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
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>

<div id="mainContainer">

    <?php include ("includes/navBarContainer.php")?>

    <div id="mainViewContainer">
        <div id="mainContent">