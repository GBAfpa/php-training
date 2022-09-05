<?php

/**
 * Gives the HTML list from the given array. 
 *
 * @param array $array
 * @return string
 */
function getHtmlFromArray(array $array) :string {
    $valueToLi = fn($v) => "<li>$v</li>";
    return "<ul>".implode("", array_map($valueToLi, $array))."</ul>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 5</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 5</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link active" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

<?php

// Json file
try {
    $fileContent = file_get_contents("datas/series.json");
    $series = json_decode($fileContent, true);
} catch (Exception $e) {
    echo "Something went wrong with json file...";
    exit;
}

?>

        <section class="exercice">
            Sur cette page un fichier comportant les données de séries télé est importé côté serveur. (voir datas/series.json)
            Les données sont accessibles dans la variable $series.
        </section>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis afficher l'ensemble des plateformes de diffusion des séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                    $platforms = [];
                    foreach ($series as $serie) {
                        // if (!in_array($serie["availableOn"], $platforms)) {
                            $platforms[] = $serie["availableOn"];
                        // }
                    }

                    // $platforms = array_map(fn($s) => $s["availableOn"], $series);

                    $platforms = array_unique($platforms);
                    sort($platforms);

                    echo getHtmlFromArray($platforms);
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Récupérer dans un tableau puis affichez l'ensemble des styles de séries. Afficher les par ordre alphabétique.</p>
            <div class="exercice-sandbox">
                <?php
                    $styles = [];
                    foreach ($series as $serie) {
                        foreach ($serie["styles"] as $style) {
                            $styles[] = $style;
                        }
                    }

                    // ---------------

                    $styles = array_unique(array_merge(...array_map(fn($s) => $s["styles"], $series)));

                    sort($styles);

                    echo getHtmlFromArray($styles);

                ?>
            </div>
        </section>

        <section class="exercice">
            <h2 class="exercice-ttl">Paramètre par valeur ou par référence</h2>
            <p class="exercice-txt">Passage d'un paramètre par valeur</p>
            <div class="exercice-sandbox">
                <?php

                $a = 5;

                function myFuncVal(int $x) :void {
                    $x += 2;
                }

                myFuncVal($a);

                var_dump($a);
                ?>
            </div>
            <p class="exercice-txt">Passage d'un paramètre par référence</p>
            <div class="exercice-sandbox">
                <?php

                $a = 5;

                function myFuncRef(int &$x) :void {
                    $x += 2;
                }

                myFuncRef($a);

                var_dump($a);
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Afficher la liste de toutes les séries avec l'image principale, le titre, l'équipe de création et la liste des acteurs</p>
            <p class="exercice-txt">L'image et le titre de la série sont des liens menant à cette page avec en paramètre "serie", l'identifiant de la série</p>
            <p class="exercice-txt">Afficher une seule série par ligne sur les plus petits écrans, 2 séries par ligne sur les écrans intermédiaires et 4 séries par ligne sur un écran d'ordinateur.</p>
            <div class="exercice-sandbox">
                <ul>
                <?php

                foreach ($series as $serie) {
                    echo "<li>";
                    echo "<a href=\"?serie=".$serie["id"]."\"><img src=\"".$serie["image"]."\"></a>";
                    echo "<h2><a href=\"?serie=".$serie["id"]."\">".$serie["name"]."</a></h2>";
                    echo "<h3>Créée par :</h3>";
                    echo getHtmlFromArray($serie["createdBy"]);
                    echo "<h3>Acteurs :</h3>";
                    echo getHtmlFromArray($serie["actors"]);
                    echo "</li>";
                }
                
                ?>
                </ul>
            </div>
        </section>


        <!-- QUESTION 4 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Si l'URL de la page appelée comporte l'identifiant d'une série, alors afficher toutes les informations de la série.</p>
            <p class="exercice-txt">Si l'identifiant ne correspond à aucune série, afficher un message d'erreur.</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Globaliser l'entête et le pied des pages de ce mini-site.</p>
            <p class="exercice-txt">S'assurer de conserver les titres des pages et l'affichage dynamique du menu.</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section id="question5" class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Créer un tableau listant les pages du site.</p>
            <p class="exercice-txt">Créer une fonction générant le code HTML du menu du site.</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>

    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>