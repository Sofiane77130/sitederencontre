<?php
session_start();
require_once('connexiondb.php');

$utilisateur_id= (int) trim($_GET['id']);

echo $utilisateur_id;

if(empty($utilisateur_id)){
    header('location: /membres.php');
    exit;
}

$req= $BDD->prepare("SELECT * FROM utilisateur WHERE id = ?");


$req->execute(array($utilisateur_id));

$voir_utilisateur = $req->fetch();

if(!isset($voir_utilisateur['id'])){
    header('location: /membres.php');
    exit;
}
$repDep= $BDD->prepare("SELECT * FROM departement WHERE departement_id = ?");

$repDep->execute(array($voir_utilisateur['departement']));
$voir_departement = $repDep->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title> Profil de <?= $voir_utilisateur['pseudo'] ?> </title>
</head>
<body>
  
    <?php  
    require_once('menu.php'); 
    ?>
<div class="container">
    <div class="row">
       
            <div class="col-sm-12">
                <div class="membre-corps">
                    <div>
                        Pseudo : <?= $voir_utilisateur['pseudo'] ?>
                    
                    </div>
                    <div>
                        Département : <?= $voir_departement['departement_nom'] ?>
                    
                    </div>
                    <?php
                    if (!empty($voir_utilisateur['annonces'])){
                        echo "
                    <div>
                        Annonce : $voir_utilisateur[annonces] 
                    
                    </div>";
                     }
                    ?>
                </div>
           </div> 
    </div>  
</div>

  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

 </body>
   </html>