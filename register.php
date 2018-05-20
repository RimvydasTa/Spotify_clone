<?php include ("includes/classes/Account.php");
    //Instiantiated class can be used in all includes listed below
    $registerAccount = new Account();

include ("includes/classes/Constants.php");
?>
<?php include ("includes/handlers/register_handler.php"); ?>
<?php include ("includes/handlers/login_handler.php"); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotiify!</title>
</head>
<body>
    <form id="loginForm" action="register.php" method="POST" name="">
        <h2>Log in to your account!</h2>
        <p>
            <label for="loginUsername">Username</label>
            <input type="text" name="loginUsername" id="loginUsername" placeholder="e.g bartSimpson" required>
        </p>
        <p>
            <label for="loginPassword">Password</label>
            <input type="password" name="loginPassword" id="loginPassword"  placeholder="Your Password"  required>
        </p>
        <button type="submit" name="log_in_button">Log in</button>
    </form>

    <form id="registerForm" action="register.php" method="POST" name="">
        <h2>Create  your free account!</h2>
        <p>
            <?php echo $registerAccount->getError(Constants::$usernameLength)?>
            <label for="registerUsername">Username</label>
            <input type="text" name="registerUsername" id="registerUsername" placeholder="e.g bartSimpson" required>
        </p>
        <p>
            <?php echo $registerAccount->getError(Constants::$firstNameLength)?>
            <label for="registerFirstName">First Name</label>
            <input type="text" name="registerFirstName" id="registerFirstName" placeholder="e.g Bart" required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$lastNameLength)?>
            <label for="registerLastName">Last name</label>
            <input type="text" name="registerLastName" id="registerLastName" placeholder="e.g Simpson" required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$emailWrongFormat)?>
            <label for="registerEmail">Email</label>
            <input type="email" name="registerEmail" id="registerEmail" placeholder="e.g bartSimpson@email.com" required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$emailsDoNotMatch)?>
            <label for="registerEmailConfirm">Confirm Email</label>
            <input type="email" name="registerEmailConfirm" id="registerEmailConfirm" placeholder="e.g bartSimpson@email.com" required>
        </p>


        <p>
            <?php echo $registerAccount->getError(Constants::$passwordWrongFormat)?>
            <?php echo $registerAccount->getError(Constants::$passwordLength)?>
            <label for="registerPassword">Password</label>
            <input type="password" name="registerPassword" id="registerPassword" placeholder="Your Password"  required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$passwordsDoNotMatch)?>
            <label for="registerPasswordConfirm">Confirm Password</label>
            <input type="password" name="registerPasswordConfirm" id="registerPasswordConfirm"  required>
        </p>
        <button type="submit" name="register_button">Sign up!</button>
    </form>
</body>
</html>