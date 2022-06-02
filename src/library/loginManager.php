<?php
function getUsers()
{
    $rawJSON = file_get_contents('../../resources/users.json');
    $usersDB = json_decode($rawJSON, true);
    return $usersDB;
}

function checkInputData($currentUser, $password)
{
    if (isset($currentUser) && password_verify($password, $currentUser['password'])) {
        return true;
    } elseif (isset($currentUser) && !password_verify($password, $currentUser['password'])) {
        return "wrong-pass";
    } elseif (!isset($currentUser)) {
        return false;
    }
}

function authUser($userData)
{
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
        $_SESSION["duration"] = 600;
        $_SESSION["initTime"] = time();
        header("Location: ../dashboard.php");
    } elseif (!$result) {
        header("Location: ../../index.php?error=unregistered");
    }
}
