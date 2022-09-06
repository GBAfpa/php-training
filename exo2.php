<?php 
$pageNumber=2;
$pageTitle = "Introduction PHP - Exo 2";
require_once "includes/_functions.php";
include 'includes/_header.php';


        $fruits = ["fraise", "banane", "pomme", "cerise", "abricot", "pêche", "ananas", "kiwi"];

        ?>
        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Afficher le détail de tout le tableau de fruits</p>
            <div class="exercice-sandbox">
                <?php

                var_dump($fruits);

                ?>
            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Afficher les fruits dans une liste HTML non ordonnée</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($fruits as $fruit) echo "<li>$fruit</li>";
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Afficher les fruits dans une liste HTML non ordonnée avec pour chacun d'eux sa position dans la liste</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($fruits as $index => $fruit) echo "<li>$index: $fruit</li>";
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Afficher 1 fruit sur 2 dans une liste HTML, en commençant par la fraise</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($fruits as $index => $fruit) {
                        if ($index % 2 === 0) {
                            echo "<li>$fruit</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Afficher un fruit aléatoire du tableau</p>
            <div class="exercice-sandbox">
                <?= $fruits[array_rand($fruits)] ?>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Afficher les fruits dans un ordre aléatoire</p>
            <div class="exercice-sandbox">
                <?php
                shuffle($fruits);
                foreach ($fruits as $index => $fruit) echo "<li>$index: $fruit</li>";
                ?>
            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Afficher les fruits dont la chaîne de caractère est composée de 5 caractères au maximum</p>
            <div class="exercice-sandbox">
                <?php

                foreach (array_filter($fruits, fn ($f) => mb_strlen($f) <= 5) as $fruit) {
                    echo "<li>$fruit</li>";
                }


                $a = array_filter($fruits, fn ($f) => mb_strlen($f) <= 5);

                echo implode("", array_map(fn ($f) => "<li>$f</li>", $a));

                ?>
            </div>
        </section>

        <!-- QUESTION 8 -->
        <?php
        $breakfast = "Tous les matins je mange une pomme et une banane avec une cuillère de miel.";
        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Dans la phrase suivante : "<?= $breakfast ?>"</p>
            <p class="exercice-txt">Remplacez pomme par pêche et banane par mangue et affichez-la.</p>
            <div class="exercice-sandbox">

                <?php

                $original = ["pomme", "banane"];
                $replacement = ["pêche", "mangue"];

                $newText = str_replace($original, $replacement, $breakfast);

                echo $newText;
                ?>

                <?= str_replace(["pomme", "banane"], ["pêche", "mangue"], $breakfast) ?>

            </div>
        </section>

        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Affichez la chaîne de caractère composée de l'ensemble des fruits de la liste, séparés par une virgule et un espace.</p>
            <div class="exercice-sandbox">
                <?= implode(", ", $fruits) ?>
            </div>
        </section>

        <!-- QUESTION 10 -->
        <?php

        $salad = "Dans ma salade de fruit préférée, il y a de la banane, des pêches, quelques fraises, des noix et une cuillère de miel.";

        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher dans une liste HTML tous les fruits de la liste qui apparaissent dans la phrase suivante : "<?= $salad ?>"</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($fruits as $fruit) {
                        if (str_contains($salad, $fruit)) {
                            echo "<li>$fruit</li>";
                        }
                    }

                    echo implode(" ", array_map(fn ($f) => "<li>$f</li>", array_filter($fruits, fn ($f) => str_contains($salad, $f))));

                    ?>

                </ul>
            </div>
        </section>
        <?php
        include 'includes/_footer.php';
        ?>