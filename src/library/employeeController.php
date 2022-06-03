<?php

require_once("./employeeManager.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        addEmployee($_POST);
        break;
    case 'PUT':

        break;
    case "DELETE":

        break;
    default:
        break;
}
