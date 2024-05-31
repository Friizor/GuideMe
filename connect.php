<?php
/* $hostName = 'localhost';
$dbName = 'guide_me';
$dbUser = 'root';
$dbpass = '';
$bdd = mysqli_connect($hostName, $dbUser, $dbpass, $dbName); */

$bdd = new PDO('mysql:host=localhost;dbname=guide_me', 'root', '');

?>