<?php

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['activate'])){

    $produit = unserialize(file_get_contents('../data/data.txt'));
    $desactivate = unserialize(file_get_contents('../data/data_desactivated.txt'));

    $j= (int)$_POST['id_desac'];

    $produit[] = $desactivate[$j];
    file_put_contents('../data/data.txt', serialize($produit));

    unset($desactivate[$j]);
    file_put_contents('../data/data_desactivated.txt', serialize($desactivate));
}

header('Location: ../index.php');
?>