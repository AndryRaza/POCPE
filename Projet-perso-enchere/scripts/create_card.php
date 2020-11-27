<?php
require 'classes/card.class.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['add'])) {

    //Il manque la sécurité 
    $content_dir = "D:\Formation\Projet-perso-enchere\assets\ ";
    $name_file = $_FILES['image_produit']['name'];
    $tmp_file = $_FILES['image_produit']['tmp_name'];

    move_uploaded_file($tmp_file, $content_dir . $name_file);

    $new_card = new Card(
        $_POST['nom_produit'],
        $_POST['description_produit'],
        $name_file,
        $_POST['prix_produit'],
        $_POST['heure_produit'],
        $_POST['minute_produit'],
        $_POST['seconde_produit'],
        $_POST['aug_prix'],
        $_POST['aug_duree']
    );

    $contenu_produit = unserialize(file_get_contents('data/data.txt'));

    $contenu_produit[] = array(
        'nom' => $new_card->getName(), 'description' => $new_card->getDescription(), 'image' => $new_card->getImage(),
        'price' => $new_card->getPrice(), 'heure' => $new_card->getHour(), 'minute' => $new_card->getMinute(),
        'seconde' => $new_card->getSeconde(),
        'price_up' => $new_card->getPriceUp(), 'time_up' => $new_card->getTimeUp()
    );

    //Et pour finir, on enregistre le tout
    file_put_contents('data/data.txt', serialize($contenu_produit));
}

$liste_produit = unserialize(file_get_contents('data/data.txt'));
if (!empty($liste_produit)) {
    foreach ($liste_produit as $id => $value) {
        $value = array_map('htmlspecialchars', $value);
        echo '<div class="card col mr-auto" style="width: 18rem;">';
        echo '<h2 class="card-title text-center" style="font-size:35px;">' . $value['nom'] . '</h2>';
        echo '<h5 class="card-title text-center" style="color:red; font-size:30px">' . $value['price'] . '€</h5>';
        echo '<img  height="300px" src="assets/ ' . $value['image'] . '" class="card-img-top" alt="..." >';
        echo '<div class="barre"></div>';
        echo '<div class="card-body">';
        $heures = $value['heure'];
        $minutes = $value['minute'];
        $secondes = $value['seconde'];
    
        $annee = date('Y');
        $mois = date('m');
        $jour = date('d');
        
        $secondes = mktime(
            date('H') + $heures,
            date('i') + $minutes,
            date('s') + $secondes,
            $mois,
            $jour,
            $annee
        ) - time();

        $_SESSION['seconde'][$id] = $secondes ;

        echo '<h5 class="card-title text-center" id="duree_' . $id . '">'. $secondes.'</h5>';
        echo '<p class="card-text">' . $value['description'] . '</p>';
        if (!$_SESSION['admin']) {
            echo '<form action="scripts/acheter.php" method="POST">';
            echo '<input type="hidden" name="id_produit" id="id_produit" value="' . $id . '">';
            echo '<input class="btn btn-primary w-100"  name="acheter" w-100" type="submit" value="Acheter">';
            echo ' </form>';
        } else {
            echo '<form action="pages/formulaire_modification.php" method="POST">';
            echo '<input type="hidden" name="id_produit" id="id_produit" value="' . $id . '">';
            echo '<input class="btn btn-primary  w-100" type="submit" name="modifier" value="Modifier">';
            echo ' </form>';
        }
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<h3 class="text-center w-100 m-auto">';
    echo 'Rien pour le moment';
    echo '</h3>';
}
