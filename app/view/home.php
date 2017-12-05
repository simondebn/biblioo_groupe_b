<div class="container">
    <div class="row" style="justify-content: center; margin: 10px;">
        <div>
            <a href="liste" class="btn btn-elegant btn-lg">Voir tous le catalogue</a>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="jumbotron">
                <h2 class="h2-responsive">Les 5 livres les plus empruntés</h2>
                <ul class="list-group">
                    <?php foreach ($booksRented as $book): ?>
                        <div class="row containerBlockVignette list-group-item">
                            <div class="media mb-1">
                                <img class="vignetteCouverture"
                                         src="data:image/jpeg;base64, <?= base64_encode($book['couverture']) ?>" alt=""
                                         style="display: block; margin: auto">

                                <div class="media-body" style="margin: auto;">
                                    <p>
                                        <?= $book['titre'] ?>
                                    </p>
                                    <p style="font-style: italic; font-size: 0.90em">
                                        <?= $book['auteur'] ?>
                                    </p></div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="col-6">
            <div class="jumbotron">
                <h2 class="h2-responsive">Les 5 livres les plus empruntés</h2>
                <ul class="list-group">
                    <?php foreach ($booksNoted as $book): ?>
                        <div class="row containerBlockVignette list-group-item">
                            <div class="media mb-1">
                                <img class="vignetteCouverture"
                                     src="data:image/jpeg;base64, <?= base64_encode($book['couverture']) ?>" alt=""
                                     style="display: block; margin: auto">

                                <div class="media-body" style="margin: auto;">
                                    <p>
                                        <?= $book['titre'] ?>
                                    </p>
                                    <p style="font-style: italic; font-size: 0.90em">
                                        <?= $book['auteur'] ?>
                                    </p></div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>


    </div>

</div>
