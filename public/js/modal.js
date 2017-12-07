$(function () {

    // ouvrir
    $('table tbody').on('click', '#reserver', function () {

        var ticketID = $(this).data("id");

        // affiche modale

        $.ajax({
            url: "app/view/formReserver.php",
            data: {
                id: ticketID
            }
        })
            .done(function (html) {
                $('.modal.form .modal-dialog').html(html);
                $('#id_ressource').attr('value', ticketID);
            })
            .fail(function () {
                bootstrapNotify("Une erreur s'est produite", 'danger')
            });


        $('.modal.form').modal('show');
    });

    $('body').on('click', '#submitReserver', function () {
        var params = {
            'id_ressource': $('#id_ressource')[0].value,
            'nom': $('#nom')[0].value,
            'prenom': $('#prenom')[0].value,
            'promo': $('#promo')[0].value
        };
        $.ajax({
            url: "emprunt",
            type: 'POST',
            data:
                {
                    myFunction: 'addEmprunt',
                    myParams: {
                        params: params
                    }
                },
            success: function (data) {
                msg = JSON.parse(data);
                if (msg.type == 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                    $('button[data-id=' + params['id_ressource'] + ']').attr('id', 'unavailable').removeClass('btn-green').addClass('btn-red').html('Non Disponible');
                }
                else {

                }
            }
        })
    });

    /** Ajouter les modales pour ajout/suppression/modification des ressources et admins en mode administrateur ainsi que le retour des emprunts
     * Controllers déjà créés (possiblement à revoir)
     */

});


/***
 * ADD ADMIN
 */
