#GET ALL VALUES FROM THE DATABASE AND EMBED IN A POST
<?php
    include 'database.php';

    $sqlGet = "SELECT year,comp_name,video_url,comp_desc,comp_rules,robot_name,robot_desc,first_logo,first_field,first_robot,first_other,post FROM first";

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
            
            #page content goes here;
            $post = "<div class='page_content'>
                         <!--display-->
                        <div class='game_content' id='page2'>
                            <div class='game_page_header'>
                                <div class='game_img_wrap'><img src='$img_logo' width="100%" height="100%"></div>
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
                                <div class='game_img_wrap'><img src='$img_field' width="100%" height="100%"></div>
                            </div>
                            <div class='game_other_img'>
                                <div class='game_img_wrap'><img src='$img_other' width="100%" height="100%"></div>
                            </div>
                            <div class='page_text_heading'>Rules</div>
                            <div class='game_rules_text'>$comp_rules</div>
                            <div class='page_text_heading'>Robot</div>
                            <div class='game_robot_img'>
                                <div class='game_img_wrap'><img src='$img_robot' width="100%" height="100%"></div>
                            </div>
                            <div class='game_robot_description'>$robot_desc</div>
                        </div>
                    </div>";
            
            echo $post;
   
            $num = $num+1;
        }
    }
?>
  