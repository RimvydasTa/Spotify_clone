<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 18:04
 */
    include ("includes/config.php");
    if (isset($_POST['userLoggedIn'])){
        $loginUsername = $_POST['userLoggedIn'];
    }else {
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
    <title>Welcome to Slotify1</title>
</head>
<body>
<h1>Index php</h1>
</body>
</html>
