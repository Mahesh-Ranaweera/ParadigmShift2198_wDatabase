<?php
    function ExistCheck($input_year,$table)
    {
        include 'php/database.php';

        $sqlCheck = "SELECT year,val,comp_name FROM $table";
        $check = mysqli_query($conn, $sqlCheck);

        #echo "ROWCHECK<br>";

        while($row = mysqli_fetch_array($check))
        {
            if ($row["year"] == $input_year && $row["val"] == 1)
            {
                if($row["comp_name"] == '') 
                {
                    return ($x=1);
                }
                else
                {
                    return ($x=0);
                }
            }
        }
        return ($x=1);
    }

    function RowCheck($input_year,$table)
    {
        include 'php/database.php';

        $sqlCheck = "SELECT year,val,comp_name FROM $table";

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