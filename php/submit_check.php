<?php

if (isset($_POST["submit"]))
{

    if($_POST["strUsername"] == NULL)
        $testUsername = 1;

    else 
        $strUserN = $_POST ["strUsername"];

    if($_POST["strEmail"] == NULL)
        $testEmail = 1;

    else 
        $strE = $_POST ["strEmail"];

    if($_POST["strPassword"] == NULL)
        $testPassword = 1;

    else 
        $strP = $_POST ["strPassword"];

    if($_POST["strPasswordC"] == NULL)
        $testPasswordCheck = 1;

    else 
        $strPC = $_POST ["strPasswordC"];
    
    if($_POST["strFirstName"] == NULL)
        $testFirstName = 1;

    else 
        $strFN = $_POST ["strFirstName"];
    
    if($_POST["strLastName"] == NULL)
        $testLastName = 1;

    else 
        $strLN = $_POST ["strLastName"];

}  
?>