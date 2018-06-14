<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 6/14/2018
 * Time: 12:18
 */

include ("../../config.php");
if (isset($_POST['albumId'])){
    $albumId = $_POST['albumId'];
    $albumQuery = mysqli_query($connection, "select * from albums where id = '$albumId'");
    $resultArray = mysqli_fetch_array($albumQuery);
    echo json_encode($resultArray);
}