<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 05/12/2017
 * Time: 12:10
 */
?>
<div class="modal-content">
    <div class="modal-header" style="align-items: center">
        <h4 class="modal-title col-5">Avis & Commentaires</h4>
        <button type="button" id="showFormCommenter" class="btn btn-success waves-effect waves-light col-5">Ajouter un
            Commentaire
        </button>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
    </div>
    <form id="formCommenter" class="hidden">
        <div class="modal-body" style="padding:0 20%; padding-top:20px">
            <div class="row">

                <div class="md-form col-8">
                    <input type="hidden" id="id_ressource" name="id_ressource" class="form-control" value="">
                    <input type="text" id="nom" name="nom" class="form-control"><label for="nom" class="">Nom</label>
                </div>
                <div class="col-4">

                    <fieldset class="starability-grow">
                        <input type="radio" id="rate1" name="note" value="1"/>
                        <label for="rate1" title="Terrible">1 stars</label>
                        <input type="radio" id="rate2" name="note" value="2"/>
                        <label for="rate2" title="Not good">2 stars</label>
                        <input type="radio" id="rate3" name="note" value="3"/>
                        <label for="rate3" title="Average">3 stars</label>
                        <input type="radio" id="rate4" name="note" value="4"/>
                        <label for="rate4" title="Very good">4 stars</label>
                        <input type="radio" id="rate5" name="note" value="5" checked/>
                        <label for="rate5" title="Amazing">5 star</label>
                    </fieldset>
                </div>

            </div>
            <div class="md-form">
                <textarea type="text" id="avis" name="avis" class="md-textarea"></textarea>
                <label for="avis">Commentaire</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="submitCommenter" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
    <?php if (!isset($_GET['comments'])): ?>
        <p>Il n'y a aucun commentaire !</p>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Note</th>
                <th>Avis</th>
            </tr>
            </thead>
            <tbody class="list">
            <?php foreach ($_GET['comments'] as $comment): ?>
                <tr>
                    <td class="align-middle"><?= $comment['nom'] ?></td>
                    <td class="note align-middle" title="voir les notes / noter le livre">
                        <?php
                        for ($i = 1; $i <= $comment['note']; $i++) {
                            echo '<img src="public/img/svg/stars/full_jaune.svg"/>';
                        }
                        for ($j = $comment['note'] + 1; $j <= 5; $j++) {
                            echo '<img src="public/img/svg/stars/full_clair.svg"/>';
                        }
                        ?>
                    </td>
                    <td><?= preg_replace('#\n#','<br>',$comment['avis']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