$('body').on('click', '#addAdminButton', function () {

    $.ajax({
        url: 'app/view/modalAdministrateur.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
});

$('body').on('click', '#submitAddAdmin', function (e) {
    e.preventDefault();
    let params = {

        'login': $('#login')[0].value,
        'email': $('#email')[0].value,
        'password': $('#password')[0].value,

    };

    $.ajax({
        url: "manage-admin",
        type: 'POST',
        data:
            {
                myFunction: 'addAdmin',
                myParams: {
                    params: params
                }
            }
    })
        .done(function (data) {
            console.log(data);
            msg = JSON.parse(data);
            console.log(msg)
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
                adminList.add({
                    login: params['login'],
                    email: params['email'],
                });
                adminList.sort('login', {
                    order: "asc"
                });
                modifyPaginationClasses()
                /*$('#adminList .list').append('<tr>\n' +
                    '                    <td></td>\n' +
                    '                    <td class="login align-middle">' + params['login'] + '</td>\n' +
                    '                    <td class="email align-middle">' + params['email'] + '</td>\n' +
                    '                    <td class="align-middle" style="width: 200px">\n' +
                    '                        <div class="button_admin">\n' +
                    '                            <button class="btn btn-orange btn-md btn-admin">Modifier</button>\n' +
                    '                            <button id="deleteAdminButton" data-id="<?= $admin[\'id\'] ?>" class="btn btn-red btn-md btn-admin">Supprimer</button>\n' +
                    '                        </div>\n' +
                    '                    </td>\n' +
                    '                </tr>')*/
            }else{
                bootstrapNotify(msg.msg, msg.type);
            }
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });
})


/***
 * MODIFY ADMIN
 */


/***
 * DELETE ADMIN
 */

$('body').on('click', '#deleteAdminButton', function () {

    if (confirm("Voulez vous vraiment supprimer l'administrateur !")) {

        var adminID = $(this).data("id");
        var lineAdmin = $(this).parents('tr');

        $.ajax({
            url: "manage-admin",
            type: 'POST',
            data:
                {
                    myFunction: 'deleteAdmin',
                    id: adminID
                },
            success: function (data) {
                console.log(data);
                msg = JSON.parse(data);
                console.log(msg);
                if (msg.type == 'success') {
                    lineAdmin.remove();
                    bootstrapNotify(msg.msg, msg.type);
                }

            }
        })
    }
});

/**
 * ADD BOOK
 */
$('body').on('click', '#addBookButton', function () {

    $.ajax({
        url: 'app/view/modalAddBook.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });
    $('.modal.form').modal('show');

    $('body').on('click', '#submitAddBook', function (e) {
        e.preventDefault();
        let params = {

            /*'imagelivre': $('#imagelivre')[0].value,*/
            'titre': $('#titre ')[0].value,
            'auteur': $('#auteur')[0].value,
            'date': $('#date')[0].value,
            'domaine': $('#domaine')[0].value,
            'link': $('#lien')[0].value,

        };
        console.log(params)
        $.ajax({
            url: "manage-admin",
            type: 'POST',
            data:
                {
                    myFunction: 'addBook',
                    myParams: {
                        params: params
                    }
                }
        })
            .done( function (data) {
                console.log(data);
                msg = JSON.parse(data);
                console.log(msg)
                if (msg.type == 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                    adminBookList.add({
                        titre: params['titre'],
                        auteur: params['auteur'],
                        date: params['date'],
                        domaine: params['domaine']
                    });
                    adminBookList.sort('titre', {
                        order: "asc"
                    });
                    modifyPaginationClasses()
                    /*$('#adminBookList .list').append('<tr>\n' +
                        '                    <td class="vignette"><img\n' +
                        '                                src="data:image/jpeg;base64, <?= base64_encode($book[\'couverture\']) ?>" alt=""></td>\n' +
                        '                    <td class="titre align-middle">' + params['titre'] + '</td>\n' +
                        '                    <td class="auteur align-middle">' + params['auteur'] + '</td>\n' +
                        '                    <td class="date align-middle">' + params['date'] + '</td>\n' +
                        '                    <td class="domaine align-middle">'+ params['domaine'] + '</td>\n' +
                        '                    <td class="note align-middle">0</td>\n' +
                        '                    <td class="align-middle"><a target="_blank" href= " '+ params['link']+' "><img class="lien_infos"\n' +
                        '                                                                                                 src="public/img/svg/infos.svg"></a>\n' +
                        '                    </td>\n' +
                        '                    <td class="align-middle">\n' +
                        '                        <div class="button_admin">\n' +
                        '                            <button class="btn btn-orange btn-md btn-admin">Modifier</button>\n' +
                        '                            <button id="deleteBookButton" data-id="<?= $book[\'id\'] ?>"  class="btn btn-red btn-md btn-admin">Supprimer</button>\n' +
                        '                        </div>\n' +
                        '                    </td>\n' +
                        '                </tr>');*/
                }
            })
    });
});

/**
 * ADD REVUE
 */

$('body').on('click', '#addRevueButton', function () {


    $.ajax({
        url: 'app/view/modalAddRevue.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');

    $('body').on('click', '#submitAddRevue', function (e) {
        e.preventDefault();
        let params = {

            /*'imageRevue': $('#imageRevue')[0].value,*/
            'titre': $('#titre ')[0].value,
            'date': $('#date')[0].value,
            'domaine': $('#domaine')[0].value,
            'description' : $('#description')[0].value,
            'link': $('#lien')[0].value,

        };
        console.log(params)
        $.ajax({
            url: "manage-admin",
            type: 'POST',
            data:
                {
                    myFunction: 'addRevue',
                    myParams: {
                        params: params
                    }
                }
        })
            .done( function (data) {
                console.log(data);
                msg = JSON.parse(data);
                console.log(msg)
                if (msg.type == 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                    adminBookList.add({
                        titre: params['titre'],
                        date: params['date'],
                        domaine: params['domaine'],
                        description: params['description'],
                    });
                    adminRevueList.sort('titre', {
                        order: "asc"
                    });
                    modifyPaginationClasses()
                }else{
                    bootstrapNotify(msg.msg, msg.type);
                }
            })
            .fail(function () {
                bootstrapNotify("Une erreur s'est produite", 'danger')
            })
    });
});



/**
 *  DELETE RESSOURCE
 */

$('body').on('click', '#deleteBookButton', function () {

    deleteRessource($(this));
});
$('body').on('click', '#deleteRevueButton', function () {

    deleteRessource($(this));
});

function deleteRessource($this) {

    if (confirm("Voulez vous vraiment supprimer la ressource !")) {

        var ressourceID = $this.data("id");
        var lineRessource = $this.parents('tr');

        $.ajax({
            url: "manage-admin",
            type: 'POST',
            data:
                {
                    myFunction: 'deleteRessource',
                    id: ressourceID
                },
            success: function (data) {
                msg = JSON.parse(data);
                if (msg.type == 'success') {
                    lineRessource.remove();
                    bootstrapNotify(msg.msg, msg.type);
                }
                else {

                }
            }
        })
    }
}