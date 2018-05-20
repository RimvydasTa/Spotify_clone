<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 18:50
 */

function sanitizeTextInput ($input){
    $input = strip_tags($input);
    $input = str_replace(" ", "", $input);

    return $input;
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
