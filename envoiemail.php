<?php
$dest = $_POST['mail'];
// $status = $_GET['status'];
// $dest = "pascal.moreno@gmail.com";
$sujet = "Test";
$message = "Félicitation votre inscription est un succès, pour valider votre compte cliquez sur le lien <a href=valid.php?status=1> clique ici <a/>";
$headers = "From: sofiane.codeur77@gmail.com";

mail($dest, $sujet, $message, $headers); 

?>