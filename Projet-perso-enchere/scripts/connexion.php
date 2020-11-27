<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['connexion'])) {
    if ($_POST['user'] === 'admin' and $_POST['pass']==='test')
    {
       $_SESSION['admin'] = true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deconnexion'])) {
    
       $_SESSION['admin'] = false;
    
}

header('Location: ../index.php');
?>

