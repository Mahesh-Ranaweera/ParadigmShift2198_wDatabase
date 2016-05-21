<?php

        /*  <iframe width="1600" height="809" src="https://www.youtube.com/embed/qo6ygYSxwEY" frameborder="0" allowfullscreen></iframe>
            https://youtu.be/qo6ygYSxwEY
            https://www.youtube.com/embed/qo6ygYSxwEY
            https://www.youtube.com/watch?v=knfrxj0T5NY&list=RDknfrxj0T5NY#t=164
            <iframe width="854" height="480" src="https://www.youtube.com/embed/Ewr86bQB8Lc?list=RDknfrxj0T5NY" frameborder="0" allowfullscreen></iframe>
            */
        
            
        function URLtrim($vidURL)
        {
            $vidURL = str_replace('watch?v=','embed/',$vidURL);
            $vidURL = str_replace('&list','?list',$vidURL);

            //if URL is https://youtu.be/qdrCr6XGlxY format
            $vidURL = str_replace('https://youtu.be/','https://www.youtube.com/embed/',$vidURL);

            //if URL is https://www.youtube.com/watch?v=qdrCr6XGlxY&feature=youtu.be format
            $vidURL = str_replace('&feature=youtu.be','',$vidURL);

            #if a embed video, replace the width and height with 0 and remove them
            $newWidth = 0;
            $newHeight= 0;

            $vidURL = preg_replace(
                array('/width="\d+"/i', '/height="\d+"/i'),
                array(sprintf('width="%d"', $newWidth), sprintf('height="%d"', $newHeight)),
                $vidURL);  

            $vidURL = str_replace('width="0"','',$vidURL);
            $vidURL = str_replace('height="0"','',$vidURL);
            $vidURL = str_replace('src="','',$vidURL);
            $vidURL = str_replace('allowfullscreen></iframe>','',$vidURL);
            $vidURL = str_replace('frameborder="0"','',$vidURL);
            $vidURL = str_replace('<iframe','',$vidURL);
            $vidURL = str_replace('"','',$vidURL);

            //remove white spaces from the URL
            $vidURL = preg_replace('/\s+/', '', $vidURL);

            $tubeURL= '<iframe width="100%" height="100%" src="'.$vidURL.'" frameborder="0" webkitallowfullscreen allowfullscreen></iframe>';

            return $tubeURL;
        }
?>

