<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 01/12/2017
 * Time: 00:21
 */
?>
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Ajouter une revue</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
    </div>
    <form id="formAddRevue">
    <div class="modal-body" style="padding:0 20%">
        <input type="hidden" id="id_ressource" class="form-control" value="">
        <div class="file-field">
            <label for="form1" class="">Image Livre:</label>
            <div class="btn btn-primary btn-sm">
                <span>Choisir image</span>
                <input type="file" id="imagelivre" class="file-field" required="">
            </div>
            <div class="md-form">
                <input type="text" id="titre" class="form-control"><label for="form1" class="">Titre</label>
            </div>
            <div class="md-form">
                <input type="text" id="auteur" class="form-control"><label for="form1" class="">Auteur</label>
            </div>
            <div class="md-form">
                <input type="date" id="date" class="form-control datepicker">
            </div>
            <div class="md-form">
                <input type="text" id="domaine" class="form-control"><label for="form1" class="">Thème</label>
            </div>
            <div class="form-group basic-textarea">
                <label for="exampleFormControlTextarea2">Description</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="md-form">
                <input type="text" id="lien" class=form-control" required><label for="form1">Lien vers l'éditeur</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="submitAddRevue" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </div>
    </form>
</div>