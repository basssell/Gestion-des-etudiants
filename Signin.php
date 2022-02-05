<?php
require_once("connection.php");
if(isset($_POST['envoyerdata']))
{
$login=$_POST['login'];
$passe=$_POST['password'];
$niveau=$_POST['niveau'];
$query="INSERT INTO utilisateurs (login,password,niveau)  VALUES ('$login','$passe',$niveau)";
$req=mysqli_query($link,$query);
if(!$req)
{
    echo "insertion echouee";
}
header("location:index.html");
}
?>