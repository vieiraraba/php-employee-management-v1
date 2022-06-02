<!-- TODO Employee view -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<?php

session_start();

require_once("./library/sessionHelper.php");

checkSession(); // We check if the user has active login
checkSessionExpired(); // We check if the user session is still active

require_once("../assets/html/header.html");

?>

<div class="d-flex flex-column align-items-center">
    <form method="POST" action="" class="employee-form">
        <div class="form-row">
            <div>
                <label for="name">Name</label>
                <input class="form-input" type="text" name="name" id="name" required value="">
            </div>
            <div>
                <label for="last-name">Last Name</label>
                <input class="form-input" type="text" name="lastName" id="lastName" required value="">
            </div>
        </div>
        <div class="form-row">
            <div>
                <label for="email-address">Email address</label>
                <input class="form-input" type="email" name="email" id="email" required value="">
            </div>
            <div>
                <label for="gender">Gender</label>
                <select class="form-input" name="gender" id="gender">
                    <option>Man</option>
                    <option>Woman</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div>
                <label for="city">City</label>
                <input class="form-input" type="text" name="city" id="city" required value="">
            </div>
            <div>
                <label for="street-address">Street Address</label>
                <input class="form-input" type="number" name="streetAddress" id="streetAddress" required value="">
            </div>
        </div>
        <div class="form-row">
            <div>
                <label for="state">State</label>
                <input class="form-input" type="text" name="state" id="state" required value="">
            </div>
            <div>
                <label for="age">Age</label>
                <input class="form-input" type="number" name="age" id="age" required value="">
            </div>
        </div>
        <div class="form-row">
            <div>
                <label for="postal-code">Postal Code</label>
                <input class="form-input" type="number" name="postalCode" id="postalCode" required value="">
            </div>
            <div>
                <label for="phone-number">Phone Number</label>
                <input class="form-input" type="number" name="phoneNumber" id="phoneNumber" required value="">
            </div>
        </div>
        <div class="btn-container">
            <button type="submit" data-text="Awesome" class="btn-submit">
                <span>Submit</span><i></i>
            </button>
            <a href="./dashboard.php" class="btn-return">
                <span>Return</span><i></i>
            </a>
        </div>
</div>
</form>
</div>

</html>