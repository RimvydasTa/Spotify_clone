<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 6/14/2018
 * Time: 11:44
 */

include ("../../config.php");
if (isset($_POST['artistId'])){
    $artistId = $_POST['artistId'];
    $artistQuery = mysqli_query($connection, "select * from artists where id = '$artistId'");
    $resultArray = mysqli_fetch_array($artistQuery);
    echo json_encode($resultArray);
}