<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $regNumber = $_POST['regNumber'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $fuelType = $_POST['fuelType'];
    $tankCapacity = $_POST['tankCapacity'];
    $previousOwner = $_POST['previousOwner'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $driver = $_POST['driver'];

    $sql = "INSERT INTO `vehicles` (regNumber, make, model,fuelType,tankCapacity,previousOwner,branch,department,driver) 
    VALUES('$regNumber','$make','$model','$fuelType','$tankCapacity','$previousOwner','$branch','$department','$driver')";


    $result = mysqli_query($connection, $sql);
    if ($result) {
        // echo "Data interted successfully";
        header('location:dashboard.php');
    } else {
        die(mysqli_error($connection));
    }
}
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
            var regNumber = document.forms["vehicleRegistration"]["regNumber"].value;
            if (regNumber == "") {
                alert("Please enter the Vehicle registration Number");
                return false;
            }
            var make = document.forms["vehicleRegistration"]["make"].value;
            if (make == "") {
                alert("Please enter the Vehicle make");
                return false;
            }
            var model = document.forms["vehicleRegistration"]["model"].value;
            if (model == "") {
                alert("Please enter the Vehicle model");
                return false;
            }
            var fuelType = document.forms["vehicleRegistration"]["fuelType"].value;
            if (fuelType == "") {
                alert("Please enter the Vehicle Fuel Type");
                return false;
            }
            var tankCapacity = document.forms["vehicleRegistration"]["tankCapacity"].value;
            if (tankCapacity == "") {
                alert("Please enter the Tank Capacity");
                return false;
            } else {
                if (isNaN(tankCapacity)) {
                    alert("Tank Capacity must be a number");
                    return false;
                }
            }
            var previousOwner = document.forms["vehicleRegistration"]["previousOwner"].value;
            if (previousOwner == "") {
                alert("Please enter the Vehicle Previous Owner");
                return false;
            }
            var branch = document.forms["vehicleRegistration"]["branch"].value;
            if (branch == "") {
                alert("Please enter the Branch name");
                return false;
            }
            var department = document.forms["vehicleRegistration"]["department"].value;
            if (department == "") {
                alert("Please enter the Vehicle Department Name");
                return false;
            }
            var driver = document.forms["vehicleRegistration"]["driver"].value;
            if (driver == "") {
                alert("Please enter the Vehicle Driver Name");
                return false;
            }

        }
    </script>

    <!-- END FORM VALIDATION  -->

</head>

<body>
    <header>
        <?php include "./shared/nav.php"; ?>
        <!-- <?php include "./shared/header.php"; ?> -->
    </header>
    <main class="container">
        <section class="form">

            <h1> Enter the details of the New Vehicle</h1>
            <form method="POST" name="vehicleRegistration" onsubmit="return validate()">
                <div class="form-group">
                    <label for="regNumber">Registration Number</label>
                    <input type="text" class="form-control" autocapitalize="on" name="regNumber" placeholder="Enter Vehicle Reg Number">
                </div>
                <div class="form-group">
                    <label for="make">Vehicle Make</label>
                    <input type="text" class="form-control" name="make" placeholder="Enter Vehicle Make">
                </div>
                <div class="form-group">
                    <label for="model">Vehicle Model</label>
                    <input type="text" class="form-control" name="model" placeholder="Enter Vehicle Model">
                </div>
                <div class="form-group">
                    <label for="fuelType">Fuel Type</label>
                    <input type="text" class="form-control" name="fuelType" placeholder="Enter Fuel Type">
                </div>
                <div class="form-group">
                    <label for="tankCapacity">Tank Capacity</label>
                    <input type="number" class="form-control" name="tankCapacity" placeholder="Enter Tank Capacity">
                </div>
                <div class="form-group">
                    <label for="previousOwner">Previous Owner</label>
                    <input type="text" class="form-control" name="previousOwner" placeholder="Enter Previous Owner">
                </div>
                <div class="form-group">
                    <label for="branch">Branch Name</label>
                    <input type="text" class="form-control" name="branch" placeholder="Enter Branch Name">
                </div>
                <div class="form-group">
                    <label for="department">Department Name</label>
                    <input type="text" class="form-control" name="department" placeholder="Enter Deparment Name">
                </div>
                <div class="form-group">
                    <label for="driver">Driver Name</label>
                    <input type="text" class="form-control" name="driver" placeholder="Enter Name of Driver">
                </div>
                <div>
                    <input class="form-button" type="submit" name="submit" value="Save New Vehicle">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <?php include "./shared/footer.php"; ?>
    </footer>
</body>

</html>