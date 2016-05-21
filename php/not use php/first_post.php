<?php
    include 'php/error.php';
    include 'php/database.php';
    include 'php/youtube_URL.php';  #trim Youtube URL

/*      include 'error.php';
        include 'dbconfig.php';
        include 'youtube_URL.php';  #trim Youtube URL*/
    
    if(isset($_POST['frcPost']))
    {
        
        $frcGameYear = $_POST['str_frcGameYear'];   #frc Game year | ID of database
        $frcGameName = $_POST['str_frcGameName'];   #frc Game name
        
        $frcVideoLink = $_POST['str_frcVideoLink'];  #frc Youtube Video link
        
        #Trimming youtube URL
        $frcVideoLink =  URLtrim($frcVideoLink);   
        
        $frcGameDesc = $_POST['str_frcGameDesc'];   #frc Game Description
        $frcGameRules= $_POST['str_frcGameRules'];  #frc Game Rules
        
        $frcRobotName= $_POST['str_frcRobotName'];  #frc Robot Name
        $frcRobotDesc= $_POST['str_frcRobotDesc'];  #frc Robot Description
        
        
        #INSERT DATA INTO MYSQL
        $sql = "INSERT INTO `first`(`year`, `comp_name`, `video_url`, `comp_desc`, `comp_rules`, `robot_name`, `robot_desc`) VALUES ('$frcGameYear','$frcGameName','$frcVideoLink','$frcGameDesc','$frcGameRules','$frcRobotName','$frcRobotDesc')";
        
        $retval = mysqli_query($conn, $sql);
        if (! $retval)
        {
            db_entryError();
            #die (db_entryError());
        }
        else
        {
            db_entryConn();
        } 
        mysqli_close($conn); 
        #header('Location: '.$_SERVER['HTTP_REFERER']);
    }
?>