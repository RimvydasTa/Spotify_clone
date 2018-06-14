<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 6/12/2018
 * Time: 22:39
 */

spl_autoload_register(function ($className) {
    $basedir = 'classes/';
    $ds = DIRECTORY_SEPARATOR;
    $className = str_replace('\\', $ds, $className);
    $file = "{$basedir}{$className}.php";
    if (is_readable($file)) require_once $file;
});