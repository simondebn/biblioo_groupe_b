<div class="container">
    <div class="row">
        <div class="btn-group">
            <!-- btn-elegant = actif , btn-blue-gray = non-actif -->
            <button class="btn btn-elegant btn-lg">Livres</button>
            <button class="btn btn-blue-grey btn-lg">Revues</button>

        </div>
    </div>
    <div class="row">
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
                        <td>NOOOOTE</td>
                        <td><img class="lien_infos" src="img/svg/infos.svg" alt="" href="http://google.com"></td>
                        <td>
                            <button class="btn btn-primary btn-green btn-md">Réserver</button>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
