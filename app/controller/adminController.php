<?php

$error = false;

if(isset($_POST['myParams'])){
    foreach ($_POST['myParams']['params'] as $str){
        $str = h($str);
        echo $str;
    }
}

/*** GESTION DES ADMINS ***/

/*** Ajout d'un admin ***/
function addAdmin($params, $adminModelDb)
{
    return $adminModelDb->add($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addAdmin') {

    $_POST['myParams']['params']['password'] = sha1($_POST['myParams']['params']['password']);
    try {
        addAdmin($_POST['myParams'], $adminModelDb);

    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }

    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistré !',
        ));
    }
}

/*** Suppression d'un admin ***/

function deleteAdmin($id, $adminModelDb)
{
    return $adminModelDb->delete($id);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteAdmin') {

    try {
        deleteAdmin($_POST['id'], $adminModelDb);

    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;

    }
    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre suppression a bien été enregistré !',
        ));
    }
}
/*** Modification d'un Admin ***/

function modifyAdmin($params, $modifyAdmin)
{
    return $modifyAdmin->modify($params['params']);
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

/*** GESTION RESSOURCES ADMINISTRATEUR ***/

/*** Ajout d'un Livre ***/

function addBook($params, $ressourcesModelDb)
{
    return $ressourcesModelDb->addBook($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addBook') {

    try {
        addBook($_POST['myParams'], $ressourcesModelDb);

    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }

    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistré !',
        ));
    }
}

/*** Ajout d'une Revue ***/

function addRevue($params, $ressourcesModelDb)
{
    return $ressourcesModelDb->addRevue($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addRevue') {

    try {
        addRevue($_POST['myParams'], $ressourcesModelDb);

    } catch (PDOException $e) {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }

    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre ajout a bien été enregistré !',
        ));
    }
}


/*** Suppression d'une ressource ***/

function deleteRessource($id, $ressourcesModelDb)
{
    $ressourcesModelDb->deleteComment($id);
    $ressourcesModelDb->deleteEmprunt($id);
    return $ressourcesModelDb->delete($id);

}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deleteRessource') {

    try {
        deleteRessource($_POST['id'], $ressourcesModelDb);
    } catch (PDOException $e) {

        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
        $error = true;
    }

    if ($error === false) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre suppression a bien été enregistré !',
        ));
    }
}


/*** Modification d'une ressource ***/

function modifyRessource($params, $modifyRessource)
{
    return $modifyRessource->modify($params['params']);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyRessource') {
    if (modifyRessource($_POST['myParams'], $ressourcesModelDb)) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre modification a bien été enregistrée !'
        ));
    } else {
        echo json_encode(array(
            'type' => 'danger',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}


