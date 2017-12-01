<div class="container">
    <div class="row">

        <div>
            <!-- btn-elegant = actif , btn-blue-gray = non-actif -->
            <button id="bookButton" class="btn btn-elegant btn-lg">Livres</button>
            <button id= "revuesButton" class="btn btn-blue-grey btn-lg">Revues</button>
        </div>
        
    </div>

    <div id="bookList" class="row">
        <div>
            <table class="table" id="books">
                <thead class="mdb-color lighten-4">
                <tr>
                    <th></th>
                    <th class="sort" data-sort="titre">Titre</th>
                    <th class="sort" data-sort="auteur">Auteur</th>
                    <th class="sort" data-sort="date">Date de parution</th>
                    <th class="sort" data-sort="domaine">Thème</th>
                    <th>Note</th>
                    <th></th>
                    <th><input class="search" placeholder="Search"/></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($books as $book): ?>
                    <tr>
                        <td class="cover_book"><img
                                    src="data:image/jpeg;base64, <?= base64_encode($book['couverture']) ?>" alt=""></td>
                        <td class="titre"><?= $book['titre'] ?></td>
                        <td class="auteur"><?= $book['auteur'] ?></td>
                        <td class="date"><?= $book['date'] ?></td>
                        <td class="domaine"><?= $book['domaine'] ?></td>
                        <td class="note"><?= $book['note'] ?></td>
                        <td><a target="_blank" href="<?= $book['link'] ?>"><img class="lien_infos" src="public/img/svg/infos.svg"></a></td>
                        <td>
                            <button id="reserver" data-id="<?= $book['id'] ?>" class="btn btn-primary btn-green btn-md">Réserver</button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <div id="revuesList" class="row">
        <div>
            <table class="table" id="revues">
                <thead class="mdb-color lighten-4">
                <tr>
                    <th></th>
                    <th class="sort" data-sort="titre">Titre</th>
                    <th class="sort" data-sort="date">Date de parution</th>
                    <th class="sort" data-sort="domaine">Thème</th>
                    <th cclass="sort" data-sort="description">Description</th>
                    <th>Note</th>
                    <th></th>
                    <th><input class="search" placeholder="Search"/></th>
                </tr>
                </thead>
                <tbody class="list">

                <?php foreach ($revues as $revue): ?>
                    <tr>
                        <td class="cover_book"><img
                                    src="data:image/jpeg;base64, <?= base64_encode($revue['couverture']) ?>" alt=""></td>
                        <td class="titre"><?= $revue['titre'] ?></td>
                        <td class="auteur"><?= $revue['auteur'] ?></td>
                        <td class="date"><?= $revue['date'] ?></td>
                        <td class="description"><?= $revue['description'] ?></td>
                        <td class="note"><?= $revue['note'] ?></td>
                        <td><a target="_blank" href="<?= $revue['link'] ?>"><img class="lien_infos" src="public/img/svg/infos.svg"></a></td>
                        <td>
                            <button id="reserver" class="btn btn-primary btn-green btn-md">Réserver</button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        </div>
    </div>

</div>
