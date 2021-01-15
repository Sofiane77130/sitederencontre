<?php
session_start();


require_once('connexiondb.php');
$DB = new ConnexionDB;
$BDD = $DB->connexion();
if(isset($_POST)){
    #extract($_POST);
    #$valid = (boolean) true;

    // var_dump($_POST);
    if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['departement'])){
        $pseudo = $_POST['pseudo']  ;
        $mail = $_POST['mail'] ;
        $password = $_POST['password'] ;
        // $jour=  $jour;
        // $mois=  $mois;
        // $annee=  $annee;
        $departement= $_POST['departement'];
        // $date_naissance=  null;

       
        
            $req = $BDD->prepare("INSERT INTO utilisateur (pseudo, mail, password, departement)   VALUES (?, ?, ?, ?)");
            if ($req->execute(array($pseudo, $mail, $password, $departement))) {
                echo 'Bravo votre inscription à été validé';
                $_SESSION['id'] = rand(1, 1000);
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mail'] = $mail;
                if(isset($_SESSION['id'])){
                //   echo '<pre>';
                    // print_r($_SESSION);
                echo "Bonjour " . $_SESSION['pseudo'];
                }else{
                    '<h1>Bienvenue</h1>';
                }
            } 
        
            
        
    }
}
    
    
    ?>

 
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">

    <title>Inscription</title>
</head>

<body>
<?php
     require_once('menu.php');
     if(isset($_SESSION['id'])){
        //   echo '<pre>';
            // print_r($_SESSION);
        echo "Bonjour " . $_SESSION['pseudo'];
        }else{
            '<h1>Bienvenue</h1>';
        }
    ?>
    
    <h1>Inscription</h1>
    <form method="post">
       <section>
           <div>
               <?php
                    if(isset($err_pseudo)){
                        echo $err_pseudo;
                    }
                    ?>
               <input type="text" name="pseudo" placeholder="Pseudo">
           </div>
           <div>
                <input type="text" name="mail" placeholder="Mail">
            </div>
            <div>
                <input type="password" name="password" placeholder="Mot de passe">
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
                     <div>
                         <select name="departement">
                       <option value="Seine et Marne">Seine et Marne</option>
                       <option value="Yonne">Yonne</option>
                     </select>

                     </div>
</section>
        <input type="submit" name="inscription" value="S'inscrire">
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>