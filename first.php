<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            Team2198 | FIRST
        </title>

        <link type="text/css" rel="stylesheet" href="css/index.css">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <!--scripts-->
        <!--script to resize header-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="application/javascript">
            $(function() {
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    if (scroll >= 55) {
                        $(".page_header_wrapper_blank").addClass('smaller');
                        $(".page_header_wrapper").addClass('smaller');
                        $(".page_id_img").addClass('smaller');
                        $(".page_header_text_wrapper").addClass('smaller');
                        $(".main_heading").addClass('smaller');
                        $(".sec_heading").addClass('smaller');
                        $(".official_link").addClass('smaller');
                    } else {
                        $(".page_header_wrapper_blank").removeClass("smaller");
                        $(".page_header_wrapper").removeClass('smaller');
                        $(".page_id_img").removeClass('smaller');
                        $(".page_header_text_wrapper").removeClass('smaller');
                        $(".main_heading").removeClass('smaller');
                        $(".sec_heading").removeClass('smaller');
                        $(".official_link").removeClass('smaller');
                    }
                });
            });
        </script>
        <!--script to display and hide divs-->
        <script type="application/javascript">
            $(document).ready(function(){
                $("ul li").click(function(){
                    $('div[id^="page"]').css("display", "none");
                    $('div[id^="page"]').eq($(this).index()).css("display", "block");   
                });
            });
        </script>
    </head>

    <body bgcolor="263238">
        <!--background_img-->
        <!--<div id="background_img"></div>-->
        <div id="grid"></div>

        <!--main_window-->
        <div class="page_header_wrapper_blank">
            <div class="page_header_wrapper">
                <div class="page_id_img">
                    <img src="assets/img/frcbtn_static.jpg" width="100%" height="100%">
                </div>
                <div class="page_header_text_wrapper">
                    <div class="main_heading">FIRST</div><br>
                    <div class="sec_heading">FOR INSPIRATION AND RECOGNITION OF SCIENCE AND TECHNOLOGY</div><br>
                    <div class="official_link">Official Websites: &nbsp; <a href="http://www.usfirst.org/">www.usfirst.org <i class="fa fa-external-link"></i></a> &nbsp; &nbsp; Forum:&nbsp; <a href="http://www.chiefdelphi.com/">www.chiefdelphi.com <i class="fa fa-external-link"></i></a></div>
                </div>
            </div> 
        </div>
        
        <!--page content-->
        <div id="main_page_wrapper">
            <div class="page_info">
                <p>FIRST is an international high school robotics competition. FRC is a ever growing community with 2720 + teams and over 45,000 + students from Australia, Brazil, Canada,Chile, Turkey, the Netherlands, Israel, the United States, the United Kingdom, and Mexico. Each year exciting new game is released. Teams will have to build the robot to overcome the challenge. Under strict rules, limited resources, and time limit, teams have to raise funds, build and program the robot. Mentors ,sponsors and volunteers and professionals guide students to succeed.</p>
            </div>
            <div class="page_content_wrapper">
                <table class="pagetable" cellspacing="0">
                    <tr>
                        <!--content navigation btn-->
                        <td>
                            <div class="nav_panel">
                                <!--navigation panel: should generate using php with unique id:should connect to js-->
                                <ul class='nav_btns'>
                                    <?php
                                        #GET ALL VALUES FROM THE DATABASE AND EMBED IN A POST
                                        include 'php/database.php';

                                    $sqlGet = "SELECT year,val,comp_name,first_logo FROM first";

                                    $retval = mysqli_query($conn, $sqlGet);
                                    $num1 = 1;

                                    while($row = mysqli_fetch_array($retval))
                                    {
                                        if($row["val"] == 1)
                                        {
                                            $idnav= 'game'.$num1;

                                            $year = $row['year'];
                                            $comp_name = $row['comp_name'];
                                            $img_logo  = $row['first_logo'];

                                            #page nav content goes here;
                                            $nav = "
                                                    <li id='$idnav'>
                                                        <div class='game_btn' id='$num1'>
                                                            <div class='game_img'><img src='$img_logo' width='100%' height='100%'></div>
                                                            <div class='game_text'>$comp_name</div>
                                                            <br>
                                                            <div class='game_text'>$year</div>
                                                        </div>
                                                    </li>";
                                            
                                            echo $nav;

                                            $num1 = $num1+1;
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </td>
                        <!--content navigation btn end-->    
                        
                        <!--page content start-->
                        <td>
                            <!--content wrapper-->
                            <div class='page_content'>
                            <?php
                            #GET ALL VALUES FROM THE DATABASE AND EMBED IN A POST
                            include 'php/database.php';

                            $sqlGet = "SELECT year,val,comp_name,video_url,comp_desc,comp_rules,robot_name,robot_desc,
               first_logo,first_field,first_robot,first_other FROM first";

                            $retval = mysqli_query($conn, $sqlGet);
                            $num = 1;

                            while($row = mysqli_fetch_array($retval))
                            {
                                if($row["val"] == 1)
                                {
                                    $id   = 'page'.$num;

                                    $year = $row['year'];
                                    $comp_name = $row['comp_name'];
                                    $video_url = $row['video_url'];
                                    $comp_desc = $row['comp_desc'];
                                    $comp_rules= $row['comp_rules'];
                                    $robot_name= $row['robot_name'];
                                    $robot_desc= $row['robot_desc'];
                                    $img_logo  = $row['first_logo'];
                                    $img_field = $row['first_field'];
                                    $img_robot = $row['first_robot'];
                                    $img_other = $row['first_other'];

                                    if($num == 1)
                                    {
                                        $default = 'displayDefault';
                                    }
                                    else{
                                        $default = '';
                                    }

                                    #page content goes here;
                                    $post = "
                                                <!--display-->
                                                <div class='game_content $default' id='$id'>
                                                    <div class='game_page_header'>
                                                        <div class='game_img_wrap'><img src='$img_logo' width='100%' height='100%'></div>
                                                        <div class='game_name_text'>$comp_name</div>
                                                        <div class='game_date_text'>$year</div>
                                                    </div>
                                                    <div class='game_video_wrap'>
                                                        $video_url
                                                    </div>
                                                    <div class='page_text_heading'>Game Description</div>
                                                    <div class='game_description_text'>$comp_desc</div>
                                                    <div class='page_text_heading'>Field Image</div>
                                                    <div class='game_field_img'>
                                                        <img src='$img_field' width='100%' height='100%'>
                                                    </div>
                                                    <div class='game_other_img'>
                                                        <img src='$img_other' width='100%' height='100%'>
                                                    </div>
                                                    <div class='page_text_heading'>Rules</div>
                                                    <div class='game_rules_text'>$comp_rules</div>
                                                    <div class='page_text_heading'>Robot</div>
                                                    <div class='robot_name_text'>Robot name: $robot_name</div>
                                                    <div class='game_robot_img'>
                                                        <img src='$img_robot' width='100%' height='100%'>
                                                    </div>
                                                    <div class='game_robot_description'>$robot_desc</div>
                                                </div>";
                                    echo $post;

                                    $num = $num+1;
                                }
                            }
                            ?>
                            </div>
                        </td>
                        <!--page content end-->
                    </tr>
                </table>
            </div>
            
            <!--page footer-->
            <div class="page_content_footer">
                <div class="page_link">NAVIGATION: &nbsp; 
                    <a href="https://www.youtube.com/user/paradigmshift2198">youtube <i class="fa fa-youtube-play fa"></i></a>&nbsp; 
                    <a href="https://www.facebook.com/team2198">facebook <i class="fa fa-facebook-official fa"></i></a>&nbsp; 
                    <a href="https://twitter.com/Team2198FRC">twitter <i class="fa fa-twitter fa"></i></a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="index.html"><i class="fa fa-angle-left"></i>HOME <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="first.php"><i class="fa fa-angle-left"></i>FIRST <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-angle-left"></i>VEX <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-angle-left"></i>ABOUT <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-angle-left"></i>MEDIA <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-angle-left"></i>LEARNING RES. <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-angle-left"></i>SPONSORS <i class="fa fa-angle-right"></i></a>&nbsp;
                    <a href="#"><i class="fa fa-angle-left"></i>CONTACT <i class="fa fa-angle-right"></i></a>&nbsp;
                </div>
            </div>
        </div>
    </body>
</html>