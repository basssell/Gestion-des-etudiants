<?php
  require_once("connection.php");
  $login=$_POST['login'];
  $passe=$_POST['passe'];
  $req="SELECT * FROM utilisateurs WHERE login='$login' and password='$passe'";
  $query=mysqli_query($link,$req);
  if($user=mysqli_fetch_assoc($query))
  {
      session_start();
      $_SESSION['niv']=$user['niveau'];
      header("location:afficherEtudiant.php");
  }
  else{
    header("location:index.html");
}
  
?>