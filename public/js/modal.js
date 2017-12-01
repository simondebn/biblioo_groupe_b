$(function() {

    // ouvrir
    $('table tbody').on('click', 'tr', function() {

        var ticketID = $(this).data("id");


        console.log('open dvd');
        // affiche modale

        $.ajax({
            url: "app/view/formReserver.php",
            data: {
                id: ticketID
            }
        })
            .done(function(html) {
                $('.modal.dvd .modal-dialog').html(html);
            })
            .fail(function() {
                console.log('error : open dvd');
            });


        $('.modal.dvd').modal('show');
    });

});