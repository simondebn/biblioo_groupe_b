<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:32
 */

// Créer deux tableaux : un pour les livres et l'autre pour les revues.

$ressources = $ressourcesModelDb->getAll();

$books = [];
$revues = [];

foreach ($ressources as $ressource){
    if ($ressource['id_type'] == '1'){
        $books[] = $ressource;
    }else{
        $revues[] = $ressources;
    }
}

render('usersList', [
    'title' => 'Liste',
    'books' => $books,
    'revues' => $revues
]);