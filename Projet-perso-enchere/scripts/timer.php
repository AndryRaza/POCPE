<?php

$contenu_produit = unserialize(file_get_contents('data/data.txt'));

foreach ($contenu_produit as $id => $value) {

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
?>

    <script>
        window.onload = function() {

            var temps = <?= $secondes ?>;

            function Myfunction() {
                var timer = setInterval('decompte()', 1000)

                function decompte() {

                    temps--;
                    j = parseInt(temps);
                    h = parseInt(temps / 3600);
                    m = parseInt((temps % 3600) / 60);
                    s = parseInt((temps % 3600) % 60);
                    document.getElementById('<?php echo 'duree_' . $id ?>').innerHTML = (h < 10 ? "0" + h : h) + ' h: ' +
                        (m < 10 ? "0" + m : m) + ' mn ' + (s < 10 ? "0" + s : s) + ' s ';

                    if ((s == 0 && m == 0 && h == 0)) {
                        clearInterval(timer);
                        document.getElementById('<?php echo 'duree_' . $id ?>') innerText = "EXPIRED";
                    }
                };
            }
            Myfunction();
        }
    </script>

<?php } ?>