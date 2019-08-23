<?php 
session_start();
include('fonctions.php');
if (isset($_POST['pseudo']) && !empty($_POST['pseudo'] && !empty($_POST['password'])))
{
register();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>

<body>
    <form action="#" method="post">
        <span>Pseudo</span>
        <input type="text" name="pseudo">
        <span>Mot de passe</span>
        <input type="password" name="password">
        <button type="submit">Valider</button>
    </form>
</body>

</html>