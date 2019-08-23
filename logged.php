<?php
session_start();
if (!isset($_SESSION['pseudo']))
{
    header('Location: index.php');
}
else
{
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bienvenue</title>
    </head>
    <body>
        <h1>Bienvenue</h1>
        <p>
            Bienvenue sur votre espace personnel ' . $_SESSION['pseudo'] . '.<br />
    
            <a href="logout.php">Déconnection</a>
        </p>
    </body>
    </html>';
}

