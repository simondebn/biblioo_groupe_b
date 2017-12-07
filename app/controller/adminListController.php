<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:34
 */


/** Gestion liste des comptes */

$ressources = $ressourcesModelDb->getAll();
$admins = $adminModelDb->getAll();
$emprunts = $empruntModelDb->getLoan();


$books = [];
$revues = [];


foreach ($ressources as $ressource) {
    if ($ressource['id_type'] == 1) {
        $books[] = $ressource;
    } else {
        $revues[] = $ressource;
    }
}

if (isset($_SESSION['login'])) {
    render('adminList', [
        'title' => 'Liste',
        'books' => $books,
        'revues' => $revues,
        'admins' => $admins,
        'emprunts' => $emprunts,
    ]);
} else {
    render('formAdminConnexion', [
        'title' => 'Connexion',
    ]);
}

