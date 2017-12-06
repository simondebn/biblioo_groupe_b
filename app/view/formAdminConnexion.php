<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 06/12/2017
 * Time: 09:31
 */
?>
<div class="container">
    <form id="formAdminConnexion">
        <div class="modal-body" style="padding:0 20%; padding-top:20px">
            <div class="md-form">
                <input type="text" id="login" name="login" class="form-control" required><label for="login" class="">Login</label>
            </div>
            <div class="md-form">
                <input type="password" id="password" name="password" class="form-control" required><label for="password"
                                                                                                          class="">Mot
                    de
                    Passe</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="submitAdminConnexion" class="btn btn-success"
                       value="Connexion">
            </div>
        </div>
    </form>
</div>
