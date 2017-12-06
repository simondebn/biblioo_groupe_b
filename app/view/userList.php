<div class="container">

    <nav style="margin-top:20px;background-color: #ff7500" class="navbar navbar-expand-lg navbar-dark">

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse listButtonBar" id="navbarSupportedContent">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a id="userBookButton" class="buttonNavBar nav-link" href="#">Livres</a>
                </li>
                <li class="nav-item">
                    <a id="userRevueButton" class="buttonNavBar nav-link"href="#">Revues</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
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
        </div>
    </nav>

    <div id="userBookList" class="row" style="margin:0">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th class="sort" data-sort="titre">Titre</th>
                    <th class="sort" data-sort="auteur">Auteur</th>
                    <th class="sort" data-sort="date" style="min-width: 100px">Parution</th>
                    <th class="sort" data-sort="domaine">Thème</th>
                    <th>Note</th>
                    <th></th>
                    <th><input style="margin:0;height:5px;" class="form-control w-100 search" type="text" placeholder="Rechercher" aria-label="Search">
                    </th>
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
                            <td class="note align-middle" title="noter le livre" data-id="<?= $book['id'] ?>">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<img src="public/img/svg/stars/border_foncee.svg"/>';
                                }
                                ?>
                            </td>
                        <?php else: ?>
                        <td class="note align-middle" title="voir les notes / noter le livre"
                            data-id="<?= $book['id'] ?>">
                            <?php
                            for ($i = 1; $i <= $book['note']; $i++) {
                                echo '<img src="public/img/svg/stars/full_jaune.svg"/>';
                            }
                            for ($j = $book['note'] + 1; $j <= 5; $j++) {
                                echo '<img src="public/img/svg/stars/full_clair.svg"/>';
                            }
                            ?>
                    <?php endif; ?>
                    <td class="align-middle"><a target="_blank" href="<?= $book['link'] ?>"><img class="lien_infos"
                                                                                                 src="public/img/svg/infos.svg"></a>
                    </td>
                    <td style="min-width: 180px;" class="align-middle">
                        <?php if ($book['disponibility']): ?>
                            <button id="reserver" data-id="<?= $book['id'] ?>"
                                    class="btn btn-primary btn-green btn-md">Réserver
                            </button>
                        <?php else: ?>
                            <button id="unavailable" data-id="<?= $book['id'] ?>"
                                    class="btn btn-primary btn-red btn-md">Non Disponible
                            </button>
                        <?php endif; ?>
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

    <div id="userRevueList" class="row" style="margin:0">
        <table class="table">
            <thead>
            <tr>
                <th class="sort" data-sort="titre">Titre</th>
                <th class="sort" data-sort="date">Parution</th>
                <th class="sort" data-sort="description">Description</th>
                <th>Note</th>
                <th></th>
                <th></th>
                <th><input style="margin:0;height:5px;" class="form-control w-100 search" type="text" placeholder="Rechercher" aria-label="Search">
                </th>
            </tr>

            </thead>
            <tbody class="list">


                <?php foreach ($revues as $revue): ?>
                    <tr>
                        <td class="vignette"><img
                                    src="data:image/jpeg;base64, <?= base64_encode($revue['couverture']) ?>" alt=""></td>
                        <td class="titre align-middle"><?= $revue['titre'] ?></td>
                        <td class="date align-middle"><?= $revue['date'] ?></td>
                        <td class="description align-middle"><?= $revue['description'] ?></td>
                        <?php if ($book['note'] == 0): ?>
                            <td class="note align-middle" title="noter le livre" data-id="<?= $book['id'] ?>">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    echo '<img src="public/img/svg/stars/full_foncee.svg"/>';
                                }
                                ?>
                            </td>
                        <?php else: ?>
                        <td class="note align-middle" title="voir les notes / noter le livre"
                            data-id="<?= $book['id'] ?>">
                            <?php
                            for ($i = 1; $i <= $book['note']; $i++) {
                                echo '<img src="public/img/svg/stars/full_jaune.svg"/>';
                            }
                            for ($j = $book['note'] + 1; $j <= 5; $j++) {
                                echo '<img src="public/img/svg/stars/full_clair.svg"/>';
                            }
                            ?>
                    <?php endif; ?>
                    <td class="align-middle"><a target="_blank" href="<?= $revue['link'] ?>"><img class="lien_infos"
                                                                                                  src="public/img/svg/infos.svg"></a>
                    </td>
                    <td style="min-width: 180px;" class="align-middle">
                        <?php if ($revue['disponibility']): ?>
                            <button id="reserver" data-id="<?= $revue['id'] ?>"
                                    class="btn btn-primary btn-green btn-md">Réserver
                            </button>
                        <?php else: ?>
                            <button id="unavailable" data-id="<?= $revue['id'] ?>"
                                    class="btn btn-primary btn-red btn-md">Non Disponible
                            </button>
                        <?php endif; ?>
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

    <div class="modal fade form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        </div>
    </div>

</div>
