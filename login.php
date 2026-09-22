<?php
session_start();

if (!isset($_SESSION['authenticated_user']) && isset($_COOKIE['remember_me'])) {
    $rememberedUser = json_decode($_COOKIE['remember_me'], true);

    if (
        is_array($rememberedUser) &&
        isset($rememberedUser['name']) &&
        isset($rememberedUser['email']) &&
        isset($rememberedUser['gender'])
    ) {
        $_SESSION['authenticated_user'] = $rememberedUser;

        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Project 1 - Login Register</title>
</head>
<body>
    <div>
        <div>
            Login
        </div>

        <!-- TODO: When user clicks login, form will collect data in input tags and send the data to actions/doLogin.php using POST request method. -->
        <!-- CODE STARTS HERE -->
        <form action="actions/doLogin.php" method="POST">
            <div>
                <label for="user-email">E-mail Address</label>
                <input type="text" id="user-email" name="user_email">
            </div>
            <div>
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="user_password">
            </div>
            <div>
                <input type="checkbox" name="remember_me" id="remember-me"> 
                <label for="remember-me">Remember me</label>
            </div>
            <div>
                Don't have an account? <a href="./register.php">Register</a>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>

            <!-- TODO: Print error message, if exists, that comes from actions/doLogin.php. -->
            <!-- CODE STARTS HERE -->
            <div id="error-message">
                <?php
                if (isset($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
            </div>
            <!-- CODE ENDS HERE -->

        </form>
        <!-- CODE ENDS HERE -->
    </div>
</body>
</html>