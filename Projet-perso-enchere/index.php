<?php
session_start();

if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = false;
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"> </script>

    <title>Plateforme d'enchères</title>
</head>

<body>
    <header class="container-fluid bg-dark text-white d-flex">
        <?php if (!($_SESSION['admin'])) { ?>
            <form action="scripts/connexion.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control mb-2" name="user" id="user" placeholder="Nom d'utilisateur" required pattern="[a-zA-Z]+">
                    <input type="password" class="form-control mb-2" name="pass" id="pass" placeholder="Mot de passe" required pattern="[a-zA-Z]+">
                    <input type="submit" class="btn btn-primary" name="connexion" id="connexion" value="Se connecter">
                </div>
            </form>
        <?php } else {
            echo '<form action="scripts/connexion.php" method="POST">';
            echo '<input type="submit" class="btn btn-primary" name="deconnexion" id="deconnexion" value="Se deconnecter">';
            echo '</form>';
        }
        ?>
        <h1 class="justify-self-center w-100 text-center my-auto">Plateforme d'enchères</h1>
    </header>
    <?php
    if ($_SESSION['admin']) { ?>
        <section class="container-fluid">
            <div class="container mt-5 text-center">
                <button class="btn btn-primary"><a class="text-white" href="pages/formulaire_ajout.html">Ajouter un produit</a></button>
                <button class="btn btn-primary"><a class="text-white" href="pages/page_desactivate.php">Activer un produit</a></button>
            </div>
            </div>
        </section>
    <?php } ?>

    <section class="container-fluid" id="ecran_card">
        <div class="container mt-5 mb-5 ">
            <div class="row row-cols-md-3 row-cols-1">
                <?php include 'scripts/create_card.php' ?>
            </div>
        </div>
    </section>

    <?php 

include 'scripts/timer.php' ?> 
    
    
</body>

</html>