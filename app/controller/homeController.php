<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 11:48
 */

$ressourcesRented = $ressourcesModelDb->getFiveMostRented();
$ressourcesNoted = $ressourcesModelDb->getFiveBetterNoted();

$booksRented = [];
$booksNoted = [];

foreach ($ressourcesRented as $ressource){
    if ($ressource['id_type'] == 1){
        $booksRented[] = $ressource;
    }
}
foreach ($ressourcesNoted as $ressource){
    if ($ressource['id_type'] == 1){
        $booksNoted[] = $ressource;
    }
}

render('home', [
    'title'   => 'Accueil Biblioo',
    'booksRented'   => $booksRented,
    'booksNoted'   => $booksNoted,
]);