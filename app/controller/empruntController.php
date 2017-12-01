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

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addEmprunt') {
    if(addEmprunt($_POST['myParams'], $empruntModelDb)){
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre réservation a bien été enregistrée !'
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}