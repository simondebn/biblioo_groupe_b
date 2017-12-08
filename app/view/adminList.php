<div class="container main-container">

    <?php if (isset($_SESSION['login'])): ?>

    <nav style="background-color: #ff7500;" class="navbar fixed-top navbar-expand-md navbar-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse listButtonBar" id="navbarToggler">
            <a href="home"><span style="font-size: 1.5em" class="navbar-brand animated" id="bouncingLogo">{ Biblioo }</span></a>
            <ul class="navbar-nav mr-auto mt-lg-0">
                <li class="nav-item">
                    <a id="adminBookButton" class="buttonNavBar nav-link">Livres</a>
                </li>
                <li class="nav-item">
                    <a id="adminRevueButton" class="buttonNavBar nav-link">Revues</a>
                </li>
                <li class="nav-item">
                    <a id="adminButton" class="buttonNavBar nav-link">Administrateurs</a>
                </li>
                <li class="nav-item active">
                    <a id="loanButton" class="buttonNavBar nav-link">Prêts/Retour</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus-circle"
                                                                                            aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-unique"
                         aria-labelledby="navbarDropdownMenuLink">
                        <a id="addBookButton" class="dropdown-item waves-effect waves-light">Livre</a>
                        <a id='addRevueButton' class="dropdown-item waves-effect waves-light">Revue</a>
                        <a id="addAdminButton" class="dropdown-item waves-effect waves-light">Administrateur</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nb/page</a>
                    <div class="dropdown-menu dropdown-primary">
                        <a class="dropdown-item">1</a>
                        <a class="dropdown-item">2</a>
                        <a class="dropdown-item">5</a>
                        <a class="dropdown-item">Tout</a>
                    </div>
                </li>
                <li class="nav-item" style="align-self: center">
                    <a class="waves-effect waves-light" title="déconnexion" id="deconnexion">
                        <img src="public/img/svg/lock_24.svg">
                    </a>
                </li>
            </ul>
        </div>
    </nav>


        <div id="adminBookList" class="row" style="margin:0">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th class="sort col-md-1" data-sort="titre">Titre</th>
                    <th class="sort col-md-3" data-sort="auteur">Auteur</th>
                    <th class="sort col-md-3" data-sort="date" style="min-width: 100px">Parution</th>
                    <th class="sort col-md-3" data-sort="domaine">Thème</th>
                    <th>Note</th>
                    <th></th>
                    <th><input style="margin:0;height:5px;" class="form-control w-100 search" type="text"
                               placeholder="Rechercher" aria-label="Search"></th>
                    <th></th>
                </tr>
                </thead>

                <tbody class="list">
                <?php foreach ($books as $book): ?>

                    <tr>
                        <td class="vignette"><img
                                    src="data:image/jpeg;base64, <?= base64_encode($book['couverture']) ?>" alt=""></td>
                        <td class="titre align-middle"><?= $book['titre'] ?></td>
                        <td class="auteur align-middle"><?= $book['auteur'] ?></td>
                        <td class="date align-middle"><?= $book['date'] ?></td>
                        <td class="domaine align-middle"><?= $book['domaine'] ?></td>
                        <?php if ($book['note'] == 0): ?>
                            <td class="note align-middle">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<img src="public/img/svg/stars/border_foncee.svg"/>';
                                }
                                ?>
                            </td>
                        <?php else: ?>
                        <td class="note align-middle">
                            <?php
                            for ($i = 1; $i <= $book['note']; $i++) {
                                echo '<img src="public/img/svg/stars/full_jaune.svg"/>';
                            }
                            for ($j = $book['note'] + 1; $j <= 5; $j++) {
                                echo '<img src="public/img/svg/stars/full_clair.svg"/>';
                            }
                            ?>
                            <?php endif; ?>
                        <td class="align-middle lien"><a id="link" target="_blank" href="<?= $book['link'] ?>"><img class="lien_infos"
                                                                                                     src="public/img/svg/infos.svg"></a>
                        </td>
                        <td class="align-middle">
                            <div class="button_admin">
                                <button id="modifyBookButton" data-id="<?= $book['id'] ?>" class="btn btn-orange btn-md btn-admin">Modifier</button>
                                <button id="deleteBookButton" data-id="<?= $book['id'] ?>"
                                        class="btn btn-red btn-md btn-admin">Supprimer
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>

            <div class="row containerPagination">
                <nav class="text-center">
                    <ul class="pagination pagination-circle pg-amber mb-0"></ul>
                </nav>
            </div>
        </div>

        <div id="adminRevueList" class="row" style="margin:0">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th class="sort" data-sort="titre">Titre</th>
                    <th class="sort" data-sort="date" style="min-width: 100px">Parution</th>
                    <th class="sort" data-sort="description">Description</th>
                    <th>Note</th>
                    <th></th>
                    <th><input style="margin:0;height:5px;" class="form-control w-100 search" type="text"
                               placeholder="Rechercher" aria-label="Search"></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($revues as $revue): ?>
                    <tr>
                        <td class="vignette "><img
                                    src="data:image/jpeg;base64, <?= base64_encode($revue['couverture']) ?>" alt="">
                        </td>
                        <td class="titre align-middle"><?= $revue['titre'] ?></td>
                        <td class="date align-middle"><?= $revue['date'] ?></td>
                        <td class="description align-middle"><?= $revue['description'] ?></td>
                        <?php if ($book['note'] == 0): ?>
                            <td class="note align-middle">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<img src="public/img/svg/stars/border_foncee.svg"/>';
                                }
                                ?>
                            </td>
                        <?php else: ?>
                        <td class="note align-middle">
                            <?php
                            for ($i = 1; $i <= $book['note']; $i++) {
                                echo '<img src="public/img/svg/stars/full_jaune.svg"/>';
                            }
                            for ($j = $book['note'] + 1; $j <= 5; $j++) {
                                echo '<img src="public/img/svg/stars/full_clair.svg"/>';
                            }
                            ?>
                            <?php endif; ?>

                        <td class="align-middle lien"><a target="_blank" href="<?= $revue['link'] ?>"><img class="lien_infos"
                                                                                                      src="public/img/svg/infos.svg"></a>
                        </td>
                        <td class="align-middle">
                            <div class="button_admin">
                                <button id="modifyRevueButton" data-id="<?= $revue['id'] ?>" class="btn btn-orange btn-md btn-admin">Modifier</button>
                                <button id="deleteRevueButton" data-id="<?= $revue['id'] ?>"
                                        class="btn btn-red btn-md btn-admin">Supprimer
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            <div class="row containerPagination">
                <nav class="text-center">
                    <ul class="pagination pagination-circle pg-amber mb-0"></ul>
                </nav>
            </div>
        </div>

        <div id="adminList" class="row" style="margin:0">
            <table class="table">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th class="sort" data-sort="login">Login</th>
                    <th class="sort" data-sort="email">Email</th>
                    <th><input style="margin:0;height:5px;" class="form-control w-100 search" type="text"
                               placeholder="Rechercher" aria-label="Search"></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td class="vignette"><img
                                    src="data:image/jpeg;base64, <?= base64_encode($admin['photo']) ?>" alt=""></td>
                        <td class="login align-middle"><?= $admin['login'] ?></td>
                        <td class="email align-middle"><?= $admin['email'] ?></td>
                        <td class="align-middle" style="width: 200px">
                            <div class="button_admin">
                                <button class="btn btn-orange btn-md btn-admin" data-id="<?= $admin['id'] ?>" id="modifyAdminButton">Modifier</button>
                                <button id="deleteAdminButton" data-id="<?= $admin['id'] ?>"
                                        class="btn btn-red btn-md btn-admin">Supprimer
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            <div class="row containerPagination">
                <nav class="text-center">
                    <ul class="pagination pagination-circle pg-amber mb-0"></ul>
                </nav>
            </div>
        </div>

        <div id="empruntList" class="row" style="margin:0">
            <table class="table">
                <thead>
                <tr>

                    <th class="sort" data-sort="titre">Titre</th>
                    <th class="sort" data-sort="nom">Nom</th>
                    <th class="sort" data-sort="prenom">Prénom</th>
                    <th class="sort" data-sort="promo">Promotion</th>
                    <th class="sort" data-sort="date_debut">Date d'emprunt</th>
                    <th class="sort" data-sort="delai">Date de retour</th>
                    <th><input style="margin:0;height:5px;" class="form-control w-100 search" type="text"
                               placeholder="Rechercher" aria-label="Search"></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($emprunts as $emprunt): ?>
                    <?php
                    $delai = '+' . $emprunt['delai'] . ' week';
                    $date_retour = date('Y-m-d', strtotime($delai, strtotime($emprunt['date_debut'])));
                    if ($date_retour > date("Y-m-d")): ?>
                        <tr>
                    <?php else: ?>
                        <tr class="table-danger">
                    <?php endif; ?>
                    <td class="titre align-middle"><?= $emprunt['titre'] ?></td>
                    <td class="nom align-middle"><?= $emprunt['nom'] ?></td>
                    <td class="prenom align-middle"><?= $emprunt['prenom'] ?></td>
                    <td class="promo align-middle"><?= $emprunt['promo'] ?></td>
                    <td class="date_debut align-middle"><?= date('Y-m-d', strtotime($emprunt['date_debut'])) ?></td>
                    <td class="delai align-middle"><?php
                        $delai = '+' . $emprunt['delai'] . ' week';
                        echo date('Y-m-d', strtotime($delai, strtotime($emprunt['date_debut'])));
                        ?></td>

                    <td class="align-middle">
                        <div class="button_admin">
                            <button class="btn btn-green btn-md btn-admin" data-id="<?= $emprunt['id'] ?>"
                                    id="modifyEmprunt">Retour
                            </button>
                        </div>
                    </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

            <div class="row containerPagination">
                <nav class="text-center">
                    <ul class="pagination pagination-circle pg-amber mb-0"></ul>
                </nav>
            </div>
        </div>

        <?php endif; ?>

        <div class="modal fade form" role="dialog" aria-labelledby="test" aria-hidden="true">
            <div class="modal-dialog modal-lg"></div>
        </div>

</div>
