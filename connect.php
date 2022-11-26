<!-- connect.php  -->
<?php

$connection = new mysqli('localhost', 'root', '', 'fms');

if (!$connection) {
    die(mysqli_error($connection));
} else {
}
