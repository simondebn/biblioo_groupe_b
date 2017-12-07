<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 01/12/2017
 * Time: 14:07
 */

function addEmprunt($params, $emprunt){
    return $emprunt->add($params['params']);
}

function modifyEmprunt($params, $emprunt){
    return $emprunt->modify($params);
}


if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addEmprunt') {
    if(addEmprunt($_POST['myParams'], $empruntModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre réservation a été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
} elseif (isset($_POST['myFunction']) && $_POST['myFunction'] === 'modifyEmprunt') {
    if(modifyEmprunt($_POST['myParams']['id'], $empruntModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'La modification a été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}