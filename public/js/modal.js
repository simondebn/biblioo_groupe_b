$(function() {

    // ouvrir
    $('table tbody').on('click', '#reserver', function() {

        var ticketID = $(this).data("id");

        // affiche modale

        $.ajax({
            url: "app/view/formReserver.php",
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
                    bootstrapNotify(msg.msg, msg.type);

                    $btn = $('[data-id='+ params['id_ressource'] +']');
                    $btn.attr('id', 'unavailable');
                    $btn.html('Non Disponible');
                    $btn.removeClass('btn-green').addClass('btn-red');
                }
                else{
                    bootstrapNotify(msg.msg, msg.type);
                }
            }
        })

    });

    $('body').on('submit', '#formReserver', function(e) {
        e.preventDefault();
    });

});