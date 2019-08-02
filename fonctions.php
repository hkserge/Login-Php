<?php
function register(){
    $myfile=fopen("login", "a") or die("Unable to open file!");
    $txt=$_POST['pseudo'] . ':'. sha1($_POST['password']);
    $handle=fopen("login", "r");

    while (($ligne=fgets($handle)) !==false) {
        $a=explode(':', $ligne);
        $loginBdd=$a[0];
        $_POST['pseudo']==$loginBdd? $etat=2: null;
    }

    if ($etat !== 2) {
        fwrite($myfile, "\n". $txt);
        fclose($myfile);
        $_SESSION['pseudo']=$_POST['pseudo'];
        header('Location: index.php');
    }else{
        echo 'Pseudo déja utilisé';
    }

}
function login(){
    $handle=fopen("login", "r");
$logged=false;
    if ($handle) {
        while (($line=fgets($handle)) !==false) {
            // process the line read.
            $a=explode(':', $line);
            $loginBdd=$a[0];
            $passBdd=$a[1];
            trim($_POST['pseudo'])==trim($loginBdd) && hash_equals($loginBdd, $_POST['pseudo']) ? $logged=true: null;

        }

        if ($logged) {
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('Location: logged.php');
            exit;
        }

        else {
            echo 'Invalid';
        }

        fclose($handle);
    }

    else {
        // error opening the file.
    }

}