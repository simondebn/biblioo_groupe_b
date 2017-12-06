$(function() {

    $('body').on('submit', '#formReserver, #formCommenter, #formAdminConnexion', function (e) {
        e.preventDefault();
    });

    $('body').on('click', '.note', function (e) {
        var ressourceID = $(this).data('id');
        $.ajax({
            url: "commentaire",
            type: 'POST',
            data: {
                myFunction: 'getRessourceCommentaire',
                myParams: {
                    id: ressourceID
                }
            },
            success: function (data) {
                var comments = JSON.parse(data);
                console.log(comments);
                $.ajax({
                    url: "app/view/modalComments.php",
                    data: {
                        id: ressourceID,
                        comments: comments
                    }
                })
                    .done(function (html) {
                        $('.modal.form .modal-dialog').html(html);
                        $('#id_ressource').attr('value', ressourceID);
                    })
                    .fail(function () {
                        console.log('error');
                    });


                $('.modal.form').modal('show');
            }
        });


    });

    $('body').on('click', '#showFormCommenter', function(e) {
        $('#formCommenter').toggleClass('hidden');
    });

    $('body').on('click', '#submitCommenter', function (e) {
        var params = {};
        $.each($('#formCommenter').serializeArray(), function (index, value) {
            params[value.name] = value.value;
        });
        $.ajax({
            url: "commentaire",
            type: 'POST',
            data:
                {
                    myFunction: 'addCommentaire',
                    myParams: {
                        params: params
                    }
                },
            success: function (data) {
                var msg = JSON.parse(data);
                if (msg.type == 'success') {
                    $('.modal.form').modal('hide');
                    bootstrapNotify(msg.msg, msg.type);
                    var htmlNote = '';
                    for (let i = 1; i <= msg.newAverage; i++) {
                        htmlNote += '<img src="public/img/svg/stars/full_jaune.svg"/>';
                    }
                    for (let j = msg.newAverage + 1; j <= 5; j++) {
                        htmlNote += '<img src="public/img/svg/stars/full_clair.svg"/>';
                    }
                    $('td.note[data-id='+ params['id_ressource'] +']').html(htmlNote);
                }
                else {

                }
            }
        });
    });

    $('body').on('click', '#btnConnexion', function (e) {
        $('.modal.form').modal('show');
    });
    
    $('body').on('click', '#submitAdminConnexion', function(e) {
        var params = {};
        $.each($('#formAdminConnexion').serializeArray(), function (index, value) {
            params[value.name] = value.value;
        });
        $.ajax({
            url: "connexion",
            type: 'POST',
            data:
                {
                    myFunction: 'checkConnexion',
                    myParams: {
                        params: params
                    }
                },
            success: function (data) {
                var msg = JSON.parse(data);
                console.log(msg);
                if (msg.type == 'success') {
                    window.location.href = 'admin';
                }
                else {
                    // bootstrapNotify(msg.msg, msg.type);
                }
            }
        });

    });
});