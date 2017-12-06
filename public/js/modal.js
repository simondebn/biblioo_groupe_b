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
                console.log('error : open dvd');
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
$('body').on('click','#addAdminButton', function () {

    $.ajax({
        url: 'app/view/modalAdministrateur.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            console.log('error : open dvd');
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
        url: "ajout-admin",
        type: 'POST',
        data:
            {
                myFunction: 'addAdmin',
                myParams: {
                    params: params
                }
            },
        success: function (data) {
            //console.log(data);
            msg = JSON.parse(data);
            //console.log(msg)
            if (msg.type == 'success') {
                $('.modal.form').modal('hide');
                bootstrapNotify(msg.msg, msg.type);
            }
        }
    })
});





/***
 * MODIFY ADMIN
 */


/***
 * DELETE ADMIN
 */


/**
 * ADD BOOK
 */
$('body').on('click','#addBookButton', function () {

    $.ajax({
        url: 'app/view/modalAddBook.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            console.log('error : open dvd');
        });
    $('.modal.form').modal('show');
    
});

/**
 * ADD REVUE
 */

$('body').on('click','#addRevueButton', function () {


    $.ajax({
        url: 'app/view/modalAddBook.php'
    })
        .done(function (html) {
            $('.modal.form .modal-dialog').html(html);
        })
        .fail(function () {
            console.log('error : open dvd');
        });

    $('.modal.form').modal('show');
});

