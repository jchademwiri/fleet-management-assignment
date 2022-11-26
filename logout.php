<!-- logout.php  -->
<?php
session_start();
if (session_destroy()) {
    header("location:https://www.google.com");
}
