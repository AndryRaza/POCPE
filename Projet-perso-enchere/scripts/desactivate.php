<?php

$liste_produit = unserialize(file_get_contents('../data/data_desactivated.txt'));
if (!empty($liste_produit)) {
    foreach ($liste_produit as $id => $value) {
        $value = array_map('htmlspecialchars', $value);
        echo '<div class="card col mx-auto" style="width: 18rem;">';
        echo '<h2 class="card-title text-center">' . $value['nom'] . '</h2>';
        echo '<h5 class="card-title text-center">' . $value['price'] . '€</h5>';
        echo '<img src="../assets/' . $value['image'] . '" class="card-img-top" alt="..." >';
        echo '<div class="barre"></div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title text-center">00:30:00</h5>';
        echo '<p class="card-text">' . $value['description'] . '</p>';
        echo '<form action="../scripts/activate.php" class="text-center" method="post">';
        echo '<input type="hidden" name="id_desac" id="id_desac" value="'.$id.'">' ;
        echo '<input class="btn btn-primary"  name="activate" w-100" type="submit" value="Activer">';
        echo ' </form>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<h3 class="text-center w-100 m-auto">';
    echo 'Aucune enchère désactivée';
    echo '</h3>';
}
