<?php
include 'connect.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM `vehicles` WHERE id = $id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$regNumber = $row['regNumber'];
$make = $row['make'];
$model = $row['model'];
$fuelType = $row['fuelType'];
$tankCapacity = $row['tankCapacity'];
$previousOwner = $row['previousOwner'];
$branch = $row['branch'];
$department = $row['department'];
$driver = $row['driver'];

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

    $sql = "UPDATE `vehicles` SET id=$id, regNumber='$regNumber', make='$make', model='$model', fuelType='$fuelType', tankCapacity='$tankCapacity',previousOwner='$previousOwner', branch='$branch', department='$department',driver='$driver' WHERE id=$id";


    $result = mysqli_query($connection, $sql);
    if ($result) {
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
</head>

<body>
    <header>
        <?php include "./shared/nav.php"; ?>
        <!-- <?php include "./shared/header.php"; ?> -->
    </header>
    <main class="container">
        <section class="form">

            <h1> Update Vehicle</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="regNumber">Registration Number</label>
                    <input type="text" class="form-control" name="regNumber" placeholder="Enter Vehicle Reg Number" value=<?php echo $regNumber; ?>>
                </div>
                <div class="form-group">
                    <label for="make">Vehicle Make</label>
                    <input type="text" class="form-control" name="make" placeholder="Enter Vehicle Make" value=<?php echo $make; ?>>
                </div>
                <div class="form-group">
                    <label for="model">Vehicle Model</label>
                    <input type="text" class="form-control" name="model" placeholder="Enter Vehicle Model" value=<?php echo $model; ?>>
                </div>
                <div class="form-group">
                    <label for="fuelType">Fuel Type</label>
                    <input type="text" class="form-control" name="fuelType" placeholder="Enter Fuel Type" value=<?php echo $fuelType; ?>>
                </div>
                <div class="form-group">
                    <label for="tankCapacity">Tank Capacity</label>
                    <input type="text" class="form-control" name="tankCapacity" placeholder="Enter Tank Capacity" value=<?php echo $tankCapacity; ?>>
                </div>
                <div class="form-group">
                    <label for="previousOwner">Previous Owner</label>
                    <input type="text" class="form-control" name="previousOwner" placeholder="Enter Previous Owner" value=<?php echo $previousOwner; ?>>
                </div>
                <div class="form-group">
                    <label for="branch">Branch Name</label>
                    <input type="text" class="form-control" name="branch" placeholder="Enter Branch Name" value=<?php echo $branch; ?>>
                </div>
                <div class="form-group">
                    <label for="department">Department Name</label>
                    <input type="text" class="form-control" name="department" placeholder="Enter Deparment Name" value=<?php echo $department; ?>>
                </div>
                <div class="form-group">
                    <label for="driver">Driver Name</label>
                    <input type="text" class="form-control" name="driver" placeholder="Enter Name of Driver" value=<?php echo $driver; ?>>
                </div>
                <div>
                    <input class="form-button" type="submit" name="submit" value="Update Vehicle">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <?php include "./shared/footer.php"; ?>
    </footer>
</body>

</html>