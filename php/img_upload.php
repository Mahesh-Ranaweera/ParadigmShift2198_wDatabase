<?php

include 'error.php';
include 'database.php';

function ImageType($type)
{
    if (($type == "image/gif")|| ($type == "image/jpeg")|| 
        ($type == "image/png")|| ($type == "image/bmp" ))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function ImageSize($size)
{
    if ($size < 2097152)
    {
        return true;
    }

    else
    {
        return false;
    }
}

function ExistCheck($input_year,$fileLoc)
{
    include 'database.php';
        
    $sqlCheck = "SELECT year,val,$fileLoc FROM first";
    $check = mysqli_query($conn, $sqlCheck);

    #echo "ROWCHECK<br>";

    while($row = mysqli_fetch_array($check))
    {
        if ($row["year"] == $input_year && $row["val"] == 1)
        {
            #check file location is NULL to avoid overwritting
            #$tempPathSQL = str_replace($row["$fileLoc"],'',$tempPathSQL);
            
            if($row["$fileLoc"] == NULL) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    return true;
}

function RowCheck($input_year,$fileLoc)
{
    include 'database.php';
    
    $sqlCheck = "SELECT year,val,$fileLoc FROM first";
    
    $check = mysqli_query($conn, $sqlCheck);
    
    #echo "ROWCHECK<br>";
    
    while($row = mysqli_fetch_array($check))
    {
        if ($row["year"] == $input_year && $row["val"] == 1)
        {
            $value = 1;
            return($value);
        }
    }
    $value = 0;
    return($value);
}

if(isset($_POST['submit']) && !empty($_FILES['file_img']['name']))
{
    $fileimg=$_POST["filePass"];
    $year   =$_POST["year_img"];
    
    #echo $fileimg.'<br>';
    #echo $year.'<br>';

    $filetmp = $_FILES['file_img']["tmp_name"];
    $filename= $_FILES['file_img']["name"];
    $filetype= $_FILES['file_img']["type"];
    $filesize= $_FILES['file_img']["size"];

    #change file first word
    $fileN = str_replace('_img','',$fileimg);
    
    #echo $fileN.'<br>';

    #change folder for each entry_> vex or first
    $fileF = $fileN;
    #removing keywords
    $fileF = str_replace('_logo','',$fileF);
    $fileF = str_replace('_field','',$fileF);
    $fileF = str_replace('_other','',$fileF);
    $fileF = str_replace('_robot','',$fileF);

    #echo $fileF.'<br>';
    #echo $fileN.'<br>';
    
    #rename uploaded file
    $temp = explode(".",$filename);

    # new file format first_2016_12356685.png/jpeg
    #$newfilename = $fileN.'_'.$year.'_'.round(microtime(true)).'.'.end($temp); 
    $newfilename = $fileN.'_'.$year.'.'.end($temp); 

    #echo $newfilename."<br>";
    
    #file uploading path// local file root
    $filepath= "../content/".$fileF."/".$fileN."/".$newfilename;
    
    #modify image_path for mysql
    #removing ../ from original file path
    $imgPath = $filepath;
    $imgPath = str_replace('../','',$imgPath);


    if(ImageSize($filesize))
    {
        if(ImageType($filetype))  
        {
            #check wether the row already exist to avoid overwritting
            if(ExistCheck($year,$fileN))
            {
                #movie img file to location
                if(move_uploaded_file($filetmp, $filepath))
                {
                    #modify image_path
                    #removing ../ from original file path
                    /*$imgPath = $filepath;
                    $imgPath = str_replace('../','',$imgPath);*/

                    $tablename = $fileF; #return the name either first or vex
                    #check weather row exist, if exist row is updated or else will create a new row
                    $value = RowCheck($year,$fileN);

                    #echo "RETURN VALUES <br>";
                    #echo $value;
                    #echo $year;
                    $val = 1;

                    if($value == 1)
                    {
                        #echo "IN UPDATE";
                        #UPDATE CODE
                        $sql = "UPDATE $tablename SET $fileN='$imgPath' WHERE year='$year'";
                        $retval = mysqli_query($conn, $sql);

                        if (! $retval)
                        {
                            die ("FILE UPLOAD ERROR");
                        }
                        else
                        {
                            db_entryConn();
                        } 
                        mysqli_close($conn);
                        header('Location: '.$_SERVER['HTTP_REFERER']);
                    }
                    else
                    {
                        #echo "IN INSERT";
                        #INSERT VALUE
                        $sql = "INSERT INTO `$tablename`(`year`,`val`,`".$fileN."`) VALUES ('$year','$val','$imgPath')";
                        $retval = mysqli_query($conn, $sql);

                        if (! $retval)
                        {
                            die ("FILE UPLOAD ERROR");
                        }
                        else
                        {
                            db_entryConn();
                        } 
                        mysqli_close($conn);
                        header('Location: '.$_SERVER['HTTP_REFERER']);
                    }
                }
                
                else
                {
                    die ("FILE UPLOAD ERROR");
                }
                
            }
            else
            {
                die ("CANNOT OVERWRITE");
            }
        }
        else
        {
            die ("FILE IS NOT AN IMAGE");
        }
    }
    else
    {
        die ("FILE TOO BIG");
    }
}
else
{
    echo "FILE NOT SELECTED";
}
?>