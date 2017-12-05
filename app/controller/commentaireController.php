<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 05/12/2017
 * Time: 12:08
 */

function addCommentaire($params, $commentaire) {
    return $commentaire->add($params['params']);
}

function getRessourceCommentaire($id, $commentaire) {
    return $commentaire->getRessourceComments($id);
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'addCommentaire') {
    if(addCommentaire($_POST['myParams'], $commentaireModelDb)){
        $newAverage = $ressourcesModelDb->getNoteAverage($_POST['myParams']['params']['id_ressource']);
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Votre avis a bien été enregistré !',
            'newAverage' => $newAverage
        ));
    }
    else{
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
}


if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'getRessourceCommentaire') {
    // ajouter pour les cas d'erreur
    $comments = getRessourceCommentaire($_POST['myParams']['id'], $commentaireModelDb);
    echo json_encode($comments);
}
