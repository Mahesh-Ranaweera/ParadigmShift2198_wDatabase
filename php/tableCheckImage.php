<?php
function ExistCheck($input_year,$fileLoc,$table)
{
    include 'database.php';

    $sqlCheck = "SELECT year,val,$fileLoc FROM $table";
    $check = mysqli_query($conn, $sqlCheck);

    #echo "ROWCHECK<br>";

    while($row = mysqli_fetch_array($check))
    {
        if ($row["year"] == $input_year && $row["val"] == 1)
        {
            #check file location is NULL to avoid overwritting
            #$tempPathSQL = str_replace($row["$fileLoc"],'',$tempPathSQL);

            if($row["$fileLoc"] == NULL) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    return true;
}

function RowCheck($input_year,$fileLoc,$table)
{
    include 'database.php';

    $sqlCheck = "SELECT year,val,$fileLoc FROM $table";

    $check = mysqli_query($conn, $sqlCheck);

    #echo "ROWCHECK<br>";

    while($row = mysqli_fetch_array($check))
    {
        if ($row["year"] == $input_year && $row["val"] == 1)
        {
            $value = 1;
            return($value);
        }
    }
    $value = 0;
    return($value);
}
?>