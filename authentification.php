<?php 
session_start();
if(!(isset($_SESSION['niv'])))
{
    header("location:index.html");
}
?>