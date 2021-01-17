<?php
// session_start();

/* if (!empty($_SESSION['active'])) {
  # si y a user id l'utilisateur sera redirectioné à la page principal
  header('location: principal.php');
  //   echo '<pre>';
  // print_r($_SESSION);
  //echo "Bonjour " . $_SESSION['pseudo'];
} else {
  header('location : index.php');
} */
?>




<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">

  <title>Connexion</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Forum</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-md-auto">
        <?php
          if ( !empty($_SESSION['active'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="deconnexion.php">Deconnexion</a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="inscription.php">S'inscrire</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexion.php">Se connecter</a>
          </li>
        <?php
        }
        ?>
      </ul>
      
    </div>
  </nav>