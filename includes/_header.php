    <?php
    $pagesArray = [
        ["pageNumber" => 1, "pageTitle" => "Entraïnement", "href" => "index.php"],
        ["pageNumber" => 2, "pageTitle" => "Donnez moi des fruits", "href" => "exo2.php"],
        ["pageNumber" => 3, "pageTitle" => "Donnez moi de la thune", "href" => "exo3.php"],
        ["pageNumber" => 4, "pageTitle" => "Des fonctions et des tableaux", "href" => "exo4.php"],
        ["pageNumber" => 5, "pageTitle" => "Netflix", "href" => "exo5.php"]
    ];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <title><?= isset($pageTitle) ? $pageTitle : "Titre par défaut" ?></title>
</head>

<body class="dark-template">
    <div class="container">
        <header class="header">
            <h1 class="main-ttl"><?= isset($pageTitle) ? $pageTitle : "Titre par défaut" ?></h1>
            <?=getMainNavigation($pagesArray, $pageNumber)?>
        </header>