<?php

$username = "root";
$password = "";
$server = 'localhost:3307';
$db = 'bank_database';


$con = mysqli_connect($server, $username, $password, $db);

if($con){
    ?>
    <?php
} else {
    die("No connection" . mysqli_connect_error());
}

?>
