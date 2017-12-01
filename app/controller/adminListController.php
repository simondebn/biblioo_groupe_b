<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:34
 */


/** Gestion liste des comptes */

$comptes = $adminModelDb->getAll();

render('adminList', [
    'title'   => 'Liste',
    'comptes'   => $comptes,
]);

/** GESTION ADMINS */

// Ajout d'un admin

function addAdmin($params, $addAdmin){
    return $addAdmin->add($params['params']);
}

// Suppression d'un admin

function deleteAdmin($params, $deleteAdmin){
    return $deleteAdmin->delete($params['params']['id_admin']);
}

// Modification d'un admin

function modifyAdmin($params, $modifyAdmin) {
    return $modifyAdmin->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteAdmin') {
    if(deleteAdmin($_POST['myParams'], $adminModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre suppression a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addAdmin') {
    if(addAdmin($_POST['myParams'], $adminModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyAdmin') {
    if(modifyAdmin($_POST['myParams'], $adminModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre modification a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

/** GESTION RESSOURCES ADMINISTRATEUR */

// ajout d'une ressource

function addRessource($params, $addRessource) {
    return $addRessource->add($params['params']);
}

// suppression d'une ressource

function deleteRessource($params, $deleteRessource){
    return $deleteRessource->delete($params['params']['id_ressource']);
}

// modification d'une ressource

function modifyRessource($params, $modifyRessource) {
    return $modifyRessource->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteRessource') {
    if(deleteRessource($_POST['myParams'], $ressourcesModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre suppression a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addRessource') {
    if(addRessource($_POST['myParams'], $ressourcesModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyRessource') {
    if(modifyRessource($_POST['myParams'], $ressourcesModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre modification a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}