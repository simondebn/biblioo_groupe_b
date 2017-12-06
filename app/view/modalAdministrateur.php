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
        <h4 class="modal-title">Ajouter un Administrateur</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
    </div>
    <form id="formAdministrateur">
        <div class="modal-body" style="padding:0 20%; padding-top:20px">
            <input type="hidden" id="id_ressource" class="form-control" value="">
            <div class="file-field">
                <label>Photo</label>
                <div class="btn btn-primary btn-sm">
                    <span>Choose file</span>
                    <input type="file" accept="image/*" required>
                </div>
            </div>
            <div class="md-form">
                <input type="text" id="login" class="form-control" required><label for="form1" class="">Login</label>
            </div>
            <div class="md-form">
                <input type="password" id="password" class="form-control" required><label for="form1" class="">Mot de Passe</label>
            </div>
            <div class="md-form">
                <input type="email" id="email" class="form-control" required><label for="form1" class="">E-mail</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="submitAddAdmin" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
</div>

