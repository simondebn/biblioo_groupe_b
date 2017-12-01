//List.js

    //Users List

        //Book List

var options = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'date' ]
};
var bookList = new List('books', options);


var options = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'description' ]
};
var revueList = new List('revues', options);

$("#revuesList").hide();

$('#bookButton').on('click', function() {
    $(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    $('#revuesButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $("#bookList").show();
    $("#revuesList").hide();
});

$('#revuesButton').on('click', function() {
    $(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    $('#bookButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $("#bookList").hide();
    $("#revuesList").show();
});

// Template pour les notifications (bootstrap-notify)
function bootstrapNotify(msg, type) {
    $.notify({
        message: msg
    }, {
        //settings
        type: type,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        placement: {
            from: 'top',
            align: 'right'
        }

    });
}
