


let usersBookList;
let usersRevuesList;

    /*** Liste des livres ***/


let booksOptions = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'date' ],
    page: 1,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

usersBookList = new List('usersBookList', booksOptions);


if (usersBookList !== null) {
    usersBookList.sort('titre', {
        order: "desc"
    });
}
    /*** Liste des revues ***/

let revuesOptions = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'description' ],
    page: 5,
    pagination: [{
        outerWindow: 1
    }],
};
usersRevuesList = new List('usersRevuesList', revuesOptions);
if (usersRevuesList !== null) {
    usersRevuesList.sort('titre', {
        order: "desc"
    });
}

$("#usersRevuesList").hide();

$('#bookButton').on('click', function() {
    $(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    $('#revuesButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $("#usersBookList").show();
    $("#usersRevuesList").hide();
});

$('#revuesButton').on('click', function() {
    $(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    $('#bookButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $("#usersBookList").hide();
    $("#usersRevuesList").show();
});


/**
 *Template pour les notifications (bootstrap-notify)
 */

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

/**
 * Ajoute les classes de MDBootstrap aux éléments de la pagination générée par List.js
 */

$(document).ready(function () {
    $('.pagination li').addClass('page-item');
    $('.pagination a').addClass('page-link');
    $('.page-item:not(.active) a').css('color','black')

});

$('nav').on('click', function () {
    $('.pagination li').addClass('page-item');
    $('.pagination a').addClass('page-link');
    $('.page-item:not(.active) a').css('color','black')
});