<!DOCTYPE html>

<?php
    session_start();
    #include 'php/info.php';   
    $user_loginID = '<div class="user_loginID">';
    $frcGameName=""; $frcGameYear=date('Y'); $frcVideoLink=""; $frcGameDesc=""; 
    $frcGameRules=""; $frcRobotName=""; $frcRobotDesc="";

    $vexGameName=""; $vexGameYear=date('Y'); $vexVideoLink=""; $vexGameDesc=""; 
    $vexGameRules=""; $vexRobotName=""; $vexRobotDesc="";

    include 'php/error.php';
    include 'php/database.php';
    include 'php/youtube_URL.php';  #trim Youtube URL
    include 'php/tableCheck.php';
?>

<!--
ParadigmShift dashboard
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            ParadigmShift | dashboard
        </title>

        <link type="text/css" rel="stylesheet" href="css/dashboard.css">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!--favicon-->

        <!--scripts-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/jQuery.js"></script>
        <!--script to display and hide divs-->
        <script type="application/javascript">
            $(document).ready(function(){
                $("ul li").click(function(){
                    $('div[id^="page"]').css("display", "none");
                    $('div[id^="page"]').eq($(this).index()).css("display", "block");
                });
            });
        </script>
        
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
		
		<!--script to preview the uploaded file-->
		<script type="application/javascript">
            function readURLforLogo(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgShow_logo')
                            .attr('src', e.target.result)
                            .width(100)
                            .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            function readURLforField(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgShow_field')
                            .attr('src', e.target.result)
                            .width(178)
                            .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            function readURLforRobot(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgShow_robot')
                            .attr('src', e.target.result)
                            .width(178)
                            .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            
            function readURLforOther(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgShow_other')
                            .attr('src', e.target.result)
                            .width(178)
                            .height(100);
                    };

                    reader.readAsDataURL(input.files[0]);
                } 
            }
        </script>
    </head>

    <body bgcolor="263238">
    <!--Post info wrap-->
    <!--<div class="submit_msg_post">
        <strong><i class="fa fa-check"></i> Success!</strong><br>
        <text>New Post successfully posted</text>
        <div class="exit_btn"><i class="fa fa-times fa-2x"></i></div>
    </div>
    
    <<div class="submit_msg_error">
        <strong><i class="fa fa-exclamation-triangle"></i> Error</strong><br>
            <text>New Post successfully posted</text>
            <div class="exit_btn"><i class="fa fa-times fa-2x"></i></div>
        </div>-->
    
    <!--check user-->
    <?php 
       $email = $_SESSION['email'];
       $firstName = $_SESSION['firstName'];
       $lastName = $_SESSION['lastName'];
       
       if(!isset($email))
       {
           mysqli_close($conn); 
           header('Location: index.html'); 
       }
    ?>
        
        <!--header-->
        <div id="header_wrapper">
            <div class="header">
                <div class="header_text_wrapper">
                   <span>
                       <div class="dashboard_ico"></div>
                       <div class="dashboard_text">Dashboard</div>
                   </span>
                </div>
                
                <div class="user_id_wrapper">
                   <span>
                       <div class="userID_text"><?php echo $firstName.", ".$lastName; ?></div>
                       <div class="user_ID"></div>
                   </span>
                </div>
            </div>
            <div class="nav_bar">
                <ul class="nav_btns">
                    <li id="page1">
                        <div class="pg_btn" id="1">
                            | First |
                        </div>
                    </li>
                    <li id="page2">
                        <div class="pg_btn" id="2">
                            | Vex |
                        </div>
                    </li>
                    <li id="page3">
                        <div class="pg_btn" id="3">
                            | First Posts |
                        </div>
                    </li>
                    <li id="page4">
                        <div class="pg_btn" id="4">
                            | Main |
                        </div>
                    </li>
                    <a href="php/sign_out.php" class="pg_logout red">Sign Out <i class="fa fa-sign-out fa-lg"></i>
                    </a>
                </ul>
            </div>
        </div>
        
        <!--content-->
        <div id="content_wrapper">
           <!--card1 for First-->
            <div class="new_card displayDefault" id="page1">
                <div class="new_card_header">
                    <div class="newpost_ico"></div>
                    <div class="card_headtext">FIRST COMPETITION</div>
                </div>
                
                <!--form to upload competition small logo-->    
                
                <div class="post_info">ENTER COMPETITION LOGO</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                       <div class="upload_img_wrapper">
                           <div class="comp_logo img_cover_upload">
                               <img id="imgShow_logo" src="#" alt="" width="auto" height="auto" />
                           </div>
                       </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforLogo(this);">
                            <input type="hidden" name="filePass" value="first_logo_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>  
                </div>    
                <!--form to upload competition field image-->    
                
                <div class="post_info">ENTER COMPETITION FIELD IMAGE</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_field img_cover_upload">
                                <img id="imgShow_field" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforField(this);">
                            <input type="hidden" name="filePass" value="first_field_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>
                </div>  
                <!--form to upload competition field image-->    
                
                <div class="post_info">OTHER IMAGES</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_other img_cover_upload">
                                <img id="imgShow_other" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforOther(this);">
                            <input type="hidden" name="filePass" value="first_other_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>
                </div>    
                
                <div class="post_info">ENTER COMPETITION ROBOT IMAGE</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_robot img_cover_upload">
                                <img id="imgShow_robot" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforRobot(this);">
                            <input type="hidden" name="filePass" value="first_robot_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>
                </div>
                
                <?php
                    if (isset($_POST["frcPost"]))
                    {
                        $frcGameName = $_POST['str_frcGameName'];
                        $frcGameYear = $_POST['str_frcGameYear']; 
                        $frcVideoLink= $_POST['str_frcVideoLink'];
                        $frcGameDesc = $_POST['str_frcGameDesc'];
                        $frcGameRules= $_POST['str_frcGameRules'];
                        $frcRobotName= $_POST['str_frcRobotName'];
                        $frcRobotDesc= $_POST['str_frcRobotDesc'];
                    }
                    
                    if (isset($_POST["frcReset"]))
                    {
                        $frcGameName=""; $frcGameYear=""; $frcVideoLink=""; $frcGameDesc=""; 
                        $frcGameRules=""; $frcRobotName=""; $frcRobotDesc="";
                        header('Location: dashboard.php');
                    }
                ?>
                <!--form for the competition descriptions-->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="new_card_header_info">
                
                        <div class="input_group">      
                            <input type="text" name="str_frcGameName" placeholder="COMPETITION NAME"  value="<?php echo $frcGameName; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>
                        
                        <div class="input_group">      
                            <input type="text" name="str_frcGameYear" placeholder="YEAR" value="<?php echo $frcGameYear; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>
                        
                        <div class="input_group">      
                            <input type="text" name="str_frcVideoLink" placeholder="COMPETITION VIDEO LINK {Video URL}" value="<?php echo $frcVideoLink; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>
                        
                    </div>
                    
                    <div class="new_card_content">
                        <div class="textarea_wrapper">
                          <div class="post_info">COMPETITION DESCRIPTION</div>
                           <div class="textarea_resizer">
                               <textarea name="str_frcGameDesc" placeholder="Enter Description" cols="60" rows="10" onkeyup="document.getElementById('text_preview').innerHTML = this.value" required></textarea>
                               <div id="text_preview">
                                   <?php echo $frcGameDesc; ?>
                               </div>
                           </div>
                        </div>
                    </div>
                    
                    <div class="new_card_content">
                        <div class="textarea_wrapper">
                            <div class="post_info">COMPETITION RULES</div>
                            <div class="textarea_resizer">
                                <textarea name="str_frcGameRules" placeholder="Enter competition rules" cols="60" rows="10"  onkeyup="document.getElementById('text_preview2').innerHTML = this.value" required></textarea>
                                <div id="text_preview2">
                                    <?php echo $frcGameRules; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--Robot DESCRIPTION Start here-->
                    <div class="post_info">ROBOT</div>
                    
                    <div class="new_card_header_info">

                        <div class="input_group">      
                            <input type="text" name="str_frcRobotName" placeholder="ROBOT NAME" value="<?php echo $frcRobotName; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>

                    </div>
                    
                    <div class="new_card_content">
                        <div class="textarea_wrapper">
                            <div class="post_info">ROBOT DESCRIPTION</div>
                            <div class="textarea_resizer">
                                <textarea name="str_frcRobotDesc" placeholder="Enter competition rules" cols="60" rows="10"  onkeyup="document.getElementById('text_preview3').innerHTML = this.value" required></textarea>
                                <div id="text_preview3">
                                    <?php echo $frcRobotDesc; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="new_card_submit">
                        <input type="hidden" name="cardName" value="first">
                        <button type="submit" name="frcPost" class="btnFont">POST ENTRY</button>
                        <button type="reset"  name="frcReset" class="btnFont">RESET</button>
                    </div>
                    
                    <?php

                    if(isset($_POST['frcPost']))
                    {
                        $tablename = $_POST['cardName'];   #frc Game name either first/vex

                        #TEXT INFO-->
                        $frcGameYear = $_POST['str_frcGameYear'];   #frc Game year | ID of database
                        $frcGameName = $_POST['str_frcGameName'];   #frc Game name

                        $frcVideoLink = $_POST['str_frcVideoLink'];  #frc Youtube Video link

                        #Trimming youtube URL
                        $frcVideoLink =  URLtrim($frcVideoLink);   

                        $frcGameDesc = $_POST['str_frcGameDesc'];   #frc Game Description
                        $frcGameRules= $_POST['str_frcGameRules'];  #frc Game Rules

                        $frcRobotName= $_POST['str_frcRobotName'];  #frc Robot Name
                        $frcRobotDesc= $_POST['str_frcRobotDesc'];  #frc Robot Description

                        $year=$frcGameYear;
                        echo $year."<br>";  
                        $exist = ExistCheck($year,$tablename);
                        echo $exist."<br>";
                        
                        #check wether the row already exist to avoid overwritting
                        if($exist == 1)
                        {
                            $dataCheck = RowCheck($year,$tablename);
                            echo $dataCheck."<br>"; 
                            
                            $val=1;

                            if($dataCheck == 1)
                            {
                                echo "IN UPDATE";
                                #UPDATE CODE
                                $sql = "UPDATE $tablename SET comp_name='$frcGameName', video_url='$frcVideoLink', comp_desc='$frcGameDesc', comp_rules='$frcGameRules',                                                           robot_name='$frcRobotName', robot_desc='$frcRobotDesc' WHERE year='$year'";
                                
                                $retval = mysqli_query($conn, $sql);
                                
                                if (!$retval)
                                {
                                    die ("POST UPLOAD ERROR");
                                }
                                else
                                {
                                    db_postConn();
                                } 
                                mysqli_close($conn);
                                #header('Location: dashboard.php');
                            }
                            else
                            {
                                echo "IN INSERT".$tablename.$year;
                                #INSERT VALUE
                                $sql = "INSERT INTO `$tablename`(`year`,`val`,`comp_name`, `video_url`, `comp_desc`, `comp_rules`, `robot_name`, `robot_desc`) 
                                VALUES ('$year','$val','$frcGameName','$frcVideoLink','$frcGameDesc','$frcGameRules','$frcRobotName','$frcRobotDesc')";
                                
                                $retval = mysqli_query($conn, $sql);
                                
                                if (!$retval)
                                {
                                    die ("POST UPLOAD ERROR");
                                }
                                else
                                {
                                    db_postConn();
                                } 
                                mysqli_close($conn);
                                #header('Location: dashboard.php');
                            }
                        }
                        else
                        {
                            die ("ALREADY POSTED");
                        }      
                    }
                    ?>
                </form>
            </div>
            
            <!--card2 for Vex-->
            <div class="new_card" id="page2">
                <div class="new_card_header">
                    <div class="newpost_ico"></div>
                    <div class="card_headtext">VEX COMPETITION</div>
                </div>

                <!--form to upload competition small logo-->    

                <div class="post_info">ENTER COMPETITION LOGO</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_logo img_cover_upload">
                                <img id="imgShow_logo" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforLogo(this);">
                            <input type="hidden" name="filePass" value="vex_logo_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>  
                </div>    
                <!--form to upload competition field image-->    

                <div class="post_info">ENTER COMPETITION FIELD IMAGE</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_field img_cover_upload">
                                <img id="imgShow_field" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforField(this);">
                            <input type="hidden" name="filePass" value="vex_field_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>
                </div>  
                <!--form to upload competition field image-->    

                <div class="post_info">OTHER IMAGES</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_other img_cover_upload">
                                <img id="imgShow_other" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforOther(this);">
                            <input type="hidden" name="filePass" value="vex_other_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>
                </div>    

                <div class="post_info">ENTER COMPETITION ROBOT IMAGE</div>
                <div class="form_file_wrapper">
                    <form action="php/img_upload.php" method="post" enctype="multipart/form-data">
                        <div class="upload_img_wrapper">
                            <div class="comp_robot img_cover_upload">
                                <img id="imgShow_robot" src="#" alt="" width="auto" height="auto" />
                            </div>
                        </div>
                        <div class="upload_wrapper">
                            <input type="file" name="file_img" onchange="readURLforRobot(this);">
                            <input type="hidden" name="filePass" value="vex_robot_img">
                            <div class="input_group">      
                                <input type="text" name="year_img" placeholder="YEAR" value="<?php echo date('Y'); ?>" required>
                                <span class="highlight"></span>
                                <span class='bluebar'></span>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btnFont">SUBMIT</button>
                    </form>
                </div>

                <?php
                if (isset($_POST["vexPost"]))
                {
                    $vexGameName = $_POST['str_vexGameName'];
                    $vexGameYear = $_POST['str_vexGameYear']; 
                    $vexVideoLink= $_POST['str_vexVideoLink'];
                    $vexGameDesc = $_POST['str_vexGameDesc'];
                    $vexGameRules= $_POST['str_vexGameRules'];
                    $vexRobotName= $_POST['str_vexRobotName'];
                    $vexRobotDesc= $_POST['str_vexRobotDesc'];
                }

                if (isset($_POST["vexReset"]))
                {
                    $vexGameName=""; $vexGameYear=""; $vexVideoLink=""; $vexGameDesc=""; 
                    $vexGameRules=""; $vexRobotName=""; $vexRobotDesc="";
                    header('Location: dashboard.php');
                }
                ?>
                <!--form for the competition descriptions-->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="new_card_header_info">

                        <div class="input_group">      
                            <input type="text" name="str_vexGameName" placeholder="COMPETITION NAME"  value="<?php echo $vexGameName; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>

                        <div class="input_group">      
                            <input type="text" name="str_vexGameYear" placeholder="YEAR" value="<?php echo $vexGameYear; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>

                        <div class="input_group">      
                            <input type="text" name="str_vexVideoLink" placeholder="COMPETITION VIDEO LINK {Video URL}" value="<?php echo $vexVideoLink; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>

                    </div>

                    <div class="new_card_content">
                        <div class="textarea_wrapper">
                            <div class="post_info">COMPETITION DESCRIPTION</div>
                            <div class="textarea_resizer">
                                <textarea name="str_vexGameDesc" placeholder="Enter Description" cols="60" rows="10" onkeyup="document.getElementById('text_preview').innerHTML = this.value" required></textarea>
                                <div id="text_preview">
                                    <?php echo $vexGameDesc; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="new_card_content">
                        <div class="textarea_wrapper">
                            <div class="post_info">COMPETITION RULES</div>
                            <div class="textarea_resizer">
                                <textarea name="str_vexGameRules" placeholder="Enter competition rules" cols="60" rows="10"  onkeyup="document.getElementById('text_preview2').innerHTML = this.value" required></textarea>
                                <div id="text_preview2">
                                    <?php echo $vexGameRules; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Robot DESCRIPTION Start here-->
                    <div class="post_info">ROBOT</div>

                    <div class="new_card_header_info">

                        <div class="input_group">      
                            <input type="text" name="str_vexRobotName" placeholder="ROBOT NAME" value="<?php echo $vexRobotName; ?>" required>
                            <span class="highlight"></span>
                            <span class='bluebar'></span>
                        </div>

                    </div>

                    <div class="new_card_content">
                        <div class="textarea_wrapper">
                            <div class="post_info">ROBOT DESCRIPTION</div>
                            <div class="textarea_resizer">
                                <textarea name="str_vexRobotDesc" placeholder="Enter competition rules" cols="60" rows="10"  onkeyup="document.getElementById('text_preview3').innerHTML = this.value" required></textarea>
                                <div id="text_preview3">
                                    <?php echo $frcRobotDesc; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="new_card_submit">
                        <input type="hidden" name="cardName" value="vex">
                        <button type="submit" name="vexPost" class="btnFont">POST ENTRY</button>
                        <button type="reset"  name="vexReset" class="btnFont">RESET</button>
                    </div>

                    <?php

                    if(isset($_POST['vexPost']))
                    {
                        $tablename = $_POST['cardName'];   #frc Game name either first/vex

                        #TEXT INFO-->
                        $vexGameYear = $_POST['str_vexGameYear'];   #frc Game year | ID of database
                        $vexGameName = $_POST['str_vexGameName'];   #frc Game name

                        $vexVideoLink = $_POST['str_vexVideoLink'];  #frc Youtube Video link

                        #Trimming youtube URL
                        $vexVideoLink =  URLtrim($frcVideoLink);   

                        $vexGameDesc = $_POST['str_vexGameDesc'];   #frc Game Description
                        $vexGameRules= $_POST['str_vexGameRules'];  #frc Game Rules

                        $vexRobotName= $_POST['str_vexRobotName'];  #frc Robot Name
                        $vexRobotDesc= $_POST['str_vexRobotDesc'];  #frc Robot Description

                        $year=$vexGameYear;
                        echo $year."<br>";  
                        $exist = ExistCheck($year,$tablename);
                        echo $exist."<br>";

                        #check wether the row already exist to avoid overwritting
                        if($exist == 1)
                        {
                            $dataCheck = RowCheck($year,$tablename);
                            echo $dataCheck."<br>"; 

                            $val=1;

                            if($dataCheck == 1)
                            {
                                echo "IN UPDATE";
                                #UPDATE CODE
                                $sql = "UPDATE $tablename SET comp_name='$vexGameName', video_url='$vexVideoLink', comp_desc='$vexGameDesc', comp_rules='$vexGameRules',                                                           robot_name='$vexRobotName', robot_desc='$vexRobotDesc' WHERE year='$year'";

                                $retval = mysqli_query($conn, $sql);

                                if (!$retval)
                                {
                                    die ("POST UPLOAD ERROR");
                                }
                                else
                                {
                                    db_postConn();
                                } 
                                mysqli_close($conn);
                                #header('Location: dashboard.php');
                            }
                            else
                            {
                                echo "IN INSERT".$tablename.$year;
                                #INSERT VALUE
                                $sql = "INSERT INTO `$tablename`(`year`,`val`,`comp_name`, `video_url`, `comp_desc`, `comp_rules`, `robot_name`, `robot_desc`) 
                                VALUES ('$year','$val','$vexGameName','$vexVideoLink','$vexGameDesc','$vexGameRules','$vexRobotName','$vexRobotDesc')";

                                $retval = mysqli_query($conn, $sql);

                                if (!$retval)
                                {
                                    die ("POST UPLOAD ERROR");
                                }
                                else
                                {
                                    db_postConn();
                                } 
                                mysqli_close($conn);
                                #header('Location: dashboard.php');
                            }
                        }
                        else
                        {
                            die ("ALREADY POSTED");
                        }      
                    }
                    ?>
                </form>
            </div>
            
            <!--card3 for firstPosts-->
            <div class="new_card" id="page3">
        
                 <div class="entry_container">
                    
                </div>
                
            </div>
            
        </div>
        
        <!--background-->
        <div id="grid"></div>
    </body>
</html>