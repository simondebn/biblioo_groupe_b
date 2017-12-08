<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="public/img/logo_cefim.png" alt="Logo Cefim" class="col-xs-1 brand">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link liens_externe" href="/">CAMPUS</a></li>
            <li class="nav-item"><a class="nav-link liens_externe" href="/">PROGRAMMES</a></li>
            <li class="nav-item"><a class="nav-link liens_externe" href="/">ETUDIANTS</a></li>
            <li class="nav-item"><a class="nav-link liens_externe" href="/">PROFESSIONNELS</a>
            <li class="nav-item"><a class="nav-link liens_externe" style="color :orange" href="/">BIBLIOO</a>
            </li>
    </div>
</nav>
<div class="page-header">
    <h1 class="animated fadeInRight">Biblioo : la bibliothèque du futur</h1>
</div>


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
                <h2 class="h2-responsive">Les 5 livres les mieux notés</h2>
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
