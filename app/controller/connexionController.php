<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 06/12/2017
 * Time: 10:11
 */

function checkConnexion($params, $admin)
{
    $result = $admin->checkPassword($params['login'], $params['password']);
    return $result;
}

if (isset($_POST['myFunction']) && $_POST['myFunction'] === 'checkConnexion') {
    if (checkConnexion($_POST['myParams']['params'], $adminModelDb)) {
        $_SESSION['login'] = $_POST['myParams']['params']['login'];
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
} elseif (isset($_POST['myFunction']) && $_POST['myFunction'] === 'deconnexion') {
    unset($_SESSION['login']);
} else {
    if (isset($_SESSION['login'])) {
        // afiicher directement adminList (copie du code présent dans controller adminList)

        $ressources = $ressourcesModelDb->getAll();
        $admins = $adminModelDb->getAll();
        $emprunts = $empruntModelDb->getLoan();


        $books = [];
        $revues = [];


        foreach ($ressources as $ressource) {
            if ($ressource['id_type'] == 1) {
                $books[] = $ressource;
            } else {
                $revues[] = $ressource;
            }
        }


        render('adminList', [
            'title' => 'Liste',
            'books' => $books,
            'revues' => $revues,
            'admins' => $admins,
            'emprunts' => $emprunts,
        ]);
    } else {
        render('formAdminConnexion', [
            'title' => 'Connexion',
        ]);
    }
}
