<?php include 'connect.php'; ?>

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

        <div class="vehicle-table">
            <table>
                <thead>
                    <tr>
                        <th>Reg Number</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Fuel Type</th>
                        <th>Tank Capacity</th>
                        <th>Prev Owner</th>
                        <th>Branch</th>
                        <th>Department</th>
                        <th>Driver</th>
                        <th>Update</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $sql = "SELECT * FROM `vehicles`";
                    // $sql = "SELECT * FROM `vehicles` WHERE fuelType = 'DIESEL'";
                    // $sql = "SELECT * FROM `vehicles` WHERE fuelType = 'PETROL'";
                    $result = mysqli_query($connection, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $regNumber = $row['regNumber'];
                            $make = $row['make'];
                            $model = $row['model'];
                            $fuelType = $row['fuelType'];
                            $tankCapacity = $row['tankCapacity'];
                            $previousOwner = $row['previousOwner'];
                            $branch = $row['branch'];
                            $department = $row['department'];
                            $driver = $row['driver'];

                            echo '
                            <tr>
                            <td>' . $regNumber . '</td>
                            <td>' . $make . '</td>
                            <td>' . $model . '</td>
                            <td>' . $fuelType . '</td>
                            <td>' . $tankCapacity .  ' L </td>
                            <td>' . $previousOwner . '</td>
                            <td>' . $branch . '</td>
                            <td>' . $department . '</td>
                            <td>' . $driver . '</td>
                            <td>
                             <a href="./update.php?updateid=' . $id . '">Update</a>
                             
                            </td>
                        </tr>
                            
                            ';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <?php include "./shared/footer.php"; ?>
    </footer>
</body>

</html>