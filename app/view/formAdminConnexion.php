<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 06/12/2017
 * Time: 09:31
 */
?>
<!--
-->
<div class="container">

    <div class="row" style="justify-content: center; margin: 10px;">
        <div>
            <button class="btn btn-elegant btn-lg" id="btnConnexion">Connexion</button>
        </div>
    </div>


    <div class="modal fade form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         style="display: block;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Connexion</h4>
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                </div>
                <form id="formAdminConnexion">
                    <div class="modal-body" style="padding:0 20%; padding-top:20px">
                        <div class="md-form">
                            <input type="text" id="login" name="login" class="form-control" required><label for="login" class="">Login</label>
                        </div>
                        <div class="md-form">
                            <input type="password" id="password" name="password" class="form-control" required><label for="password" class="">Mot de
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
        </div>
    </div>
</div>
<!--
-->
