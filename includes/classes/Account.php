<?php
/**
 * Created by PhpStorm.
 * User: Rimvydas
 * Date: 5/20/2018
 * Time: 19:40
 */

class Account
{
    private $errorArray;
    public function __construct()
    {
        $this->errorArray = array();
    }

        public function registerAccount($username, $firstname, $lastname, $email, $confirmEmail, $password, $confirmPassword){
            $this->validateUsername($username);
            $this->validateName($firstname, 'First');
            $this->validateName($lastname, 'Last');
            $this-> validateEmail($email, $confirmEmail);
            $this->validatePassword($password, $confirmPassword);

            if (empty($this->errorArray)){
                //Insert into db
                return true;
            }else {
                return false;
            }
        }

        public function getError($error){
            if (!in_array($error, $this->errorArray)){
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

       private function validateUsername ($username){
            if (strlen($username) > 25 || strlen($username) < 5){
                array_push($this->errorArray, Constants::$usernameLength);
                return;
            }
            //TODO: check if username exists
        }

        //Second param string for first or last name
        private function validateName ($name, $letter){
            if (strlen($name) > 50 || strlen($name) < 2){
                array_push($this->errorArray, 'Error: ' . $letter . ' name must be between 2 and 50 characters');
                return;
            }
        }

        private function validateEmail ($email, $confirmEmail){
            if ($email != $confirmEmail){
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
            //Checks if correct email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($this->errorArray, Constants::$emailWrongFormat);
                return;
            }

            //TODO: Check if username already in use
        }

        private function validatePassword ($password, $confirmPassword){
            if ($password != $confirmPassword){
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }

            if (preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($this->errorArray, Constants::$passwordWrongFormat);
                return;
            }

            if (strlen($password) < 9){
                array_push($this->errorArray, Constants::$passwordLength);
                return;
            }


        }



}