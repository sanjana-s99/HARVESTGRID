<?php
session_start(); //starting session
if(!isset($_SESSION["username"])){ //user aignin status checking
    header("Location: ../pages/signin.php"); //if not redirecting to signin page
exit(); }
?>