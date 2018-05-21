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
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->errorArray = array();
    }

    /**
     * @return mixed
     */
    public function loginAccount($loginUsername, $loginPassword)
    {
        $loginPassword = md5($loginPassword);

        $loginQuery = mysqli_query($this->connection, "select * from users where users.password = '$loginPassword'");

        if(mysqli_num_rows($loginQuery) == 1){
            return true;
        }else {
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }

    }
        public function registerAccount($username, $firstname, $lastname, $email, $confirmEmail, $password, $confirmPassword){
            $this->validateUsername($username);
            $this->validateName($firstname, 'First');
            $this->validateName($lastname, 'Last');
            $this-> validateEmail($email, $confirmEmail);
            $this->validatePassword($password, $confirmPassword);

            if (empty($this->errorArray)){
                //Insert into db

                return $this->insertUserDetails($username, $firstname, $lastname, $email, $password);
            }else {

                return false;
            }
        }

        private  function insertUserDetails($username, $firstname, $lastname, $email,  $password){
            $encryptedPassword = md5($password);
            $profilePic = "assets/images/profile_pics/head_emerald.png";
            $date = date("Y-m-d");

            $result = mysqli_query($this->connection,
                "insert into users values (null, 
                '$username', 
                '$firstname', 
                '$lastname', 
                '$encryptedPassword', 
                '$date', 
                '$profilePic', 
                '$email')
                ");

            if (!$result){
                mysqli_errno($this->connection);
            }

            return $result;
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
            $checkUsernameQuery  = mysqli_query($this->connection, "select users.username from users where users.username = '$username' " );
            if (mysqli_num_rows($checkUsernameQuery) != 0){
                array_push($this->errorArray, Constants::$usernameExists);
            }
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
            $checkEmailQuery  = mysqli_query($this->connection, "select users.email from users where users.email = '$email' " );
            if (mysqli_num_rows($checkEmailQuery) != 0){
                array_push($this->errorArray, Constants::$emailExists);
            }
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