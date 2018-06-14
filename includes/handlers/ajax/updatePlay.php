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
    $songIdQuery = mysqli_query($connection, "update songs set plays = plays + 1 where id = '$songId'");

}
