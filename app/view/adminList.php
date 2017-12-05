<div class="container">

    <div class="row listButtonBar btn-group btn-menu">
        <!-- btn-elegant = actif , btn-blue-gray = non-actif -->
        <button id="bookButton" class="btn btn-blue-grey btn-lg">Livres</button>
        <button id="revueButton" class="btn btn-blue-grey btn-lg">Revues</button>
        <button id="adminButton" class="btn btn-blue-grey btn-lg">Administrateurs</button>
        <button id="loanButton" class="btn btn-elegant btn-lg">Prêts/Retour</button>
    </div>
        <button class="btn btn-primary"><i class="fa fa-sign-out" aria-hidden="true"></i></button>

    <div id="adminBookList" class="row">
        <table class="table">
            <thead>
            <tr>
                <th><img class="add_res" src="public/img/svg/plus.svg" alt="ajouter"></th>
                <th class="sort col-md-1" data-sort="titre">Titre</th>
                <th class="sort col-md-3" data-sort="auteur">Auteur</th>
                <th class="sort col-md-3" data-sort="date" style="min-width: 100px">Parution</th>
                <th class="sort col-md-3" data-sort="domaine ">Thème</th>
                <th>Note</th>
                <th></th>
                <th><input class="search" placeholder="Rechercher"/></th>
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

    <div id="adminRevueList" class="row">
        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th class="sort" data-sort="titre">Titre</th>
                <th class="sort" data-sort="date" style="min-width: 100px">Parution</th>
                <th class="sort" data-sort="description">Description</th>
                <th>Note</th>
                <th></th>
                <th><input class="search" placeholder="Rechercher"/></th>
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

    <div id="adminList" class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Photo</th>
                <th class="sort" data-sort="login">Login</th>
                <th class="sort" data-sort="email">Email</th>
                <th><input class="search" placeholder="Rechercher"/></th>
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

    <div id="empruntList" class="row">
        <table class="table">
            <thead>
            <tr>

                <th class="sort" data-sort="titre">Titre</th>
                <th class="sort" data-sort="nom">Nom</th>
                <th class="sort" data-sort="prenom">Prénom</th>
                <th class="sort" data-sort="promo">Promotion</th>
                <th class="sort" data-sort="date_debut">Date d'emprunt</th>
                <th class="sort" data-sort="delai">Date de retour</th>
                <th></th>
                <th><input class="search" placeholder="Rechercher"/></th>
            </tr>
            </thead>
            <tbody class="list">

            <?php foreach ( $emprunts as $emprunt): ?>
                <tr>
                    <td class="titre align-middle"><?= $emprunt['titre'] ?></td>
                    <td class="nom align-middle"><?= $emprunt['nom'] ?></td>
                    <td class="prenom align-middle"><?= $emprunt['prenom'] ?></td>
                    <td class="promo align-middle"><?= $emprunt['promo'] ?></td>
                    <td class="date_debut align-middle"><?= $emprunt['date_debut'] ?></td>
                    <td class="delai align-middle"><?= $emprunt['delai'] ?></td>

                    <td class="align-middle">
                        <div class="button_admin">
                            <button class="btn btn-green btn-md btn-admin">Retour</button>
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


</div>
