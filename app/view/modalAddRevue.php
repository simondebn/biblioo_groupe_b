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
        <h4 class="modal-title"><?php if (isset($_POST['id'])) echo 'Modifier une revue'; else echo 'Ajouter une revue'; ?></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
    </div>
    <form id="<?php if (isset($_POST['id'])) echo 'formModifyRevue'; else echo 'formAddRevue'; ?>">
    <div class="modal-body" style="padding:0 20%">
        <input type="hidden" id="id_revue" class="form-control" value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>">
        <div class="file-field">
            <!--<label for="form1" class="">Image Livre:</label>
            <div class="btn btn-primary btn-sm">
                <span>Choisir image</span>
                <input type="file" id="imagelivre" class="file-field" required="">
            </div>-->
            </div>
            <div class="md-form">
                <input type="text" id="titre" class="form-control" required value="<?php if (isset($_POST['titre'])) echo $_POST['titre']; ?>"><label for="form1" class="<?php if (isset($_POST['titre'])) echo 'active'; ?>">Titre</label>
            </div>
            <div class="md-form">
                <input type="date" id="date" class="form-control datepicker" required value="<?php if (isset($_POST['date'])) echo $_POST['date']; ?>"><label for="form1" class="active">Date</label>
            </div>
            <div class="form-group basic-textarea">
                <label for="exampleFormControlTextarea2">Description</label>
                <textarea class="form-control" id="description" rows="3" required><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
            </div>
            <div class="md-form">
                <input type="text" id="lien" class=form-control" required value="<?php if (isset($_POST['lien'])) echo $_POST['lien']; ?>"><label for="form1" class="<?php if (isset($_POST['titre'])) echo 'active'; ?>">Lien vers l'éditeur</label>
            </div>
        </div>
        <div class="modal-footer">
            <div class="col-md-12 text-center">
                <input type="submit" name="envoyer" id="<?php if (isset($_POST['id'])) echo 'submitModifyRevue'; else echo 'submitAddRevue'; ?>" class="btn btn-success" value="Envoyer">
            </div>
        </div>
    </div>
    </form>
</div>