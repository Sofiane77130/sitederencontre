<?php

require_once('connexiondb.php');

// recupere email et statut
$email = $_GET['email'];
$status = $_GET['status'];
$connexionDB = new ConnexionDB();
$BDD = $connexionDB->connexion();
$rep = $BDD->prepare("SELECT * FROM utilisateur WHERE mail = '$email'");
$rep->bindValue(':email', $email, PDO::PARAM_STR);
$rep->execute();
$result = $rep->fetchAll(PDO::FETCH_ASSOC);



$req= ("UPDATE utilisateur SET Validation ='$status' WHERE mail = '$email'");
$query = $BDD->prepare($req);
$query->bindValue (':Validation', $status, PDO::PARAM_STR);

// var_dump("$_POST[annonces]");


if($query->execute()){
    // echo '<script> alert("La validation de votre compte est un succès") </script> ';
    header('location:connexion.php');
}
else{
    echo'Erreur ';
}



