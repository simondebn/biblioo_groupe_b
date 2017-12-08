/*** ADMIN ***/

/**** Ajouter Administrateur ***/

$('body').on('click', '#addAdminButton', function () {
    $.ajax({
        url: 'app/view/modalAddAdministrateur.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
});

$('body').on('submit', '#formAddAdmin',function (e) {
    console.log('rttyyy');
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
            } else {
                bootstrapNotify(msg.msg, msg.type);
            }
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });
});


/**** Modifier Administrateur*/
let oldlogin;
$('body').on('click', '#modifyAdminButton', function () {

    oldlogin = $(this).parents('tr').find('.login').text()


    $.ajax({
        url: 'app/view/modalModifyAdmin.php',
        type: 'POST',
        data: {
            id: $(this).data("id"),
            login: oldlogin,
            email: $(this).parents('tr').find('.email').text(),
        }
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');
})

$('body').on('submit', '#formModifyAdmin', function (e) {
    e.preventDefault();
    let params = {
        'id': $('#id')[0].value,
        'login': $('#login')[0].value,
        'email': $('#email')[0].value,
        'password': $('#password')[0].value,

    };

    $.ajax({
        url: "manage-admin",
        type: 'POST',
        data:
            {
                myFunction: 'modifyAdmin',
                myParams: {
                    params: params
                }
            }
    })
        .done(function (data) {
            msg = JSON.parse(data);
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
                adminList.remove('login', oldlogin)
                adminList.add({
                    login: params['login'],
                    email: params['email'],
                });
                adminList.sort('login', {
                    order: "asc"
                });
                modifyPaginationClasses()
            } else {
                bootstrapNotify(msg.msg, msg.type);
            }
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });
})


/*** Supprimer Administrateur ***/

$('body').on('click', '#deleteAdminButton', function () {

    if (confirm("Voulez vous vraiment supprimer l'administrateur !")) {

        var adminID = $(this).data("id");
        var lineAdmin = $(this).parents('tr');
        deleteAdmin(adminID, lineAdmin);
    }
});

function deleteAdmin(adminID, lineAdmin) {
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

/*** RESSOURCES ***/

/*** Ajouter Livre ***/

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
})

$('body').on('submit', '#formAddBook', function (e) {
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
        .done(function (data) {
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
            }
        })
});


/*** Modifier Livre ***/
let oldTitreBook = '';

$('body').on('click', '#modifyBookButton', function () {
    oldTitreBook = $(this).parents('tr').find('.titre').text();
    $.ajax({
        url: 'app/view/modalAddBook.php',
        type: 'POST',
        data: {
            id: $(this).data("id"),
            titre: $(this).parents('tr').find('.titre').text(),
            auteur: $(this).parents('tr').find('.auteur').text(),
            date: $(this).parents('tr').find('.date').text(),
            domaine: $(this).parents('tr').find('.domaine').text(),
            lien: $(this).parents('tr').find('#link')[0]['href'],
        }
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');

});

$('body').on('submit', '#formModifyBook', function (e) {
    e.preventDefault();
    let params = {
        'id': $('#id_book')[0].value,
        'titre': $('#titre')[0].value,
        'auteur': $('#auteur')[0].value,
        'date': $('#date')[0].value,
        'domaine': $('#domaine')[0].value,
        'link': $('#lien')[0].value,
        'id_type': 1,
        'couverture': 'NULL',
        'description': 'NULL'

    };
    console.log(params);

    $.ajax({
        url: "manage-admin",
        type: 'POST',
        data:
            {
                myFunction: 'modifyRessource',
                myParams: {
                    params: params
                }
            }
    })
        .done(function (data) {
            msg = JSON.parse(data);
            console.log(msg);
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
                adminBookList.remove('titre', oldTitreBook);
                adminBookList.add({
                    titre: params['titre'],
                    auteur: params['auteur'],
                    date: params['date'],
                    domaine: params['domaine'],
                });
                adminBookList.sort('titre', {
                    order: "asc"
                });
                // attention petit bug lors de la mise à jour de la liste : pour les champs couverture, note et lien (non gérés pas list.js)
                modifyPaginationClasses()
            } else {
                bootstrapNotify(msg.msg, msg.type);
            }
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });
});


/*** Ajouter Revue ***/

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
});

$('body').on('submit','#formAddRevue', function (e) {
    e.preventDefault();
    let params = {

        /*'imageRevue': $('#imageRevue')[0].value,*/
        'titre': $('#titre ')[0].value,
        'date': $('#date')[0].value,
        'domaine': $('#domaine')[0].value,
        'description': $('#description')[0].value,
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
        .done(function (data) {
            console.log(data);
            msg = JSON.parse(data);
            console.log(msg)
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
                adminRevueList.add({
                    titre: params['titre'],
                    date: params['date'],
                    domaine: params['domaine'],
                    description: params['description'],
                });
                adminRevueList.sort('titre', {
                    order: "asc"
                });
                modifyPaginationClasses()
            } else {
                bootstrapNotify(msg.msg, msg.type);
            }
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        })
});


/*** Modifier Revue ***/
let oldTitreRevue = '';
$('body').on('click', '#modifyRevueButton', function () {
    oldTitreRevue = $(this).parents('tr').find('.titre').text();
    console.log($(this).parents('tr').find('#link')[0]['href']);
    $.ajax({
        url: 'app/view/modalAddRevue.php',
        type: 'POST',
        data: {
            id: $(this).data("id"),
            titre: $(this).parents('tr').find('.titre').text(),
            date: $(this).parents('tr').find('.date').text(),
            description: $(this).parents('tr').find('.description').text(),
            lien: $(this).parents('tr').find('#link')[0]['href'],
        }
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });

    $('.modal.form').modal('show');

});

$('body').on('submit', '#formModifyRevue', function (e) {
    e.preventDefault();
    let params = {
        'id': $('#id_revue')[0].value,
        'titre': $('#titre')[0].value,
        'auteur': 'NULL',
        'date': $('#date')[0].value,
        'domaine': 'NULL',
        'link': $('#lien')[0].value,
        'id_type': 2,
        'couverture': 'NULL',
        'description': $('#description')[0].value

    };
    console.log(params);

    $.ajax({
        url: "manage-admin",
        type: 'POST',
        data:
            {
                myFunction: 'modifyRessource',
                myParams: {
                    params: params
                }
            }
    })
        .done(function (data) {
            msg = JSON.parse(data);
            console.log(msg);
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
                adminRevueList.remove('titre', oldTitreRevue);
                adminRevueList.add({
                    titre: params['titre'],
                    date: params['date'],
                    description: params['description'],
                });
                adminRevueList.sort('titre', {
                    order: "asc"
                });
                // attention petit bug lors de la mise à jour de la liste : pour les champs couverture, note et lien (non gérés pas list.js)
                modifyPaginationClasses()
            } else {
                bootstrapNotify(msg.msg, msg.type);
            }
        })
        .fail(function () {
            bootstrapNotify("Une erreur s'est produite", 'danger')
        });
});



/*** Réserver Ressource ***/

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

});

/***  Supprimer Ressources ***/

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