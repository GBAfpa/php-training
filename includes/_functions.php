<?php
/**
 * Gives the HTML list from the given array. 
 *
 * @param array $array
 * @param string|null $classUl
 * @param string|null $classLi
 * @return string
 */
function getHtmlFromArray(array $array, string $classUl = null, string $classLi = null): string
{
    if ($classUl) $classUl = " class=\"$classUl\"";
    if ($classLi) $classLi = " class=\"$classLi\"";
    $valueToLi = fn ($v) => "<li$classLi>$v</li>";
    return "<ul$classUl>" . implode("", array_map($valueToLi, $array)) . "</ul>";
}

/**
 * Returns serie URL from id
 *
 * @param integer $idSerie
 * @return string
 */
function getSerieURL(int $idSerie): string
{
    return "?serie=$idSerie#question4";
}

/**
 * Returns Html to display a title
 *
 * @param integer $level 
 * @param string $content
 * @param string|null $classCss
 * @return string
 */
function getHtmlTitle(int $level, string $content, string $classCss = null): string
{
    $classCss = $classCss ? " class=\"$classCss\"" : "";
    return "<h${level}${classCss}>$content</h$level>";
}

/**
 * returns a Html code for the given serie
 *
 * @param array $serie
 * @return string
 */
function getHtmlSerie(array $serie, bool $isFull = false): string
{
    $html = "<a href=\"" . getSerieURL($serie["id"]) . "\"><img src=\"" . $serie["image"] . "\" class=\"serie-img\"></a>";
    $html .= getHtmlTitle(2, "<a class=\"serie-lnk\" href=\"" . getSerieURL($serie["id"]) . "\">" . $serie["name"] . "</a>", "serie-ttl");
    $html .= getHtmlTitle(3, "Créée par :");
    $html .= getHtmlFromArray($serie["createdBy"], "text-list", "text-list-item");
    $html .= getHtmlTitle(3, "Acteurs :");
    $html .= getHtmlFromArray($serie["actors"], "text-list", "text-list-item");
    if ($isFull) {
        $html .=  getHtmlTitle(3, "Pays: ") . "<p>" . $serie["country"] . "</p>";
        $html .=  getHtmlTitle(3, "Année: ") . "<p>" . $serie["launchYear"] . "</p>";
        $html .=  getHtmlTitle(3, "Plateforme: ") . "<p>" . $serie["availableOn"] . "</p>";
        $html .= getHtmlTitle(3, "Styles :");
        $html .= getHtmlFromArray($serie["styles"], "text-list", "text-list-item");
    }
    return $html;
}

/**
 * Returns main navigation HTML 
 *
 * @param array $pages Pages list
 * @param integer $currentPage
 * @return string
 */
function getMainNavigation(array $pages, int $currentPage = 1):string {
    $html = "";
    foreach($pages as $page) {
        $html .= "<li><a class=\"main-nav-link".($currentPage === $page["pageNumber"] ? ' active' : '')."\" href=\"".$page["href"]."\">".$page["pageTitle"]."</a></li>";
    }
    
    return "<nav class=\"main-nav\"><ul class=\"main-nav-list\">".$html."</ul></nav>";
}

?>