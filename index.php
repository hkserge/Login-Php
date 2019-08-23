<?php 
session_start();
include('fonctions.php');

if(!empty($_SESSION['pseudo']))
{
    header('Location: logged.php');
}


if(isset($_POST) && !empty($_POST))
{
loginBdd();
}
else
{
    echo 'Not posted';
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>

    <form action="#" method="post">
        <span>Pseudo</span>
        <input type="text" name="pseudo">
        <span>Mot de passe</span>
        <input type="password" name="password">
        <button type="submit">Valider</button>
        <a href="register.php">Inscription</a>
    </form>



</body>

</html>