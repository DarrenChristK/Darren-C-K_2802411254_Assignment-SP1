<?php

// TODO: Check sent user credentials from login.php page and logged them into the web application
// Detail TODO:
// 1. Get user credentials (email and password) that has been sent from login.php
// 2. Compare sent user credentials and saved user credentials when register new user (refer to the Register page procedure and logic)
// 3. If user comparation shows the user does not exists in saved user credentials, redirect back to login.php page and show error message of "Wrong user e-mail and password combination".
// 4. If user comparation shows the user exists in saved user credentials, regenerate the session ID, save user data to session as logged on user and redirect to home.php

// Notes:
// 1. When user chooses to check "Remember Me" checkbox, issue a persistent cookie with an expiration of 7 days. On another day the user accessed the web application, they will be logged on to their logged on user data.

// CODE STARTS HERE
    session_start();

    $userEmail = $_POST['user_email'] ?? '';
    $userPassword = $_POST['user_password'] ?? '';

    if (
        isset($_SESSION['registered_user']) &&
        $_SESSION['registered_user']['email'] === $userEmail &&
        $_SESSION['registered_user']['password'] === $userPassword
    ) {
        session_regenerate_id(true);
        $_SESSION['authenticated_user'] = $_SESSION['registered_user'];
        if (isset($_POST['remember_me'])) {
            setcookie(
                'remember_me',
                json_encode([
                    'name' => $_SESSION['registered_user']['name'],
                    'email' => $_SESSION['registered_user']['email'],
                    'gender' => $_SESSION['registered_user']['gender']
                ]),
                time() + (7 * 24 * 60 * 60),
                '/'
            );
        }
        header('Location: ../index.php');
        exit();
    }

    header('Location: ../login.php?error=' . urlencode('Wrong user e-mail and password combination'));
    exit();