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
    <form id="formAddAdmin">
        <div class="modal-body" style="padding:0 20%; padding-top:20px">
            <input type="hidden" id="id_admin" class="form-control" value="<?php if (isset($_GET['params']['id'])) echo $_GET['params']['id']; ?>">
            <div class="file-field">
                <label>Photo</label>
                <div class="btn btn-primary btn-sm">
                    <span>Choose file</span>
                    <input type="file" accept="image/*">
                </div>
            </div>
            <div class="md-form">
                <input required type="text" id="login" class="form-control"  value="<?php if (isset($_GET['params']['login'])) echo $_GET['params']['login']; ?>"><label for="form1" class="<?php if (isset($_GET['params']['login'])) echo 'active'; ?>">Login</label>
            </div>
            <div class="md-form">
                <input required type="password" id="password" class="form-control"><label for="form1" class="">Mot de Passe</label>
            </div>
            <div class="md-form">
                <input required type="email" id="email" class="form-control" value="<?php if (isset($_GET['params']['email'])) echo $_GET['params']['email']; ?>"><label for="form1" class="<?php if (isset($_GET['params']['email'])) echo 'active'; ?>">E-mail</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="<?php if (isset($_GET['params']['id'])) echo 'submitModifyAdmin';  else echo 'submitAddAdmin'; ?>" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
</div>

