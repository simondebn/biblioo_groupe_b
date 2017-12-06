<div class="container">

    <nav style="margin-top:20px;background-color: #ff7500" class="navbar navbar-expand-lg navbar-dark">

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse listButtonBar" id="navbarSupportedContent">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="adminBookButton" class="buttonNavBar nav-link" href="#">Livres</a>
                </li>
                <li class="nav-item">
                    <a id="adminRevueButton" class="buttonNavBar nav-link" href="#">Revues</a>
                </li>
                <li class="nav-item">
                    <a id="adminButton" class="buttonNavBar nav-link" href="#">Administrateurs</a>
                </li>
                <li class="nav-item active">
                    <a id="loanButton" class="buttonNavBar nav-link" href="#">Prêts/Retour</a>
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
            </ul>

            <!-- Links -->
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->

    <div id="adminBookList" class="row" style="margin:0">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th class="sort col-md-1" data-sort="titre">Titre</th>
                <th class="sort col-md-3" data-sort="auteur">Auteur</th>
                <th class="sort col-md-3" data-sort="date" style="min-width: 100px">Parution</th>
                <th class="sort col-md-3" data-sort="domaine ">Thème</th>
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
                    <td class="note align-middle"><?= $book['note'] ?></td>
                    <td class="align-middle"><a target="_blank" href="<?= $book['link'] ?>"><img class="lien_infos"
                                                                                                 src="public/img/svg/infos.svg"></a>
                    </td>
                    <td class="align-middle">
                        <div class="button_admin">
                            <button class="btn btn-orange btn-md btn-admin">Modifier</button>
                            <button class="btn btn-red btn-md btn-admin">Supprimer</button>
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
                                src="data:image/jpeg;base64, <?= base64_encode($revue['couverture']) ?>" alt=""></td>
                    <td class="titre align-middle"><?= $revue['titre'] ?></td>
                    <td class="date align-middle"><?= $revue['date'] ?></td>
                    <td class="description align-middle"><?= $revue['description'] ?></td>
                    <td class="note align-middle"><?= $revue['note'] ?></td>
                    <td class="align-middle"><a target="_blank" href="<?= $revue['link'] ?>"><img class="lien_infos"
                                                                                                  src="public/img/svg/infos.svg"></a>
                    </td>
                    <td class="align-middle">
                        <div class="button_admin">
                            <button class="btn btn-orange btn-md btn-admin">Modifier</button>
                            <button class="btn btn-red btn-md btn-admin">Supprimer</button>
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
                <th></th>
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
                    <td class="align-middle">
                        <div class="button_admin">
                            <button class="btn btn-orange btn-md btn-admin">Modifier</button>
                            <button class="btn btn-red btn-md btn-admin">Supprimer</button>
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

    <div   class="modal fade form" role="dialog" aria-labelledby="test" aria-hidden="true">
        <div  class="modal-dialog modal-mg"></div>
    </div>


</div>
