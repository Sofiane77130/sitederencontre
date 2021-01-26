<?php
$dest = $_POST['mail'];
// $status = $_GET['status'];
// $dest = "pascal.moreno@gmail.com";
$sujet = "Test";
// $message = "Felicitation votre inscription est un succes, pour valider votre compte cliquez sur le lien <a href=valid.php?status=1> clique ici <a/>";
$message ='<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <a href="http://localhost/sitederencontre2/sitederencontre/valid.php?status=1&email={$dest}" target="_blank">Cliquez ici pour valider votrer compte <a/> 
</body>
</html>';


$headers="MIME-Version: 1.0\r\n";

$headers = "From: sofiane.codeur77@gmail.com";

// $headers.='Content-Type:text/html; charset="UTF-8"'."\n";
$headers.="Content-Type:text/html; charset=\"iso-8859-1\"";
// $headers.='Content-Transfer-Encoding: 8bit';

mail($dest, $sujet, $message, $headers);

?>