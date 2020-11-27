<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['maj'])) {

    //Il manque la sécurité 
    $content_dir = "D:\Formation\Projet-perso-enchere\assets\ ";
    $name_file = $_FILES['image_modifie']['name'];
    $tmp_file = $_FILES['image_modifie']['tmp_name'];


    $produit = unserialize(file_get_contents('../data/data.txt'));
    
    $j= (int) $_POST['id_produit_modif'];

    $produit[$j]['nom'] = $_POST['nom_modifie'];
    $produit[$j]['description'] = $_POST['description_modifie'];
    $produit[$j]['image'] = $name_file;
    $produit[$j]['price'] = $_POST['prix_modifie'];
    $produit[$j]['price_up'] = $_POST['aug_prix_modifie'];
    $produit[$j]['time_up'] = $_POST['aug_duree_modifie'];

    file_put_contents('../data/data.txt', serialize($produit));
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['desactivate'])) {
    $produit = unserialize(file_get_contents('../data/data.txt'));
    $desactivate = unserialize(file_get_contents('../data/data_desactivated.txt'));

    $j= (int) $_POST['id_produit_modif'];

    $desactivate[] = $produit[$j];
    file_put_contents('../data/data_desactivated.txt', serialize($desactivate));

    unset($produit[$j]);

    file_put_contents('../data/data.txt', serialize($produit));
}

header('Location: ../index.php');
?>
