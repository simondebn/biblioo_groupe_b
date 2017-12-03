


let userBookList;
let userRevuesList;

    /*** Liste des livres ***/


let booksOptions = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'date' ],
    page: 3,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

userBookList = new List('userBookList', booksOptions);


if (userBookList !== null) {
    userBookList.sort('titre', {
        order: "desc"
    });
}
    /*** Liste des revues ***/

let revuesOptions = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'description', 'date' ],
    page: 3,
    pagination: [{
        outerWindow: 1
    }],
};
userRevuesList = new List('userRevuesList', revuesOptions);
if (userRevuesList !== null) {
    userRevuesList.sort('titre', {
        order: "desc"
    });
}

$("#userRevuesList").hide();

$('#bookButton').on('click', function() {
    $(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    $('#revuesButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $("#userBookList").show();
    $("#userRevuesList").hide();
});

$('#revuesButton').on('click', function() {
    $(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    $('#bookButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $("#userBookList").hide();
    $("#userRevuesList").show();
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

function modifyPaginationClasses() {
    $('.pagination li').addClass('page-item');
    $('.pagination a').addClass('page-link');
    $('.page-item:not(.active) a').css('color','black')
}

$(document).ready(function () {
    modifyPaginationClasses()
});

$('nav').on('click', function () {
    modifyPaginationClasses()
});

$('input').on ('change paste keyup', function () {
    modifyPaginationClasses()
});

$('th').on('click', function () {
    modifyPaginationClasses()
});