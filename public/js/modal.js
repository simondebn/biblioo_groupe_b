$(function() {

    // ouvrir
    $('table tbody').on('click', '#reserver', function() {

        var ticketID = $(this).data("id");

        // affiche modale

        $.ajax({
            url: "app/view/formAjoutLivre.php",
            data: {
                id: ticketID
            }
        })
            .done(function(html) {
                $('.modal.form .modal-dialog').html(html);
                $('#id_ressource').attr('value', ticketID);
            })
            .fail(function() {
                console.log('error : open dvd');
            });


        $('.modal.form').modal('show');
    });

    /*$('.datepicker').pickadate({

        weekdaysShort: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
        showMonthsShort: true,
        today: '',
        clear: 'Clear selection',
        close: 'Cancel',
        editable: true,
        dateFormat: "dd/mm/yy",
        formatSubmit: 'yyyy/mm/dd'
        /*$.extend($.fn.pickadate.defaults, {
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        today: 'aujourd\'hui',
        clear: 'effacer',
        formatSubmit: 'yyyy/mm/dd'
        })*/
    /*});*/

    $('.datepicker').pickadate({

        weekdaysShort: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
        showMonthsShort: true,
        today: '',
        clear: 'Clear selection',
        close: 'Cancel',
        editable: true,
        dateFormat: "dd/mm/yy",
        formatSubmit: 'yyyy/mm/dd'
        /*$.extend($.fn.pickadate.defaults, {
        monthsFull: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        today: 'aujourd\'hui',
        clear: 'effacer',
        formatSubmit: 'yyyy/mm/dd'
        })*/
        });

        $('body').on('click', '#submitReserver', function(){
            var params = {
                'id_ressource': $('#id_ressource')[0].value,
                'nom': $('#nom')[0].value,
                'prenom': $('#prenom')[0].value,
                'promo': $('#promo')[0].value
            };
            $.ajax({
                url: "emprunt",
                type:'POST',
                data:
                    {
                        myFunction:'addEmprunt',
                        myParams: {
                            params : params
                        }
                    },
                success:function(data){
                    msg = JSON.parse(data);
                    if(msg.type == 'success'){
                        $('.modal.form').modal('hide');
                        console.log(msg.msg);
                        bootstrapNotify(msg.msg, msg.type);
                    }
                    else{

                    }
                }
            })
        });

        /** Ajouter les modales pour ajout/suppression/modification des ressources et admins en mode administrateur ainsi que le retour des emprunts
         * Controllers déjà créés (possiblement à revoir)
         */

});