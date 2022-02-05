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
$req="SELECT * FROM etudiants WHERE code=$code";
$query=mysqli_query($link,$req);
if(!$query)
{
    echo('probleme requette');
}
$etudiantamodifier=mysqli_fetch_assoc($query);
?>
<style>
    Home
About
Table UI


UI


HTML


CSS
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

}

;
© 2021, UI-Delivery, All Rights Reserved.

</style>
<html>
<body>
    <form method="POST" action="modifierEtudiant.php" enctype="multipart/form-data" >
        <table   class="table-style" > 
            <tbody>
        <tr>
                <td> CODE: </td>
                <td> <input type="hidden" value="<?php echo($etudiantamodifier['code'])?>"name="code" > </td>
            </tr>
            <tr>
                <td> NOM: </td>
                <td> <input type="text" value="<?php echo($etudiantamodifier['nom'])?>" name="name"> </td>
            </tr>
            <tr>
                <td> EMAIL: </td>
                <td> <input type="email" value="<?php echo($etudiantamodifier['email'])?>" name="email"> </td>
            </tr>
            <tr>
                <td> PHOTO: </td>
                <td> <input type="file" name="photo" > </td>
                <td><img src="images/<?php echo($etudiantamodifier['photo'])?>"></td>
            </tr>
            <tr>
                <td> <input type="submit" name="envoyer" value="SUBMIT"> </td>
            </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
<?php } ?>