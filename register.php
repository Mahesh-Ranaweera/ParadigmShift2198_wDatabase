<!DOCTYPE html>

<?php
    session_start();
    $strUserN="";    $strE="";     $strP="";        $strPC="";            $strFN="";	    $strLN="";
    $testUsername=0; $testEmail=0; $testPassword=0; $testPasswordCheck=0; $testFirstName=0; $testLastName=0;
?>

<html>
    <head>
        <title>
            USER | REGISTER
        </title>

        <!--Script-->
        <link type="text/css" rel="stylesheet" href="css/loginUI.css">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/jQuery.js"></script>
        <!--scripts close the msg div-->
        <script type="application/javascript">
            $(window).load(function()
                           {
                $(".submit_msg_post").fadeOut(5000);
            });
            $(window).load(function()
                           {
                $(".submit_msg_error").fadeOut(5000);
            });
        </script>

    </head>

    <!--check the file submit information -->
    <?php include 'php/submit_check.php'; ?>  

    <body bgcolor="263238">

        <!--grid-->
        <div id="grid"></div>

        <!--user login-->
        <div id="login_wrapper_register">
            <div class="title_header"><b>USER</b> | REGISTER</div>
            <div class="line_wrapper"></div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                <input type="email" name="strEmail" placeholder="Email" value="<?php echo $strE; ?>" required>

                <input type="text" name="strFirstName" placeholder="First Name" value="<?php echo $strFN; ?>" required>

                <input type="text" name="strLastName" placeholder="Last Name" value="<?php echo $strLN; ?>"  required>

                <input type="text" name="strUsername" placeholder="Username" value="<?php echo $strUserN; ?>" required>

                <input type="password" name="strPasswordC" placeholder="Password" value="<?php echo $strPC; ?>" required>

                <input type="password" name="strPassword" placeholder="Retype Password" value="<?php echo $strP; ?>" required>

                <button type="submit" name="submit">Submit</button>
                
                <p><a href="login.php">Log In <i class="fa fa-external-link"></i></a></p>
            </form>
        </div>


                    <!--PHP code-->
                    <?php

                        /*error function*/
                        include 'php/error.php'; 
                        include 'php/database.php';

                        if(isset($_POST["submit"]) && !($testUsername+$testPassword+$testEmail+$testPasswordCheck+$testFirstName+$testLastName))
                        {
                        $strUsername    = $_POST["strUsername"];           #username
                        $strEmail       = $_POST["strEmail"];              #email
                        $strFirstName   = $_POST["strFirstName"];          #firstName 
                        $strLastName    = $_POST["strLastName"];           #lastName
                        $strPassword    = md5($_POST["strPassword"]);      #password
                        $strPassword2   = md5($_POST["strPasswordC"]);     #retype password

                        #check the two passwords for final authetication
                        if($strPassword == $strPassword2)
                        {

                        # change INSERT INTO 'DATABASE' name
                        $sql = "INSERT INTO `paradigm`.`credentials` (`username`,`firstName`,`lastName`,`email`,`password`,`resetpassw`) 
                        VALUES ('$strUsername','$strFirstName','$strLastName','$strEmail','$strPassword','$strPassword2')";

                        $retval = mysqli_query($conn, $sql);
                        if (!$retval)
                        {
                        db_entryError();
                        #die (db_entryError());
                        }
                        else
                        {
                        db_entryConn();
                        }
                        mysqli_close($conn); 
                        }
                        else
                        {
                        conn_passw_error();
                        }
                        }
                    ?>
    </body>
</html>