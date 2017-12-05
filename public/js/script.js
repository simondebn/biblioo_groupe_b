/**
 * List.js Options
 */

let booksOptions = {
    valueNames: ['titre', 'auteur', 'domaine', 'date'],
    page: 3,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

let revuesOptions = {
    valueNames: ['titre', 'auteur', 'domaine', 'description', 'date'],
    page: 3,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

let adminsOptions = {
    valueNames: ['login', 'email'],
    page: 3,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

let empruntsOptions = {
    valueNames: ['titre', 'nom', 'prenom', 'promo', 'date_debut', 'delai'],
    page: 3,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};


/**
 * USER
 **/


/*** Liste des livres ***/
if ($('#userBookList').length > 0) {

    let userBookList = new List('userBookList', booksOptions);

    if (userBookList !== null) {
        userBookList.sort('titre', {
            order: "desc"
        });
    }
}
/*** Liste des revues ***/
if ($('#userRevuesList').length > 0) {

    let userRevuesList = new List('userRevuesList', revuesOptions);

    if (userRevuesList !== null) {
        userRevuesList.sort('titre', {
            order: "desc"
        });
    }
}


$("#userRevuesList").hide();

$('#bookButton').on('click', function () {
    //$(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    //$('#revuesButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $('#bookNavBar').addClass("active");
    $('#revuesNavBar').removeClass("active");

    $("#userBookList").show();
    $("#userRevuesList").hide();
});

$('#revuesButton').on('click', function () {
    //$(this).removeClass("btn btn-blue-grey btn-lg").addClass("btn btn-elegant btn-lg");
    //$('#bookButton').removeClass("btn btn-elegant btn-lg").addClass("btn btn-blue-grey btn-lg");
    $('#revuesNavBar').addClass("active");
    $('#bookNavBar').removeClass("active");

    $("#userBookList").hide();
    $("#userRevuesList").show();
});

$('.listButtonBar button').on('click', function () {
    $('.listButtonBar button:not(.btn-primary)').removeClass("btn btn-elegant").addClass("btn btn-blue-grey");
    $(this).removeClass("btn btn-blue-grey").addClass("btn btn-elegant");
})

/**
 * ADMIN
 **/

/*** Liste des livres ***/

if ($('#adminBookList').length > 0) {

    let adminBookList = new List('adminBookList', booksOptions);

    if (adminBookList !== null) {
        adminBookList.sort('titre', {
            order: "desc"
        });
    }
}

/*** Liste des revues ***/

if ($('#adminRevuesList').length > 0) {
    let adminRevuesList = new List('adminRevuesList', revuesOptions);

    if (adminRevuesList !== null) {
        adminRevuesList.sort('titre', {
            order: "desc"
        });
    }
}

/*** Liste des admins ***/

if ($('#adminList').length > 0) {
    let adminList = new List('adminList', adminsOptions);

    if (adminList !== null) {
        adminList.sort('titre', {
            order: "desc"
        });
    }
}


/*** Liste des Emprunts ***/
if ($('#empruntList').length > 0) {

    let empruntList = new List('empruntList', empruntsOptions);

    if (empruntList !== null) {
        empruntList.sort('titre', {
            order: "desc"
        });
    }
}

$("#adminBookList").hide();
$("#adminRevuesList").hide();
$("#adminList").hide();


$('.listButtonBar button').on('click', function () {

    let list =  $(this).attr('id');
    console.log($(this).attr('id'));

    switch (list) {
        case 'loanButton':
            $("#adminBookList").hide();
            $("#adminRevuesList").hide();
            $("#adminList").hide();
            $("#empruntList").show();
            break;

        case 'bookButton':
            $("#adminBookList").show();
            $("#adminRevuesList").hide();
            $("#adminList").hide();
            $("#empruntList").hide();
            break;

        case 'revueButton':
            $("#adminBookList").hide();
            $("#adminRevuesList").show();
            $("#adminList").hide();
            $("#empruntList").hide();
            break;

        case 'adminButton':
            $("#adminBookList").hide();
            $("#adminRevuesList").hide();
            $("#adminList").show();
            $("#empruntList").hide();
            break;

    }
})

/**
 * Ajoute les classes de MDBootstrap aux éléments de la pagination générée par List.js
 */

function modifyPaginationClasses() {
    $('.pagination li').addClass('page-item');
    $('.pagination a').addClass('page-link');
    $('.page-item:not(.active) a').css('color', 'black')
}

$(document).ready(function () {
    modifyPaginationClasses()
});

$('nav').on('click', function () {
    modifyPaginationClasses()
});

$('input').on('change paste keyup', function () {
    modifyPaginationClasses()
});

$('th').on('click', function () {
    modifyPaginationClasses()
});


/**
 * Template pour les notifications (bootstrap-notify)
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