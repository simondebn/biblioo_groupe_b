<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 30/11/2017
 * Time: 15:34
 */


// Liste livres

<<<<<<< HEAD
// Liste Revues
=======
                </tbody>
            </table>
        </div>
    </div>
    <div id="accountsList" class="row">
        <div class="col-md-12">
            <table class="table" id="accounts">
                <thead class="mdb-color grey lighten-5">
                <tr>
                    <th></th>
                    <th class="sort" data-sort="login">Login</th>
                    <th class="sort" data-sort="e-mail">E-mail</th>
                    <th><input class="search" placeholder="Search"/></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($comptes as $compte): ?>
                    <tr>
                        <td class="cover_book "><img
                                    src="data:image/jpeg;base64, <?= base64_encode($revue['couverture']) ?>" alt=""></td>
                        <td class="login align-middle"><?= $compte['login'] ?></td>
                        <td class="email align-middle"><?= $compte['email'] ?></td>
                        <td class="align-middle">
                            <div class="button_admin">
                                <button class="btn btn-orange btn-md btn-admin">Modifier</button><button class="btn btn-red btn-md btn-admin">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <div id="pretRetourList" class="row">
        <div class="col-md-12">
            <table class="table" id="pretRetour">
                <thead class="mdb-color grey lighten-5">
                <tr>
                    <th></th>
                    <th class="sort" data-sort="titre">Titre de la ressource</th>
                    <th class="sort" data-sort="nom">Nom</th>
                    <th class="sort" data-sort="prenom">Prénom</th>
                    <th class="sort" data-sort="promotion">Promotion</th>
                    <th class="sort" data-sort="dateEmprunt">Date d'emprunt</th>
                    <th class="sort" data-sort="dateMaxRetour">Date max. de retour</th>
                    <th><input class="search" placeholder="Search"/></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($emprunts as $emprunt): ?>
                    <tr>
                        <td class="titre "><?= $emprunt['titre'] ?></td>
                        <td class="nom align-middle"><?= $emprunt['nom'] ?></td>
                        <td class="prenom align-middle"><?= $emprunt['prenom'] ?></td>
                        <td class="promotion align-middle"><?= $emprunt['promotion'] ?></td>
                        <td class="dateEmprunt align-middle"><?= $emprunt['dateEmprunt'] ?></td>
                        <td class="dateMaxRetour align-middle"><?= $emprunt['dateMaxRetour'] ?></td>
                        <td class="align-middle">
                                <button class="btn btn-green">Retour</button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
>>>>>>> cb09844c7f1b523cd86eda721233fa3c634bab4b

// Liste Admin

// Liste Prêt/Retour

// Pour chaque liste faire une boucle PHP  sur le tableau crée dans le contrôleur pour générer la liste