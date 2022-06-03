<?php

require_once("./employeeManager.php");

switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        addEmployee($_POST);
        break;
    case 'PUT':

        break;
    case 'DELETE':
        // Get the database connection file
        parse_str(file_get_contents("php://input"), $delete_vars);
        deleteEmployee($delete_vars["id"]);
        break;
    default:
        break;
}
