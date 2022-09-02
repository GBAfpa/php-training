<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Introduction PHP - Exo 4</title>
</head>
<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl">Introduction PHP - Exo 4</h1>
            <nav class="main-nav">
                <ul class="main-nav-list">
                    <li><a class="main-nav-link" href="index.php">Entrainement</a></li>
                    <li><a class="main-nav-link" href="exo2.php">Donnez moi des fruits</a></li>
                    <li><a class="main-nav-link" href="exo3.php">Donnez moi de la thune</a></li>
                    <li><a class="main-nav-link active" href="exo4.php">Des fonctions et des tableaux</a></li>
                    <li><a class="main-nav-link" href="exo5.php">Netflix</a></li>
                </ul>
            </nav>
        </header>

<?php

$array = [12, 65, 95, 41, 85, 63, 71, 64];

$arrayA = [12, "le", 95, 12, 85, "le", 71, "toi", 95, "la"];
$arrayB = [85, "toi", 95, "la", 65, 94, 85, "avec", 37, "chat"];
?>

        <!-- QUESTION 1 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 1</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et retourne la chaîne de caractère HTML permettant d'afficher les valeurs du tableau sous la forme d'une liste.</p>
            <div class="exercice-sandbox">
            <?php

            function getList($array) {
                $list = "";
                foreach($array as $index => $value) {
                    $list .= "<li>$index: $value</li>";
                }
                return "<ul>$list</ul>";
            }

            // echo getList($array);

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

            echo getHtmlFromArray($arrayA);
            ?>
            </div>
        </section>

        <!-- QUESTION 2 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 2</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les valeurs paires. Afficher les valeurs du tableau sous la forme d'une liste HTML.</p>
            <div class="exercice-sandbox">
            <?php

                function getNumberPair(array $array):string {
                    $list = "<ul>";
                    foreach($array as $number) {
                        if ($number%2 === 0) {
                            $list .= "<li>".$number."</li>";
                        }
                    }
                    $list .= "</ul>";
                    return $list;
                }

                // echo getNumberPair($array);

                /**
                 * Filters the even numbers of the given array.
                 *
                 * @param array $array The array to filter
                 * @return array
                 */
                function getEvenNumbersFromArray(array $array):array {
                    // $a = [];
                    // foreach($array as $number) {
                    //     if ($number%2 === 0) {
                    //         $a[] = $number;
                    //     }
                    // }
                    // return $a;
                    return array_filter($array, fn($v) => $v%2 === 0);
                }

                $even = getEvenNumbersFromArray($array);
                echo getHtmlFromArray($even);
            ?>
            </div>
        </section>

        <!-- QUESTION 3 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 3</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et retourne uniquement les entiers d'index pair</p>
            <div class="exercice-sandbox">
                <?php
                    /**
                     * Get values having even index from the array.
                     *
                     * @param array $a
                     * @return array
                     */
                    function getEvenIndex(array $a):array {
                        // $b = [];
                        // foreach($a as $index => $number) {
                        //     if ($index%2 === 0) {
                        //         $b[] = $number;
                        //     }
                        // }
                        // return $b;
                        return array_filter($a, fn($k) => $k%2 === 0, ARRAY_FILTER_USE_KEY);
                    }

                    echo getHtmlFromArray(getEvenIndex($array));
                ?>
            </div>
        </section>

        <!-- QUESTION 4 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers. La fonction doit retourner les valeurs du tableau mulipliées par 2.</p>
            <div class="exercice-sandbox">
                <?php
                
                /**
                 * Filters numeric values of the given array and multiplies them by 2.
                 *
                 * @param array $array
                 * @return array
                 */
                function getValuesMultiplyBy2(array $array):array {
                    // $newArray = [];
                    // foreach($array as $value) {
                    //     if (is_numeric($value)) $newArray[] = $value * 2;
                    // }
                    // return $newArray;

                    return array_map(fn($v) => $v*2, array_filter($array, "is_numeric"));
                }

                var_dump(getValuesMultiplyBy2($arrayA));

                ?>
            </div>
        </section>

        <!-- QUESTION 4 bis -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 4 bis</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers et un entier. La fonction doit retourner les valeurs du tableau divisées par le second paramètre</p>
            <div class="exercice-sandbox">
                <?php

                /**
                 * Filters numeric values of the given array divided by the second parameter.
                 *
                 * @param array $array  The list of values to be divided 
                 * @param integer $div  The divider
                 * @return array
                 */
                function divideValuesBy(array $array, int $div):array {
                    return array_map(fn($v) => $v/$div, array_filter($array, "is_numeric"));
                }

                var_dump(divideValuesBy($arrayB, 8));
                ?>
            </div>
        </section>

        <!-- QUESTION 5 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 5</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau d'entiers ou de chaînes de caractères et retourne le tableau sans doublons</p>
            <div class="exercice-sandbox">
                <?php
                
                /**
                 * Removes duplicate values of the array
                 *
                 * @param array $array
                 * @return array
                 */
                function cleanArrayFromDuplicate(array $array):array {
                    // return array_unique($array);
                    $output = [];
                    foreach($array as $key => $value) {
                        if (!in_array($value, $output)) $output[$key] = $value;
                    }
                    return $output;
                }

                var_dump(cleanArrayFromDuplicate($arrayA));

                ?>
                
            </div>
        </section>

        <!-- QUESTION 6 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 6</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau représentant l'intersection des 2</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>
                    
        <!-- QUESTION 7 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 7</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre 2 tableaux et retourne un tableau des valeurs du premier tableau qui ne sont pas dans le second</p>
            <div class="exercice-sandbox">

            </div>
        </section>

                    
        <!-- QUESTION 8 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 8</h2>
            <p class="exercice-txt">Réécrire la fonction précédente pour lui ajouter un paramètre booléen facultatif. Si celui-ci est à true, le tableau retourné sera sans doublons</p>
            <div class="exercice-sandbox">

            </div>
        </section>

            
        <!-- QUESTION 9 -->
        <section class="exercice">
            <h2 class="exercice-ttl">Question 9</h2>
            <p class="exercice-txt">Déclarer une fonction qui prend en paramètre un tableau et un entier et retourne les n premiers éléments du tableau.</p>
            <div class="exercice-sandbox">
                
            </div>
        </section>
    </div>
<div class="copyright">© Guillaume Belleuvre, 2022 - DWWM Le Havre</div>
</body>
</html>