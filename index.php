<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>FMS</title>

    <!-- START FORM VALIDATION  -->
    <script type="text/javascript">
        function validate() {
            var username = document.forms["vehicleRegistration"]["username"].value;
            if (username == "") {
                alert("Please enter Your Username");
                return false;
            }
            var password = document.forms["vehicleRegistration"]["password"].value;
            if (password == "") {
                alert("Please enter your password");
                return false;
            }
        }
    </script>

    <!-- END FORM VALIDATION  -->

</head>

<body>
    <main class="container">
        <section class="login-form">
            <div class="login">
                <h1> Login Below</h1>
                <form action="index.php" method="POST" name="vehicleRegistration" onsubmit="return validate()">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" autocapitalize="on" name="username" id="username" placeholder="Enter Vehicle Reg Number">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <div>
                        <input class="form-button" type="submit" name="submit" value="Login">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <?php include "./shared/footer.php"; ?>
    </footer>
    <?php

    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
        }

        if (isset($_SESSION['username'])) {
            header("location:dashboard.php");
        }
    }


    ?>
</body>

</html>