<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 6/14/2018
 * Time: 11:23
 */
include ("../../config.php");
if (isset($_POST['songId'])){
    $songId = $_POST['songId'];
    $songIdQuery = mysqli_query($connection, "select * from songs where id = '$songId'");
    $resultArray = mysqli_fetch_array($songIdQuery);
    echo json_encode($resultArray);
}
