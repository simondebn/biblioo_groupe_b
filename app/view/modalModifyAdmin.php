<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Modifier un Administrateur</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                class="sr-only">Close</span></button>
    </div>

    <form id="formModifyAdmin">
        <div class="modal-body" style="padding:0 20%; padding-top:20px">
            <input type="hidden" id="id" class="form-control" value="<?= $_POST['id'] ?>">
            <div class="file-field">
                <label>Photo</label>
<!--                <div class="btn btn-primary btn-sm">
                    <span>Choose file</span>
                    <input type="file" accept="image/*">
                </div>
-->            </div>
            <div class="md-form">
                <input required type="text" id="login" class="form-control" value="<?= $_POST['login'] ?>"><label for="form1" class="active">Login</label>
            </div>
            <div class="md-form">
                <input required type="password" id="password" class="form-control" ><label for="form1">Mot de passe</label>
            </div>
            <div class="md-form">
                <input required type="email" id="email" class="form-control" value="<?= $_POST['email'] ?>"><label for="form1" class="active">Email</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="submitModifyAdmin" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </form>
</div>
