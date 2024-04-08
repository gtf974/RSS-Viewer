<?php
    $host          = 'localhost'; // ip du serveur de base de données
    $db_name       = 'rss'; // nom de la base de données
    $db_user       = 'manager'; // utilisateur ayant les droits INSERT, SELECT
    $db_password   = 'changemePLS'; // mot de passe de l'utilisateur
    $dsn           = "mysql:host=$host;dbname=$db_name";

    /*
    Options:
    - ERRMODE_EXCEPTION :  renvoie un format d'erreur spécial pour chaque erreur
    - "SET NAMES utf8" : applique le format utf8 pour chaque requête
    */
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    try {
        // instanciation/connexion à la base de données
        $cnx = new PDO($dsn,$db_user,$db_password );
    } catch (PDOException $e) {
        // affichage de l'erreur en cas d'erreur
        echo "Erreur PDO : " . $e->getMessage();
    }
?>
