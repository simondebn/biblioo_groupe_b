<div class="container">
    <div class="row listButtonBar">
            <!-- btn-elegant = actif , btn-blue-gray = non-actif -->
            <button class="btn btn-elegant  col-lg-2">Livres</button>
            <button class="btn btn-blue-grey  col-lg-2">Revues</button>
            <button class="btn btn-blue-grey  col-lg-3">Administrateurs</button>
            <button class="btn btn-blue-grey  col-lg-2">Prêts/Retour</button>
            <div class="col-lg-1 offset-lg-1">
            <button class="btn btn-primary"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
            </div>
    </div>
    <div id ="adminBookList" class="row">
        <div class="col-md-12">
            <table class="table" id="books">
                <thead class="mdb-color grey lighten-5 ">
                <tr>
                    <th><img class="add_res" src="public/css/img/svg/plus.svg" alt="ajouter"></th>
                    <th class="sort" data-sort="titre col-md-1">Titre</th>
                    <th class="sort" data-sort="auteur col-md-3">Auteur</th>
                    <th class="sort" data-sort="date col-md-3">Date de parution</th>
                    <th class="sort" data-sort="domaine col-md-3">Thème</th>
                    <th>Note</th>
                    <th></th>
                    <th><input class="search" placeholder="Search"/></th>
                </tr>
                </thead>
                <tbody class="list">
                    <?php foreach($books as $book): ?>

                    <tr>
                        <td class="cover_book"><img
                                    src="data:image/jpeg;base64, <?= base64_encode($book['couverture']) ?>" alt=""></td>
                        <td class="titre align-middle"><?= $book['titre'] ?></td>
                        <td class="auteur align-middle"><?= $book['auteur'] ?></td>
                        <td class="date align-middle"><?= $book['date'] ?></td>
                        <td class="domaine align-middle"><?= $book['domaine'] ?></td>
                        <td class="note align-middle"><?= $book['note'] ?></td>
                        <td class="align-middle"><a target="_blank" href="<?= $book['link'] ?>"><img class="lien_infos" src="public/img/svg/infos.svg"></a></td>
                        <td class="align-middle">
                            <div class="button_admin">
                                <button class="btn btn-orange btn-md btn-admin">Modifier</button><button class="btn btn-red btn-md btn-admin">Supprimer</button>
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





    <div id="adminRevuesList" class="row">
        <div class="col-md-12">
            <table class="table" id="revues">
                <thead class="mdb-color lighten-4">
                <tr>
                    <th></th>
                    <th class="sort" data-sort="titre">Titre</th>
                    <th class="sort" data-sort="date">Date de parution</th>
                    <th class="sort" data-sort="description">Description</th>
                    <th>Note</th>
                    <th></th>
                    <th><input class="search" placeholder="Search"/></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($revues as $revue): ?>
                    <tr>
                        <td class="cover_book "><img
                                    src="data:image/jpeg;base64, <?= base64_encode($revue['couverture']) ?>" alt=""></td>
                        <td class="titre align-middle"><?= $revue['titre'] ?></td>
                        <td class="date align-middle"><?= $revue['date'] ?></td>
                        <td class="description align-middle"><?= $revue['description'] ?></td>
                        <td class="note align-middle"><?= $revue['note'] ?></td>
                        <td class="align-middle"><a target="_blank" href="<?= $revue['link'] ?>"><img class="lien_infos" src="public/img/svg/infos.svg"></a></td>
                        <td class="align-middle">
                            <div class="button_admin">
                                <button class="btn btn-orange btn-md btn-admin">Modifier</button><button class="btn btn-red btn-md btn-admin">Supprimer</button>
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

</div>
