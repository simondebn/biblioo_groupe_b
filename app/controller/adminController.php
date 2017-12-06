<?php


function addAdmin($params, $addAdmin)
{
    return $addAdmin->add($params['params']);
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

function deleteRessource($id , $ressourcesModelDb)
{
    return $ressourcesModelDb->delete($id);
}