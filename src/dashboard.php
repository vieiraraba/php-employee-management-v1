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
    <link id="css" rel="stylesheet" href="../assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <script type="module" src="../assets/js/index.js" defer></script>
    <script type="module" src="../assets/js/switchTheme.js" defer></script>
</head>

<body>
    <?php

    session_start();

    require_once("./library/sessionHelper.php");

    checkSession(); // We check if the user has active login
    checkSessionExpired(); // We check if the user session is still active

    require_once("../assets/html/header.html");

    ?>

    <div id="update-toast" class='update-toast toast align-items-center text-white bg-dark bg-gradient border-0 w-25 mx-auto my-5 mt-1' role='alert' aria-live='assertive' aria-atomic='true'>
        <div class='d-flex'>
            <div class='toast-body'>
                <span class='text-center'>Employee successfully updated.</span>
            </div>
        </div>
    </div>
    <div id="delete-toast" class='delete-toast toast align-items-center text-white bg-dark bg-gradient border-0 w-25 mx-auto my-5 mt-1' role='alert' aria-live='assertive' aria-atomic='true'>
        <div class='d-flex'>
            <div class='toast-body'>
                <span id='employee-deleted'>Employee successfully deleted.</span>
            </div>
        </div>
    </div>
    <div id="jsGrid" class="js-grid"></div>

    <section class="animated-background">
        <div id="stars1"></div>
        <div id="stars2"></div>
        <div id="stars3"></div>
    </section>

    <div class="quote">
        “When I wrote this code, only God and I understood what I did. Now only God knows.”
    </div>

</body>

</html>