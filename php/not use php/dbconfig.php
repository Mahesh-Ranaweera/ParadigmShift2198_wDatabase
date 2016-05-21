<?php
$dbhost = "localhost:3306";
$dbuser = "root";
$dbase  = "paradigm";
$dbpass = "";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbase) or die(db_conn_error());
?>