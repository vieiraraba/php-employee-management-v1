<?php

require_once("./employeeManager.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        addEmployee($_POST);
        break;
    case 'PUT':
        parse_str(file_get_contents("php://input"), $put);
        updateEmployee($put);
        break;
    case 'DELETE':
        // Get the database connection file
        parse_str(file_get_contents("php://input"), $delete);
        deleteEmployee($delete["id"]);
        break;
    default:
        break;
}
