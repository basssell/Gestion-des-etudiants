<?php
require_once("connection.php");
require_once("authentification.php");
$nom=$_POST['name'];
$email=$_POST['email'];
$nomPhoto=$_FILES['photo']['name'];
$file_tmp_name=$_FILES['photo']['tmp_name']; //chemin temp on veux le deplacer ou on veux dans notre dossier ou on va stocker les photos des etudiants 
move_uploaded_file($file_tmp_name,"./images/$nomPhoto");
$req="INSERT INTO etudiants (nom,email,photo) VALUES ('$nom','$email','$nomPhoto')";
$query=mysqli_query($link,$req);
if(!$query)
{
    echo"probleme requette";
}
?>
<style>
*, ::before, ::after {
    box-sizing: border-box;
    margin: 0; 
    padding: 0;
}

body {
    height: 100vh;
 padding: 20px;
    font-family: Arial, Helvetica, sans-serif;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}

.table-style  {
    border-collapse: collapse;
    box-shadow: 0 5px 50px rgba(0,0,0,0.15);
    cursor: pointer;
    margin: 0px auto;
    border: 2px solid midnightblue;
}

thead tr {
    background-color: midnightblue;
    color: #fff;
    text-align: left;
}

th, td {
    padding: 15px 20px;
    text-align: center;
}

tbody tr, td, th {
    border: 1px solid #ddd;
}

tbody tr:nth-child(even){
    background-color: #f3f3f3;
}

@media screen and (max-width: 550px) {
  body {
    align-items: flex-start;
  }
  .table-style  {
    width: 100%;
    margin: 0px;
    font-size: 10px;
  }
  th, td {
    padding: 10px 7px;
}

}</style>
<!DOCTYPE html>
<html>
<body>
    <table class="table">
        <tbody>
        <tr>
            <td> NOM: </td>
            <td> <?php echo($nom)?></td>
        </tr>
        <tr>
            <td> Email: </td>
            <td> <?php echo($email)?></td>
        </tr>
        <tr>
            <td> PHOTO: </td>
            <td> <img src="images/<?php echo($nomPhoto)?>"></td>
        </tr>
        <tr> <td colspan="2"><a href="afficherEtudiant.php">afficher tous les etudiants</a></td></tr>
        </tbody>
    </table>
    
</body>
</html>