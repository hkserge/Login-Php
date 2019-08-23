<?php
$array = array("to");
try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
     
    $reponse = $bdd->prepare('SELECT * FROM `users` WHERE `pseudo` = ? ');
    $reponse->execute($array);

    while ($donnees = $reponse->fetch())
    {
        echo $donnees["email"];
    }