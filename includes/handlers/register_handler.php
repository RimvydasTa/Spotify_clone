<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 19:24
 */



include ("includes/helper_functions.php");




if (isset($_POST['register_button'])){
    //Register button was pressed
    //register  submit data
    $registerUsername =   sanitizeTextInput($_POST['registerUsername']);
    $registerFirstName = sanitizeNameInput($_POST['registerFirstName']);
    $registerLastName = sanitizeNameInput( $_POST['registerLastName']);

    $registerEmail = sanitizeNameInput($_POST['registerEmail']);
    $registerEmailConfirm = sanitizeNameInput($_POST['registerEmailConfirm']);

    $registerPassword = sanitizePassword($_POST['registerPassword']);
    $registerPasswordConfirm = sanitizePassword($_POST['registerPasswordConfirm']);

   $wasSuccessful = $registerAccount->registerAccount(
        $registerUsername,
        $registerFirstName,
        $registerLastName,
        $registerEmail,
        $registerEmailConfirm,
        $registerPassword,
        $registerPasswordConfirm
        );

   if ($wasSuccessful){
       header('Location: index.php');
   }

}

