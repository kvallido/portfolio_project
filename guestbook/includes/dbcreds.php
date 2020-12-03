<?php
//dbcreds.php

//Connect to database
$database = "kvallido_grc";
$username = "kvallido_grcuser";
$password = "Sanr!o06";
$hostname = "localhost";

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("There was a problem.");
//var_dump($cnxn);