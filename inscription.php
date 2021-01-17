<?php

require_once('connexiondb.php');
$alert = '';
session_start();
# si la session est active, redirection à page principal
if (!empty($_SESSION['active'])) {
    header('location : principal.php');
} else {
    if (!empty($_POST)) {
        #extract($_POST);
        #$valid = (boolean) true;

        // var_dump($_POST);
        if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['departement'])) {
            $pseudo = htmlentities($_POST['pseudo']);
            $mail = filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL);
            $password = md5($_POST['password']);
            // $jour=  $jour;
            // $mois=  $mois;
            // $annee=  $annee;
            $departement = htmlentities($_POST['departement']);
            // $date_naissance=  null;

            $DB = new ConnexionDB;
            $BDD = $DB->connexion();

            $req = $BDD->prepare("INSERT INTO utilisateur (pseudo, mail, password, departement)   VALUES (?, ?, ?, ?)");
            # si 
            if ($req->execute(array($pseudo, $mail, $password, $departement))) {
                header('location: connexion.php');
            }
        } else {
            $alert = 'Verifiez vous que vos donnes sont correct';
        }
    }
}



?>

<!doctype html>
<html lang="fr">

<?php
include  'menu.php';

?>

<h1>Inscription</h1>
<div class="container">
    <form method="post">
        <section class="form-container col-sm-6">
            <div class="col-md-12 mb-3">
                <?php
                if (isset($err_pseudo)) {
                    echo $err_pseudo;
                }
                ?>
                <input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <input type="text" name="mail" placeholder="Mail" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <div class="alert" style="color: red;"><?= isset($alert) ? $alert : ''; ?></div>
            </div>
            <div>
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
            <div class="col-auto col-sm-4 mb-4">
                <select class="dropdown btn btn-outline-secondary" name="departement">
                    <option value="Seine et Marne">Seine et Marne</option>
                    <option value="Yonne">Yonne</option>
                </select>

            </div>

            <div class="col-12">
                <input class=" col-12 btn btn-primary btn-lg" type="submit" name="inscription" value="S'inscrire">
            </div>
        </section>


    </form>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>