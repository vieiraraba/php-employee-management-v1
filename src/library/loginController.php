<?php

require_once('./loginManager.php');

function getLoginData()
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $loginData = ["username" => $username, "password" => $password];
    return $loginData;
}

function authUserCall()
{
    $getLoginData = getLoginData();
    authUser($getLoginData);
}

authUserCall();

require_once("./sessionHelper.php");

if (isset($_GET['status']) && $_GET['status'] === "logout") logOut("logOutBtn");
