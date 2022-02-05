<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</script><link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<script src="https://code.jquery.com/jquery-2.2.4.js">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php
require_once("authentification.php");
require_once("connection.php");
$req="SELECT * FROM etudiants";
$query=mysqli_query($link,$req);
if(!$query)
{
    echo "probleme requette";
}
?>
<div class="container">
    <div class="row">
    
        <div class="col-md-12 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h2 class="panel-title">Tableau des etudiants</h2>
                  </div>
                  <div class="col col-xs-6 text-right">
                  <?php if($_SESSION['niv']==0) {?>
                    <a class="btn btn-sm btn-primary btn-create" href="saisiretudiant.html">Ajouter un etudiant</a>
                    <?php }?>
                    <a class="btn btn-sm btn-primary btn-create" href="chercherEtudiant.php">Chercher un etudiant</a> 
                    <a href="deconnexion.php" class="btn btn-danger" role="button" data-bs-toggle="button" aria-pressed="true">Se Deconnecter</a>
                  </div>
                </div>
              </div>
              <div class="panel-body table-responsive">
                <table  class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th class="hidden-xs">CODE</th>
                        <th>NOM</th>
                        <th>IMAGE</th>
                        <?php if($_SESSION['niv']==0) {?>
                        <th>OPERATION</th>
                        <?php }?>
                    </tr>
                  </thead>
                  <?php  while($etudiant=mysqli_fetch_assoc($query)) {?>
                  <tbody id="myTable">
                          <tr>
                            <td class="hidden-xs"><?php echo($etudiant['code'])?></td>
                            <td><?php echo($etudiant['nom'])?></td>
                            <td><img src="images/<?php echo($etudiant['photo'])?>" ></td>
                            <?php if($_SESSION['niv']==0) {?>
                            <td align="center">
                              <a class="btn btn-default" href="editerEtudiant.php?code=<?php echo($etudiant['code'])?>" ><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger" href="suprimerEtudiant.php?code=<?php echo($etudiant['code'])?>" ><em class="fa fa-trash"></em></a>
                            </td>
                            <?php }?>
                          </tr>                   
                        </tbody>
                        <?php }?>  
                </table>
              </div>
            </div>
</div></div></div>