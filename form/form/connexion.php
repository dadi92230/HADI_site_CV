<!-- Etape 3 connexion.php -->
<?php

/*
 * connexion.php
 * connexion à la BDD
 */
//on créé une nouvelle connexion dans un bloc TRY
try {
    $bdd = new PDO('mysql:host=localhost;dbname=alainlortal_cvsite', 'root', '') or die(print_r($bdd->errorInfo()));
    $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}