<?php

// TODO: Check user data and credential given from register.php page and save user data to session
// Detail TODO:
// 1. Validate the user data is valid or not
//      1.1. User name: must be filled
//      1.2. User email: ends with @gmail.com or @binus.ac.id
//      1.3. User gender: between Male, Female, and Prefer not to tell
//      1.4. User password: at least 8 characters, at least consists of 1 upper case characters, 1 lower case characters, 1 number, and 1 symbol
// 2. If all validation checks out, save user data to session
// 3. Redirect user to login.php page to log in

// CODE STARTS HERE
    session_start();

    $userName = $_POST["user_name"] ?? '';
    $userEmail = $_POST["user_email" ] ?? '';
    $userGender = $_POST["gender"] ?? '';
    $userPassword = $_POST["user_password"] ?? '';

    $error = '';

    if (trim($userName) == '') {
        $error = 'User name cannot be empty';
    } elseif (!str_ends_with($userEmail,'@gmail.com') && !str_ends_with($userEmail,'@binus.ac.id')) {
        $error = 'User e-mail must end with @gmail.com or @binus.ac.id';
    } elseif ((!in_array($userGender, ['male', 'female', 'prefer_not_to_tell']))) {
        $error = 'Invalid gender';
    } elseif ( strlen($userPassword) < 8 || 
      !preg_match('/[A-Z]/', $userPassword) || 
      !preg_match('/[a-z]/', $userPassword) ||
      !preg_match('/[0-9]/', $userPassword) ||
      !preg_match('/[^a-zA-Z0-9]/', $userPassword)
    ) {
        $error = 'Password must be at least 8 characters and containt at least 1 uppercase character, 1 lowercase character, 1 number, and 1 symbol';
    }

    if ($error != '') {
        header('Location: ../register.php?error=' . urlencode($error));
        exit();
    }

    $_SESSION['registered_user'] = [
        'name'=> $userName,
        'email'=> $userEmail,
        'gender'=> $userGender,
        'password'=> $userPassword
    ];

    header('Location: ../login.php');
    exit();