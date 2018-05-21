<?php
/**
 * Created by PhpStorm.
 * User: rimvydas
 * Date: 18.5.21
 * Time: 13.31
 */
ob_start();
session_start();
$timezone = date_default_timezone_set('Europe/Vilnius');

$connection = mysqli_connect('localhost', 'root', 'root', 'slotify');

if(!$connection){
    echo "failed to connect" . mysqli_connect_errno();
}