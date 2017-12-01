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
        <h4 class="modal-title">Réserver un document</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
    </div>
    <form id="formReserver">
        <div class="modal-body" style="padding:0 20%; padding-top:20px">
            <input type="hidden" id="id_ressource" class="form-control" value="">
            <div class="md-form">
                <input type="text" id="nom" class="form-control"><label for="form1" class="">Nom</label>
            </div>
            <div class="md-form">
                <input type="text" id="prenom" class="form-control"><label for="form1" class="">Prénom</label>
            </div>
            <div class="md-form">
                <input type="text" id="promo" class="form-control"><label for="form1" class="">Promo</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="submitReserver" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
</div>

