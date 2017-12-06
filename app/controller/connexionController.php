<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 06/12/2017
 * Time: 10:11
 */

function checkConnexion($params, $admin) {
    $result = $admin->checkPassword($params['login'], $params['password']);
    return $result;
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'checkConnexion') {
    if (checkConnexion($_POST['myParams']['params'], $adminModelDb)) {
        echo json_encode(array(
            'type' => 'success',
            'msg' => 'Connexion OK'
        ));
    } else {
        echo json_encode(array(
            'type' => 'error',
            'msg' => 'Une erreur est survenue !'
        ));
    }
} else {
    render('formAdminConnexion', [
        'title' => 'Connexion',
    ]);
}
