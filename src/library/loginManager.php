<?php

function authUser($userData)
{
    // Checks if user in input exists in JSON DB (if it does creates session and goes to dashboard), and handles error cases
    session_start();

    $username = $userData['username'];
    $password = $userData['password'];

    $usersArray = getUsers();

    foreach ($usersArray['users'] as $user) {
        if (array_search($username, $user) !== false) {
            $currentUser = $user;
        }
    }

    $result = checkInputData($currentUser, $password);

    if ($result === "wrong-pass") {
        header("Location: ../../index.php?error=password");
    } elseif ($result) {
        $_SESSION["username"] = $currentUser['name'];
        $_SESSION["duration"] = 6; // Time in seconds to session timeout; 600 = 10 minutes
        $_SESSION["initTime"] = time();
        header("Location: ../dashboard.php");
    } elseif (!$result) {
        header("Location: ../../index.php?error=unregistered");
    }
}

function getUsers()
{
    // Returns a clean array from JSON users DB file
    $rawJSON = file_get_contents('../../resources/users.json');
    $usersDB = json_decode($rawJSON, true);
    return $usersDB;
}

function checkInputData($currentUser, $password)
{
    // Matches input data with data in JSON DB, and returns key value to redirection
    if (isset($currentUser) && password_verify($password, $currentUser['password'])) {
        return true;
    } elseif (isset($currentUser) && !password_verify($password, $currentUser['password'])) {
        return "wrong-pass";
    } elseif (!isset($currentUser)) {
        return false;
    }
}
