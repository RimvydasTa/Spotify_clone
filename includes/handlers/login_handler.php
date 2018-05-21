<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 19:25
 */

if (isset($_POST['log_in_button'])){
    //Log in button was pressed
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

        $result = $registerAccount->loginAccount($loginUsername, $loginPassword);

        if ($result){
            header("Location: index.php");
        }
    //Login function
}