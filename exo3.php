<?php
$pageNumber=3;
$pageTitle = "Introduction PHP - Exo 3";
require_once "includes/_functions.php";
include 'includes/_header.php';

        

        $fruits = ["fraise", "banane", "pomme", "cerise", "ananas"];

        $prices = [3, 2, 2, 5, 8];

        ?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Ordonner le tableau des prix par ordre croissant et l'afficher en détail</p>
            <div class="exercice-sandbox">
                <?php
                sort($prices);
                var_dump($prices);
                ?>
            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Ajouter 1 euro à chaque prix</p>
            <div class="exercice-sandbox">
                <?php
                $add = fn ($n) => ++$n;
                $prices = array_map($add, $prices);

                var_dump($prices);

                // foreach ($prices as $price) {
                //     $newPrice = $price + 1;
                //     echo $newPrice."\n";
                // } 
                ?>

            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Créer le tableau $store qui combine les tableaux des fruits et des prix afin d'obtenir un tableau associatif d'attribution des prix. Afficher le tableau obtenu</p>
            <div class="exercice-sandbox">
                <?php
                $store = array_combine($fruits, $prices);
                var_dump($store);
                ?>
            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix inférieur à 4 euros</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($store as $fruit => $price) {
                        if ($price < 4) echo "<li>$fruit</li>";
                    }

                    var_dump(array_filter($store, fn ($p) => $p < 4));
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Afficher dans une liste HTML le nom des fruits ayant un prix pair</p>
            <div class="exercice-sandbox">
                <ul>
                    <?php
                    foreach ($store as $fruit => $price) {
                        if ($price % 2 === 0) echo "<li>$fruit</li>";
                    }
                    ?>
                </ul>
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Composer un panier de fruits ne dépassant pas 12 euros</p>
            <div class="exercice-sandbox">
                <?php
                $cart = 0;
                foreach ($store as $fruit => $price) {
                    if ($cart + $price <= 12) {
                        $cart += $price;
                        echo "<li>On ajoute $fruit, le panier est de $cart.</li>";
                    }
                    if ($cart >= 12) break;
                }


                $cart = 0;
                $cartList = "";
                while ($cart < 12) {
                    $key = array_rand($store);
                    if ($cart + $store[$key] > 12) break;
                    $cart += $store[$key];
                    $cartList .= "<li>$key: " . $store[$key] . "</li>";
                }

                echo "Panier de $cart <ul>$cartList</ul>";

                ?>
            </div>
        </section>

        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">En reprenant le prix total du panier constitué à la question précédente, appliquez-lui une taxe de 18%. Afficher le total taxe comprise.</p>
            <div class="exercice-sandbox">
                <?= $cart * 1.18 ?>
            </div>
        </section>

        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Ajouter au tableau $store le fruit "kiwi" pour un prix de 1,50 € puis afficher le tableau complet</p>
            <div class="exercice-sandbox">
                <?php
                $store["kiwi"] = 1.5;

                var_dump($store);
                ?>
            </div>
        </section>

        <!-- QUESTION 9 -->
        <?php
        $newFruits = [
            "pêche" => 3,
            "abricot" => 2,
            "mangue" => 9
        ];
        ?>
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Ajouter les nouveaux fruits du tableau $newFruits au tableau $store</p>
            <div class="exercice-sandbox">
                <?php
                // foreach ($newFruits as $newFruit => $price) {
                //     $store[$newFruit] = $price;
                // }

                $store = array_merge($store, $newFruits);

                var_dump($store);
                ?>
            </div>
        </section>

        <!-- QUESTION 10 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 10</h2>
            <p class="exercice-txt">Afficher le nom et le prix du fruit le moins cher</p>
            <div class="exercice-sandbox">
                <?php

                foreach ($store as $fruit => $price) {
                    if (!isset($minPrice) || $price < $minPrice) {
                        $minPrice = $price;
                        $bestPrice = $fruit;
                    }
                }

                echo "$bestPrice : $minPrice";
                ?>
            </div>
        </section>

        <!-- QUESTION 11 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 11</h2>
            <p class="exercice-txt">Afficher les noms et le prix des fruits les plus chers</p>
            <div class="exercice-sandbox">
                <?php

                foreach ($store as $fruit => $price) {
                    if (!isset($maxPrice) || $price > $maxPrice) {
                        $maxPrice = $price;
                        $bestPrice = [$fruit];
                    } else if ($price === $maxPrice) {
                        $bestPrice[] = $fruit;
                    }
                }
                echo implode(", ", $bestPrice) . " : $maxPrice";

                $maxPrice = max($store);
                $bestPrice = [];
                foreach ($store as $fruit => $price) {
                    if ($price === $maxPrice) {
                        $bestPrice[] = $fruit;
                    }
                }

                echo implode(", ", $bestPrice) . " : $maxPrice";
                ?>
            </div>
        </section>
        <?php
        include 'includes/_footer.php';
        ?>