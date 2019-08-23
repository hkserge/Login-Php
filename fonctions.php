<?php
function register()
{
    $pseudoSaisi = trim($_POST['pseudo']);
    $mdpSaisi = sha1(trim($_POST['password']));
    $array = array($pseudoSaisi);
    $userExist = false;
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
        $userExist = true;
    }
    $reponse->closeCursor();
     if(!$userExist)
     {
         array_push($array,$mdpSaisi);
         $insertUser = $bdd->prepare('INSERT INTO `users`(`password_hash`, `pseudo`) VALUES (?, ?)');
         $insertUser->execute($array);
         $_SESSION['pseudo'] = $pseudoSaisi;
        header('Location: logged.php');
     }
     else
     {
         echo "Nom d'utilisateur déjà utilisé";
     }
    $insertUser->closeCursor();

}


function loginBdd()
{
    $pseudoSaisi = trim($_POST['pseudo']);
    $mdpSaisi = sha1(trim($_POST['password']));
    $arrayLogin = array($pseudoSaisi, $mdpSaisi);
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $resp = $bdd->prepare('SELECT * FROM `users` WHERE `pseudo` = ? AND `password_hash` = ?');
    $resp->execute($arrayLogin);
    while ($data = $resp->fetch())
    {
        $_SESSION['pseudo'] = $pseudoSaisi;
        header('Location: logged.php');
    }   
    

    $resp->closeCursor();
}
