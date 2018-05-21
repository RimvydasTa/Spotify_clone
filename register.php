<?php include ('includes/config.php') ?>
<?php include ("includes/classes/Account.php");
    //Instiantiated class can be used in all includes listed below
    $registerAccount = new Account($connection);

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
    <form id="loginForm" action="register.php" method="POST">
        <h2>Log in to your account!</h2>
        <p>
            <label for="loginUsername">Username</label>
            <input type="text" name="loginUsername" id="loginUsername" placeholder="e.g bartSimpson"  required>
        </p>
        <p>
            <?php echo $registerAccount->getError(Constants::$loginFailed); ?>
            <label for="loginPassword">Password</label>
            <input type="password" name="loginPassword" id="loginPassword"  placeholder="Your Password"  required>
        </p>
        <button type="submit" name="log_in_button">Log in</button>
    </form>

    <form id="registerForm" action="register.php" method="POST">
        <h2>Create  your free account!</h2>
        <p>
            <?php echo $registerAccount->getError(Constants::$usernameLength);?>
            <?php echo $registerAccount->getError(Constants::$usernameExists);?>
            <label for="registerUsername">Username</label>
            <input type="text" name="registerUsername" id="registerUsername" placeholder="e.g bartSimpson" value="<?php getInputValue('registerUsername'); ?>" required>
        </p>
        <p>
            <?php echo $registerAccount->getError(Constants::$firstNameLength);?>
            <label for="registerFirstName">First Name</label>
            <input type="text" name="registerFirstName" id="registerFirstName" placeholder="e.g Bart" value="<?php getInputValue('registerFirstName'); ?>" required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$lastNameLength);?>
            <label for="registerLastName">Last name</label>
            <input type="text" name="registerLastName" id="registerLastName" placeholder="e.g Simpson" value="<?php getInputValue('registerLastName'); ?>" required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$emailWrongFormat);?>
            <?php echo $registerAccount->getError(Constants::$emailExists);?>
            <label for="registerEmail">Email</label>
            <input type="email" name="registerEmail" id="registerEmail" placeholder="e.g bartSimpson@email.com" value="<?php getInputValue('registerEmail'); ?>" required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$emailsDoNotMatch);?>
            <label for="registerEmailConfirm">Confirm Email</label>
            <input type="email" name="registerEmailConfirm" id="registerEmailConfirm" placeholder="e.g bartSimpson@email.com" value="<?php getInputValue('registerEmailConfirm'); ?>" required>
        </p>


        <p>
            <?php echo $registerAccount->getError(Constants::$passwordWrongFormat);?>
            <?php echo $registerAccount->getError(Constants::$passwordLength);?>
            <label for="registerPassword">Password</label>
            <input type="password" name="registerPassword" id="registerPassword" placeholder="Your Password"  required>
        </p>

        <p>
            <?php echo $registerAccount->getError(Constants::$passwordsDoNotMatch);?>
            <label for="registerPasswordConfirm">Confirm Password</label>
            <input type="password" name="registerPasswordConfirm" id="registerPasswordConfirm"  required>
        </p>
        <button type="submit" name="register_button">Sign up!</button>
    </form>
</body>
</html>