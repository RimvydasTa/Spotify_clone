<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 20:37
 */

class Constants
{

    //Register
    public static $usernameLength = 'Error: Username must be between 5 and 25 characters';
    public static $firstNameLength = 'Error: First name must be between 2 and 50 characters';
    public static $lastNameLength = 'Error: Last name must be between 2 and 50 characters';
    public static $emailsDoNotMatch = 'Error: Emails do not match';
    public static $emailWrongFormat  = 'Error: Wrong email format';
    public static $emailExists  = 'Error: Email already in use';
    public static $passwordWrongFormat = 'Error: Passwords can only contain numbers and letters';
    public static $passwordsDoNotMatch = 'Error: Passwords do not match';
    public static $passwordLength = 'Error: Password must be atleast 9 characters';
    public static $usernameExists = 'Error: Username exists, choose a different one';


    //Login
    public static $loginFailed = 'Error: Wrong password';

}