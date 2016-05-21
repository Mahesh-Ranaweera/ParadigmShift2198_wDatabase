<?php
    include_once 'database.php';

    if(isset($_POST["delete"]))
    {
        $row = $_POST["img_id"];
        
        #delete file from the database
        $sql = "DELETE FROM first_img WHERE img_id='".$row."'";
        mysqli_query($sql) or die('Database Error');
                
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo 'FILE DELETE ERROR';
    }
?>