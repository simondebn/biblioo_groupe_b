<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 12:14
 */


/**Aide au Dev, affiche le tableau désigné
 * @param $arr
 */
function debug($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

/**Permet de générer le rendu des pages
 * @param $view, chemin de la vue
 * @param $params, tableau de paramètre contenant les variables utilisées
 */
function render($view, $params){
    extract($params);
    include 'app/view/header.php';
    include 'app/view/' . $view . '.php';
    include 'app/view/footer.php';
}

/**
 * Convertie les caractères spéciaux en entité HTML
 * @return la chaîne de caractère échappée
 */
function h($str){
    return htmlspecialchars($str);
}

