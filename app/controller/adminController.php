<?php
/**
 * ADD ADMIN
 */
function addAdmin($params, $adminModelDb)
{
    return $adminModelDb->add($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addAdmin') {
    $_POST['myParams']['params']['password'] = sha1($_POST['myParams']['params']['password']);
    if(addAdmin($_POST['myParams'], $adminModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistré !',
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
function deleteAdmin($id, $adminModelDb){
    return $adminModelDb->delete($id);
}

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




/** GESTION RESSOURCES ADMINISTRATEUR */

// ajout d'une ressource

function addBook($params, $ressourcesModelDb)
{
    return $ressourcesModelDb->addBook($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addBook') {
    if(addBook($_POST['myParams'], $ressourcesModelDb)){
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

/*// suppression d'une ressource

function deleteRessource($params, $deleteRessource)
{
    return $deleteRessource->delete($params['params']['id_ressource']);
}*/

// modification d'une ressource

function modifyRessource($params, $modifyRessource)
{
    return $modifyRessource->modify($params['params']);
}

/*if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteRessource') {
    if (deleteRessource($_POST['myParams'], $ressourcesModelDb)) {*/

/**
 * Suppression d'une ressource
 */

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteRessource') {
    if (deleteRessource($_POST['id'], $ressourcesModelDb)) {
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

function deleteRessource($id , $ressourcesModelDb)
{
    $ressourcesModelDb->deleteComment($id);
    $ressourcesModelDb->deleteEmprunt($id);
    return $ressourcesModelDb->delete($id);

}