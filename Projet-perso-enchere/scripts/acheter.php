<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['acheter']))
{
    $j = (int) $_POST['id_produit'];
    $produit = unserialize(file_get_contents('../data/data.txt'));

   (int) $produit[$j]['price'] += (int) $produit[$j]['price_up']*0.01;

    file_put_contents('../data/data.txt', serialize($produit));
}


header('Location: ../index.php')
?>
