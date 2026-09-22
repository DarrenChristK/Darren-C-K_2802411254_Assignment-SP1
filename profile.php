<?php
    session_start();

    $user = $_SESSION['authenticated_user'];
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
        <h1>View Profile Page</h1>
    </div>

    <!-- TODO: Print logged in user name, user e-mail address, and user gender in respective input tags -->
    <!-- CODE STARTS HERE -->
    <div>
        <div>
            <label for="user-name">User Name</label>
            <input type="text" id="user-name" value="<?php echo htmlspecialchars($user['name']); ?>" disabled>
        </div>
        <div>
            <label for="user-email">User E-mail Address</label>
            <input type="text" id="user-email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled>
        </div>
        <div>
            <label for="user-gender">User Gender</label>
            <input type="text" id="user-gender" value="<?php echo htmlspecialchars($user['gender']); ?>" disabled>
        </div>
    </div>
    <!-- CODE ENDS HERE -->
</body>
</html>