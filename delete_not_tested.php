<?php
    include "php/database.php";

    if(isset($_POST["delete"]))
    {   
        $row = $_POST["img_id"];
        $row_delete = $row;
        
        /*$dbhost = "localhost:3306";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "paradigm";
        
        $conn = mysql_connect($dbhost,$dbuser,$dbpass) or die('cannot connect to the server'); 
        mysql_select_db($dbname) or die('database selection problem');*/
        
        $sql1 = "SELECT img_path from first_img WHERE id ='".$row."'";
        
        $retval = mysqli_query($conn, $sql1);
            
        $row = mysqli_fetch_array($retval);
        
        $file_path = $row['img_path'];
        echo $file_path."<br>";
        
        #unlink($file_path);
        chown($file_path, 666);
        
        if(unlink($file_path))
        {
            $sql2 = 'DELETE FROM first_img WHERE id='.$row_delete;

            #mysql_select_db($dbname);
            $retval = mysqli_query( $conn, $sql2 );
            if(! $retval )
            {
                die('FILE NOT DELETED: ');
            }
            header('Location: '.$_SERVER['HTTP_REFERER']);
            die('FILE DELETED: ');
            mysqli_close($conn);
        }
        else
        {
            echo "FILE NOT DELETE";
        }
    }
?>