<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <script type="module" src="../assets/js/index.js" defer></script>
</head>

<body>

    <table class="table">

		<thead class="thead-dark">
			<tr>
                <th>Gender</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>City</th>
                <th>Address</th>
                <th>State</th>
                <th>Postal Code</th>
                <th>Phone Number</th>
                <th>&nbsp;</th>
			</tr>
		</thead>

    <?php
        $data = file_get_contents("../resources/employees.json");
        $employees = json_decode($data, true);
        if(count($employees) != 0){
            foreach ($employees as $employee) {
                ?>
                    <tr>
                        <td> <?php echo $employee['gender']; ?> </td>
                        <td> <?php echo $employee['name']; ?> </td>
                        <td> <?php echo $employee['lastName']; ?> </td>
                        <td> <?php echo $employee['age']; ?> </td>
                        <td> <?php echo $employee['email']; ?> </td>
                        <td> <?php echo $employee['city']; ?> </td>
                        <td> <?php echo $employee['streetAddress']; ?> </td>
                        <td> <?php echo $employee['state']; ?> </td>
                        <td> <?php echo $employee['postalCode']; ?> </td>
                        <td> <?php echo $employee['phoneNumber']; ?> </td>
                    </tr>
                <?php
            }
        }
    ?>
</table>
    <?php

    session_start();

    require_once("./library/sessionHelper.php");

    checkSession(); // We check if the user has active login
    checkSessionExpired(); // We check if the user session is still active

    require_once("../assets/html/header.html");

    ?>

</body>

</html>