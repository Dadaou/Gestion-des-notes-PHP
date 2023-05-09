<?php
if (isset($_POST['Envoyer']))
$num = $_POST['Numero'];
$nbr = $_POST['Nombre'];
$typ = $_POST['Type'];

$bdd= new PDO('mysql:host=localhost;dbname=projet','root','');
$reponse = $bdd ->query("insert into avion values ('$num', '$nbr', '$typ')");
?>