<?php

if(isset($_SESSION['id'])){
  //   echo '<pre>';
      // print_r($_SESSION);
  echo "Bonjour " . $_SESSION['pseudo'];
  }else{
      '<h1>Bienvenue</h1>';
  }
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">
    <img
      src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
      width="30"
      height="30"
      alt=""
  /></a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Forum</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-md-auto">
<?php
if(isset($_SESSION['id'])){
?>
 <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Deconnexion</a>
      </li>
      <?php
}else{
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
