<!DOCTYPE html>

<?php
    session_start();
?>

<html>
    <head>
        <title>
            USER | LOGIN
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

    <body bgcolor="263238">

        <!--grid-->
        <div id="grid"></div>
            
        <div id="login_wrapper">
            <div class="title_header"><b>USER</b> | LOGIN</div>
            <div class="line_wrapper"></div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">      
                <input type="email" name="strEmail" placeholder="Email" required>
                <input type="password" name="strPassword" placeholder="Type Password" required>
                <button type="submit" name="submit">Login</button>
            </form>
            <p><a href="#">Reset my password <i class="fa fa-external-link"></i></a></p>
        </div>
    </body>
    <?php
        include 'php/error.php'; 
        include 'php/database.php'; 

        if (isset($_POST["submit"]))
        {    
        $sql = 'SELECT email,username,firstName,lastName,password,resetpassw FROM credentials';

        $retval = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($retval))
        {
        if ($row["email"] == $_POST["strEmail"] && $row["password"] == md5($_POST["strPassword"]))
        {
            $_SESSION['email'] = $_POST["strEmail"];
            $_SESSION['firstName'] = $row["firstName"];
            $_SESSION['lastName'] = $row["lastName"];
            header("location: dashboard.php");
        }
        }
        db_conn_error();
        }
        mysqli_close($conn);
    ?>
</html>