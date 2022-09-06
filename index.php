<?php
$pageNumber=1;
$pageTitle = "Introduction PHP - Exo 1";
require_once "includes/_functions.php";
include 'includes/_header.php';
?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Evrivez la phrase suivante dans une balise HTML P en utilisant les 2 variables ci-dessous :</p>
            <p class="exercice-txt">"<i>Firstname</i> a obtenu <i>score</i> points à cette partie."</p>
            <div class="exercice-sandbox">
                <?php
                $firstname = "Samir";
                $score = 327;
                echo "<p>$firstname a obtenu $score point à cette partie.</p>";
                ?>
            </div>
        </section>


        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des produits suivants et leurs prix.</p>
            <div class="exercice-sandbox">
                <?php
                $nameProduct1 = "arc";
                $priceProduct1 = 10.30;
                $nameProduct2 = "flèche";
                $priceProduct2 = 2.90;
                $nameProduct3 = "potion";
                $priceProduct3 = 5.20;

                echo "<li>$nameProduct1 : $priceProduct1 €</li><li>$nameProduct2 : $priceProduct2 €</li><li>$nameProduct3 : $priceProduct3 €</li>"
                ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Calculer le montant total de la commande des produits ci-dessus avec les quantités ci-dessous et appliquez lui une remise de 10%.</p>
            <div class="exercice-sandbox">
                <?php
                $quantityProduct1 = 1;
                $quantityProduct2 = 10;
                $quantityProduct3 = 4;

                $totalqty = $priceProduct1 * $quantityProduct1;
                $totalqty += $priceProduct2 * $quantityProduct2;
                $totalqty += $priceProduct3 * $quantityProduct3;
                $totalqty *= (100 - 10) / 100;
                echo "<p>$totalqty €</p>";
                ?>
            </div>
        </section>


        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Affichez le prix le plus élevé des 3 produits ci-dessus.</p>
            <div class="exercice-sandbox">
                <?= max($priceProduct1, $priceProduct2, $priceProduct3) ?>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <?php

        $text1 = "Le marchand m'a vendu un arc et des flèches.";

        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Affichez dans une liste HTML le nom des produits de la question 2 qui sont présents dans la phrase : "<?= $text1 ?>"</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    if (str_contains($text1, $nameProduct1)) echo "<li>$nameProduct1</li>";
                    if (str_contains($text1, $nameProduct2)) echo "<li>$nameProduct2</li>";
                    if (str_contains($text1, $nameProduct3)) echo "<li>$nameProduct3</li>";
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Parmis les scores suivants, affichez le prénom des joueurs qui ont obtenus entre 50 et 150 points.</p>
            <div class="exercice-sandbox">

                <ul>
                    <?php

                    $namePlayer1 = "Tim";
                    $scorePlayer1 = 67;
                    $namePlayer2 = "Morgan";
                    $scorePlayer2 = 198;
                    $namePlayer3 = "Hamed";
                    $scorePlayer3 = 21;
                    $namePlayer4 = "Camille";
                    $scorePlayer4 = 134;
                    $namePlayer5 = "Kevin";
                    $scorePlayer5 = 103;

                    if ($scorePlayer1 > 50 && $scorePlayer1 < 150) {
                        echo "<li>$namePlayer1</li>";
                    }
                    if ($scorePlayer2 > 50 && $scorePlayer2 < 150) {
                        echo "<li>$namePlayer2</li>";
                    }
                    if ($scorePlayer3 > 50 && $scorePlayer3 < 150) {
                        echo "<li>$namePlayer3</li>";
                    }
                    if ($scorePlayer4 > 50 && $scorePlayer4 < 150) {
                        echo "<li>$namePlayer4</li>";
                    }
                    if ($scorePlayer5 > 50 && $scorePlayer5 < 150) {
                        echo "<li>$namePlayer5</li>";
                    }

                    $scores = [
                        $namePlayer1 => $scorePlayer1,
                        $namePlayer2 => $scorePlayer2,
                        $namePlayer3 => $scorePlayer3,
                        $namePlayer4 => $scorePlayer4,
                        $namePlayer5 => $scorePlayer5
                    ];

                    foreach ($scores as $name => $point) {
                        if ($point > 50 && $point < 150) {
                            echo "<li>$name</li>";
                        }
                    }

                    ?>
                </ul>
            </div>
        </section>


        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">En réutilisant les scores de la question pécédente, afficher le nom du joueur ayant obtenu le plus grand score.</p>
            <div class="exercice-sandbox">
                <?php
                $maxScore = $scorePlayer1;
                $topPlayer = $namePlayer1;

                if ($scorePlayer2 > $maxScore) {
                    $maxScore = $scorePlayer2;
                    $topPlayer = $namePlayer2;
                }

                if ($scorePlayer3 > $maxScore) {
                    $maxScore = $scorePlayer3;
                    $topPlayer = $namePlayer3;
                }

                if ($scorePlayer4 > $maxScore) {
                    $maxScore = $scorePlayer4;
                    $topPlayer = $namePlayer4;
                }

                if ($scorePlayer5 > $maxScore) {
                    $maxScore = $scorePlayer5;
                    $topPlayer = $namePlayer5;
                }
                echo "<p>Le meilleur est $topPlayer avec $maxScore.</p>";


                foreach ($scores as $playerName => $score) {
                    if (!isset($maxScore) || $score > $maxScore) {
                        $maxScore = $score;
                        $topPlayer = $playerName;
                    }
                }
                echo "<p>Le meilleur est $topPlayer avec $maxScore.</p>";

                $maxScore = max($scores);

                foreach ($scores as $playerName => $score) {
                    if ($maxScore === $score) {
                        $topPlayer = $playerName;
                    }
                }

                echo "<p>Le meilleur est $topPlayer avec $maxScore.</p>";
                ?>
            </div>
        </section>


        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Affichez le prénom du joueur le plus long en nombre de caractères.</p>
            <div class="exercice-sandbox">
                <?php
                // $maxName = max(strlen($namePlayer1),strlen($namePlayer2),strlen($namePlayer3),strlen($namePlayer4),strlen($namePlayer5));
                $maxName = max(array_map("strlen", array_keys($scores)));
                foreach ($scores as $playerName => $score) {
                    if ($maxName === strlen($playerName)) {
                        echo $playerName;
                    }
                }

                ?>
            </div>
        </section>

        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Créer une variable $players ayant pour valeur un tableau multidimensionnel contenant toutes les données des joueurs avec leurs scores ci-dessus et leurs ages ci-dessous.</p>
            <ul class="exercice-txt">
                <li>Tim : 25 ans</li>
                <li>Morgan : 34 ans</li>
                <li>Hamed : 27 ans</li>
                <li>Camille : 47 ans</li>
                <li>Kevin : 31 ans</li>
            </ul>
            <p class="exercice-txt">Afficher la valeur de cette variable avec tous les détails.</p>
            <div class="exercice-sandbox">


                <?php

                $players = [
                    ['firstname' => 'Tim', 'age' => 25, 'score' => 67],
                    ['firstname' => 'Morgan', 'age' => 34, 'score' => 198],
                    ['firstname' => 'Hamed', 'age' => 27, 'score' => 21],
                    ['firstname' => 'Camille', 'age' => 47, 'score' => 134],
                    ['firstname' => 'Kevin', 'age' => 31, 'score' => 103]
                ];

                var_dump($players);
                ?>
            </div>
        </section>

        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher le prénom et l'âge du joueur le plus jeune dans une phrase dans une balise HTML P.</p>
            <div class="exercice-sandbox">
                <?php
                foreach ($players as $player) {
                    if (!isset($minA) || $player["age"] < $minA) {
                        $minA = $player["age"];
                        $youngP = $player["firstname"];
                    }
                }
                echo "<p>Le plus jeune est $youngP ($minA ans).</p>";
                ?>
            </div>
        </section>

        <?php
        include 'includes/_footer.php';
        ?>