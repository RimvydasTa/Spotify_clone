<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 18:50
 */

function sanitizeTextInput ($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);

    return $inputText;
}

function sanitizeNameInput($name){
    $name = strip_tags($name);
    $name = str_replace(" ", "",$name);
    $name = ucfirst(strtolower($name));

    return $name;
}

function sanitizePassword ($password){
    $password = strip_tags($password);

    return $password;
}

function getInputValue($inputName){
    if (isset($_POST[$inputName])){
        echo $_POST[$inputName];
    }
}