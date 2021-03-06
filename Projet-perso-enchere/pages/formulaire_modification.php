<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <!-- jQuery and JS bundle w Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de modification</title>
</head>
<body>

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modifier'])) 
        {
        $i = $_POST['id_produit'];
        $produit = unserialize(file_get_contents('../data/data.txt'));
    ?>
    <section class="container-fluid">
        <div class="container mt-5">
            <form action="../scripts/modification.php" method="POST">
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3 " for="nom_modifie">Nom du produit :</label>
                    <input type="text" class="form-control col-md-9" name="nom_modifie" id="nom_modifie"
                        value="<?=$produit[$i]['nom']?>" required pattern="[a-zA-Z0-9 é è à ^ ' ]+">
                </div>

                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3 " for="description_modifie">Description du produit :</label>
                    <input type="text" class="form-control col-md-9" name="description_modifie" id="description_modifie"
                    value="<?=$produit[$i]['description']?>" required pattern="[a-zA-Z é è à ^ ' ]+">
                </div>

                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3 " for="image_modifie">Image du produit :</label>
                    <input type="file" class="form-control col-md-9" name="image_modifie" id="image_modifie" required>
                </div>
 
                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="prix_modifie">Prix initial du produit :</label>
                    <input type="number" class="form-control col-md-9" name="prix_modifie" id="prix_modifie"
                    value="<?=$produit[$i]['price']?>" required min=1 step="0.01">
                </div>

                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="aug_prix_modifie">Augmenter l'enchère de (en cts) :</label>
                    <input type="number" class="form-control col-md-9" name="aug_prix_modifie" id="aug_prix_modifie" value="<?=$produit[$i]['price_up']?>"
                        required min=1 step="0.01">
                </div>

                <div class="form-group row row-cols-md-2 row-cols-1">
                    <label class="col-md-3" for="aug_duree_modifie">Augmenter le temps de (en mn) :</label>
                    <input type="number" class="form-control col-md-9" name="aug_duree_modifie" id="aug_duree_modifie" value="<?=$produit[$i]['time_up']?>"
                        required min=1 step="0.01">
                </div>
                
                <div class="form-group d-flex justify-content-end">
                    <input type="hidden" name="id_produit_modif" id="id_produit_modif" value="'.<?= $i ?>.'">
                    <input type="submit" class="btn btn-primary " name="desactivate" id="desactivate" value="Désactiver le produit"> 
                    <input type="submit" class="btn btn-primary " name="maj" id="maj" value="Modifier le produit">
                </div>
            </form>
        </div>
    </section>
        <?php } ?>
</body>
</html>