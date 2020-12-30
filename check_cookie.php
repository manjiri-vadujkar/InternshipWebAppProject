<?php
//index.php


// if cookie not set, go to login page.
if(!isset($_COOKIE["user_password"]) && !isset($_COOKIE["user_name"]))
{
 header("location:login.html");
}

?>
