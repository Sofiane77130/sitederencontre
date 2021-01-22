<?php

require_once('connexiondb.php');
# message de error
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
    header('location: principal.php');echo "test";
} else {
   
    if (!empty($_POST)) {
        
        
        if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password'])) { 
            $pseudo = htmlentities($_POST['pseudo']);
            $mail = htmlentities($_POST['mail']);
            $password = md5(htmlentities($_POST['password']));
            // $jour=  $jour;
            // $mois=  $mois;
            // $annee=  $annee;
            // $date_naissance=  null;
            $DB = new ConnexionDB;
            $BDD = $DB->connexion();
            # compare si l'email et password sont egales à l'uns de la bd
            $req = $BDD->query("SELECT * FROM utilisateur WHERE mail = '$mail' AND password = '$password' ");

            $statement = $req->execute();

            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            # si les donnes sont correct SESSION est initializé
            
            if ($data) {
                echo "<pre>";
                
                $_SESSION['active'] = true;
                $_SESSION['utilisateur'] = $data[0]['pseudo'];
                $_SESSION['id'] = $data[0]['id'];
                $_SESSION['mail'] = $data[0]['mail'];

                header('location: principal.php');
            } else {
                $alert = 'Email, Password ou Pseudo Incorrect';
                session_destroy();
            }
        }
    }
}



?>


<!doctype html>
<html lang="fr">

<?php
include 'menu.php';

?>

<h1>Se connecter</h1>

<div class="container">
    <form method="post">
        <section class="form-container col-sm-6">
            <div class="col-md-12 mb-3">
                <?php
                if (isset($err_pseudo)) {
                    echo $err_pseudo;
                }
                ?>
                <?php
                ?>
                <input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <input type="text" name="mail" placeholder="Mail" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
            </div>
            <div class="col-md-12">
                <div class="alert" style="color: red;"><?= isset($alert) ? $alert : ''; ?></div>
            </div>
            <div class="col-md-12">
                <!-- <select name="jour">
                       <option value="1">1</option>
                       <option value="1">2</option>
                     </select>
                     <select name="mois">
                       <option value="Janvier">Janvier</option>
                       <option value="Février">Février</option>
                     </select> -->
                <!--  <select name="annee">
                       <option value="1990">1990</option>
                       <option value="2000">2000</option>
                     </select> -->
            </div>

            <div class="col-sm-12">
                <input class=" col-sm-12 btn btn-primary btn-lg" type="submit" name="connexion" value="Se connecter">
            </div>
        </section>

    </form>
</div>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</body>

</html>