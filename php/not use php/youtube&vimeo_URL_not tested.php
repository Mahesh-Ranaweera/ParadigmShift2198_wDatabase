<!DOCTYPE html>
<html>
    <style>
        .wrapper{
            width: 500px;
            height: 200px;

            float: left;
            background-color: aquamarine;
        }

        hide{
            display: none;
        }
    </style>
    <div class="wrapper">
        <?php

        #function URLtrim($vidURL){
        $vidURL = '<iframe width="1600" height="809" src="https://www.youtube.com/embed/qo6ygYSxwEY" frameborder="0" allowfullscreen></iframe>';

        #$vidURL = substr($vidURL, 0, strpos($vidURL, '</iframe>'));

        $recap = parse_url("$vidURL");
        print_r($recap);

        echo $vidURL.'<br>';

        #$vidURL = substr($vidURL, 0, strpos($vidURL, '</iframe>'));

        echo $vidURL.'<br>';

        $vidURL = str_replace('watch?v=','embed/',$vidURL);
        $vidURL = str_replace('&list','?list',$vidURL);

        //if URL is https://youtu.be/qdrCr6XGlxY format
        $vidURL = str_replace('https://youtu.be/','https://www.youtube.com/embed/',$vidURL);

        //if URL is https://www.youtube.com/watch?v=qdrCr6XGlxY&feature=youtu.be format
        $vidURL = str_replace('&feature=youtu.be','',$vidURL);

        $newWidth = 0;
        $newHeight = 0;

        #youtube/vimeo replace width and height
        $vidURL = preg_replace(
            array('/width="\d+"/i', '/height="\d+"/i'),
            array(sprintf('width="%d"', $newWidth), sprintf('height="%d"', $newHeight)),
            $vidURL);  

        #remove vimeo <p> tags and replace with <hide> to hide
        /*$vidURL = str_replace('<p>','<hide>',$vidURL);
        $vidURL = str_replace('</p>','</hide>',$vidURL);*/

        #echo $vidURL."<br>";

        //replacing 0 with 100% to adjust to any div
        $vidURL = str_replace('width="0"','',$vidURL);
        $vidURL = str_replace('height="0"','',$vidURL);

        echo $vidURL."<br>";

        echo '<iframe width="100%" height="100%" src="'.$vidURL.'" frameborder="0" webkitallowfullscreen allowfullscreen></iframe>';



        echo $vidURL.'<br>';
        echo "<input type='text' placeholder='".$vidURL."'>";
        #return $vidURL;
        #}
        ?>
    </div>

</html>
