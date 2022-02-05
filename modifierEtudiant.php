<?php
require_once('connection.php');
require_once("authentification.php");
if($_SESSION['niv']!=0) 
{
    header("location:index.html");
    exit;
}
else{
// recuperer les donnes pour faire la mise ajour dans notre base de donnee 
$code=$_POST['code'];
$nom=$_POST['name'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];
$file_tmp_name=$_FILES['photo']['tmp_name']; //chemin temp on veux le deplacer ou on veux dans notre dossier ou on va stocker les photos des etudiants 
move_uploaded_file($file_tmp_name,"./images/$nomPhoto");
$query="UPDATE etudiants set nom='$nom' , email='$email' , photo='$nomPhoto' WHERE code=$code";
$req=mysqli_query($link,$query);
if(!$req)
{
    echo('probleme requette');
}
header("location:afficherEtudiant.php");
}
?>