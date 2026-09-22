<?php
    session_start();

    if (!isset($_SESSION['authenticated_user'])) {
        header('Location: ./login.php');
        exit();
    }

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
        <h1>Home Page</h1>
    </div>

    <!-- TODO: Print logged in user name in "user-name" span here -->
    <!-- CODE STARTS HERE -->
    <div>
        Welcome, <span id="user-name"><?php echo htmlspecialchars($user['name']); ?></span>
        </div>
    <!-- CODE ENDS HERE -->
    <div>
        <div>
            Menu:
        </div>
        <ul>
            <li><a href="./profile.php">View Profile</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>