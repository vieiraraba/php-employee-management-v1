<?php

/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function strToNumber(array $employeeToNumber) // Convert string to number
{
    $employeeToNumber['id'] = (int)$employeeToNumber['id'];
    $employeeToNumber['age'] = (int)$employeeToNumber['age'];
    $employeeToNumber['streetAddress'] = (int)$employeeToNumber['streetAddress'];
    $employeeToNumber['phoneNumber'] = (int)$employeeToNumber['phoneNumber'];
    $employeeToNumber['postalCode'] = (int)$employeeToNumber['postalCode'];
    return $employeeToNumber;
}

function addEmployee(array $newEmployee)
{
    // Get the database connection file
    $jsonData = file_get_contents('../../resources/employees.json');
    // Convert the JSON string to a PHP array
    $data = json_decode($jsonData, true);

    $existEmployee = false;
    $numberEmployee = strToNumber($newEmployee);

    foreach ($data as $user) {
        // Check if the employee already exists in the database
        if ($user['id'] == $numberEmployee['id']) {
            $existEmployee = true;
            array_splice($data, array_search($user, $data), 1, [$numberEmployee]);
        }
    }
    // If the employee doesn't exist, we add it to the array
    if (!$existEmployee) {
        $data[] = $numberEmployee;
    }
    // Convert the array to a JSON string
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    // Save the JSON string to the database file
    file_put_contents('../../resources/employees.json', $jsonData);
}


function deleteEmployee(string $id)
{
    // Get the database connection file
    $jsonData = file_get_contents('../../resources/employees.json');
    // Convert the JSON string to a PHP array
    $data = json_decode($jsonData, true);

    foreach ($data as $user) {
        // Check if the employee already exists in the database
        if ($user["id"] == $id) {
            // If the employee exists, we delete it from the array
            array_splice($data, array_search($user, $data), 1);
        }
    }
    // Convert the array to a JSON string
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    // Save the JSON string to the database file
    file_put_contents('../../resources/employees.json', $jsonData);
}


function updateEmployee(array $updateEmployee)
{
    // Get the database connection file
    $jsonData = file_get_contents('../../resources/employees.json');
    // Convert the JSON string to a PHP array
    $data = json_decode($jsonData, true);
    foreach ($data as $user) {
        // Check if the employee already exists in the database
        if ($user['id'] == $updateEmployee['id']) {
            $updateEmployee = strToNumber($updateEmployee);
            array_splice($data, array_search($user, $data), 1, [$updateEmployee]);
        }
    }
    // Convert the array to a JSON string
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    // Save the JSON string to the database file
    file_put_contents('../../resources/employees.json', $jsonData);
}


/* function getEmployee(string $id)
{
}


function removeAvatar($id)
{
}


function getQueryStringParameters(): array
{
}

function getNextIdentifier(array $employeesCollection): int
{
}
 */