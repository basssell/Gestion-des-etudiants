<?php
require_once("connection.php");
require_once("authentification.php");
if($_SESSION['niv']!=0) 
{
    header("location:index.html");
    exit;
}
else{
$code=$_GET['code'];
$req="DELETE FROM etudiants WHERE (code=$code)";
$query=mysqli_query($link,$req);
if(!$query)
{
    echo('probleme requette');
}
header("location:afficherEtudiant.php");
}
?>