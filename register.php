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
            Register
        </div>

        <!-- TODO: When user clicks login, form will collect data in input tags and send the data to actions/doLogin.php using POST request method. -->
        <!-- CODE STARTS HERE -->
        <form action="actions/doRegister.php" method="POST">
            <div>
                <label>Full Name</label>
                <input type="text" id="user-name" name=user_name>
            </div>
            <div>
                <label>E-mail Address</label>
                <input type="text" id="user-email" name=user_email>
            </div>
            <div>
                <label>Gender</label>
                <input type="radio" name = "gender" value="male"> Male
                <input type="radio" name = "gender" value="female"> Female
                <input type="radio" name = "gender" value="prefer_not_to_tell"> Prefer not to tell
            </div>
            <div>
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="user_password">
            </div>
            <div>
                <button type="submit">Register</button>
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