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

/** GESTION ADMINS */


// Suppression d'un admin

function deleteAdmin($params, $deleteAdmin)
{
    return $deleteAdmin->delete($params['params']['id_admin']);
}

// Modification d'un admin

function modifyAdmin($params, $modifyAdmin)
{
    return $modifyAdmin->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteAdmin') {
    if (deleteAdmin($_POST['myParams'], $adminModelDb)) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre suppression a bien été enregistrée !'
        ));
    } else {
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}


if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyAdmin') {
    if (modifyAdmin($_POST['myParams'], $adminModelDb)) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre modification a bien été enregistrée !'
        ));
    } else {
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}
