<?php
    $dbhost = localhost;
    $dbuser = "mi6softl_user";
    $dbase  = "mi6softl_paradigm";
    $dbpass = "0774983831";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbase) or die(db_conn_error());
?>