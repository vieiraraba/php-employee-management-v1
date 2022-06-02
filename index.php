<!-- TODO Application entry point. Login view -->
<?php

require_once("./src/library/sessionHelper.php");

checkSessionToDashboard();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
    <script src="./assets/js/showPass.js" defer></script>
</head>

<body>

    <div class="mt-5 d-flex flex-column justify-content-center align-items-center">
        <?php
        if (isset($_GET['status']) && $_GET['status'] === "loggedOut") {
            echo "<div class='error'>Successfully logged out, we hope to see you again soon</div>";
        } elseif (isset($_GET['status']) && $_GET['status'] === "sessionTimeOut") {
            echo "<div class='error'>Sorry, your session expired, please login again</div>";
        }

        if (isset($_GET['error'])) {
            if ($_GET['error'] === "password") {
                echo '<div class="error">The password is incorrect, try again</div>';
            } elseif ($_GET['error'] === "unregistered") {
                echo '<div class="error">The user is not registered</div>';
            }
        }
        ?>

        <div class="login_form">
            <section class="login-wrapper">

                <form id="login" method="post" action="./src/library/loginController.php" autocomplete="off">

                    <label for="username">User Name</label>
                    <input name="username" type="text" required />

                    <label for="password">Password</label>
                    <input id="password" class="password" name="password" type="password" required />
                    <i id="togglePassword" class="far fa-eye"></i>
                    <button type="submit">Sign In</button>
                </form>

            </section>
        </div>
    </div>

</body>

</html>