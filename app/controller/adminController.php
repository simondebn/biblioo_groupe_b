<?php
/**
 * ADD ADMIN
 */
function addAdmin($params, $addAdmin)
{
    return $addAdmin->add($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addAdmin') {
    if(addAdmin($_POST['myParams'], $adminModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistrée !',
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

/**
 * Suppression d'un admin
 */

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteAdmin') {
    if(deleteAdmin($_POST['id'], $adminModelDb)){
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

function deleteAdmin($id, $adminModelDb){
    return $adminModelDb->delete($id);
}

/** GESTION RESSOURCES ADMINISTRATEUR */

// ajout d'une ressource

function addRessource($params, $addRessource)
{
    return $addRessource->add($params['params']);
}

// suppression d'une ressource

function deleteRessource($params, $deleteRessource)
{
    return $deleteRessource->delete($params['params']['id_ressource']);
}

// modification d'une ressource

function modifyRessource($params, $modifyRessource)
{
    return $modifyRessource->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteRessource') {
    if (deleteRessource($_POST['myParams'], $ressourcesModelDb)) {
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

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addRessource') {
    if (addRessource($_POST['myParams'], $ressourcesModelDb)) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistrée !'
        ));
    } else {
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyRessource') {
    if (modifyRessource($_POST['myParams'], $ressourcesModelDb)) {
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