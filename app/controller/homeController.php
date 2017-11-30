<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 11:48
 */

$foo = "Salut c'est cool !!!";

render('home', [
    'title'   => 'Accueil Biblioo',
    'foo' => $foo
]);