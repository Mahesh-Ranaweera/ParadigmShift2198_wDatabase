<!DOCTYPE html>

<?php
    include 'php/database.php';
?>

<html>
    <head>
        <title>POSTS</title>
    </head>
    
    <body>
        <?php

        ?>
    </body>
</html>


<?php
include_once 'php/dbconfig.php';

$usercount = 0;
$num_first = 0; //number of first entries


$sql = 'SELECT username,email,password,firstName,lastName FROM credentials';
$retval = mysqli_query($conn, $sql);

if(! $retval)
{
    die(db_conn_error().mysql_error());
}

#count number of users
$sql_usercount = "SELECT * FROM credentials";
$result  = mysqli_query($conn,$sql_usercount);
$usercount = mysqli_num_rows($result);

echo "number of users:" . $usercount."<br>";

while($row = mysqli_fetch_array($retval))
{
    echo "Email:".$row["email"]." FirstName: ".$row["firstName"]."LastName: ".$row["lastName"]."<br>";
}

#count number of first entries
$sql_firstcount = "SELECT * FROM first";
$result  = mysqli_query($conn,$sql_firstcount);
$num_first = mysqli_num_rows($result);

echo "number of first entries:" . $num_first."<br>";

$sql2 = 'SELECT year,comp_name,video_url,comp_desc FROM first';
$retval2 = mysqli_query($conn,$sql2);

if(! $retval2)
{
    die(db_conn_error().mysqli_error());
}

//print the database values
while($row = mysqli_fetch_array($retval2))
{
    $vidURL = $row['video_url'];

    echo $vidURL."<br>";

    echo "Year:".$row["year"]." compName: ".$row["comp_name"]."<br>";

}

?>