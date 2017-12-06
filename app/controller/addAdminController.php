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
