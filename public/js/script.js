let userBookList;
let userRevueList;
let empruntList;
let adminList;
let adminBookList;
let adminRevueList;


let currentList;
let itemPerPage;

/*** Message par page ***/

if ((localStorage.getItem("itemPerPage")) === null) {
    itemPerPage = 10;
} else {
    itemPerPage = localStorage.getItem("itemPerPage");
}

$('.dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    itemPerPage = $(this).text();
    if (itemPerPage === "Tout") {
        itemPerPage = (currentList.items).length;
    }
    localStorage.setItem("itemPerPage", itemPerPage);
    currentList.show(1, itemPerPage);
});

/*** Options List.js ***/

let booksOptions = {
    valueNames: ['titre', 'auteur', 'domaine', 'date'],
    page: 10,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

let revuesOptions = {
    valueNames: ['titre', 'auteur', 'domaine', 'description', 'date'],
    page: 10,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

let adminsOptions = {
    valueNames: ['login', 'email'],
    page: 10,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};

let empruntsOptions = {
    valueNames: ['titre', 'nom', 'prenom', 'promo', 'date_debut', 'delai'],
    page: 10,
    pagination: [{
        innerWindow: 1,
        outerWindow: 1,
    }],
};



/**
 * LISTES USER
 **/

/*** Liste des livres ***/
if ($('#userBookList').length > 0) {

    userBookList = new List('userBookList', booksOptions);
    currentList = userBookList;
    if (userBookList !== null) {
        userBookList.sort('titre', {
            order: "desc"
        });
    }
}

/*** Liste des revues ***/
if ($('#userRevueList').length > 0) {

    userRevueList = new List('userRevueList', revuesOptions);

    if (userRevueList !== null) {
        userRevueList.sort('titre', {
            order: "desc"
        });
    }
}


/**
 * LISTES ADMIN
 **/

/*** Liste des livres ***/
if ($('#adminBookList').length > 0) {

    adminBookList = new List('adminBookList', booksOptions);

    if (adminBookList !== null) {
        adminBookList.sort('titre', {
            order: "desc"
        });
    }
}

/*** Liste des revues ***/
if ($('#adminRevueList').length > 0) {
    adminRevueList = new List('adminRevueList', revuesOptions);

    if (adminRevueList !== null) {
        adminRevueList.sort('titre', {
            order: "desc"
        });
    }
}

/*** Liste des admins ***/
if ($('#adminList').length > 0) {
    adminList = new List('adminList', adminsOptions);
    if (adminList !== null) {
        adminList.sort('titre', {
            order: "desc"
        });
    }
}

/*** Liste des Emprunts ***/
if ($('#empruntList').length > 0) {
    empruntList = new List('empruntList', empruntsOptions);
    currentList = empruntList;
    if (empruntList !== null) {
        empruntList.sort('titre', {
            order: "desc"
        });
    }
}

/**
 * Affichage Listes et Boutons
 */

/*** Départ ***/
$("#adminBookList").hide();
$("#adminRevueList").hide();
$("#adminList").hide();

$("#userRevueList").hide();


/*** Affichage de la liste en fonction du bouton cliqué ***/
$('.listButtonBar a').on('click', function () {

    $('.nav-item').removeClass("active");
    $(this).parent('li').addClass('active')


    let list =  $(this).attr('id');

    switch (list) {
        case 'loanButton':
            $("#adminBookList").hide();
            $("#adminRevueList").hide();
            $("#adminList").hide();
            $("#empruntList").show();
            currentList = empruntList;
            break;

        case 'adminBookButton':
            $("#adminBookList").show();
            $("#adminRevueList").hide();
            $("#adminList").hide();
            $("#empruntList").hide();
            currentList = adminBookList;
            break;

        case 'adminRevueButton':
            $("#adminBookList").hide();
            $("#adminRevueList").show();
            $("#adminList").hide();
            $("#empruntList").hide();
            currentList = adminRevueList;
            break;

        case 'adminButton':
            $("#adminBookList").hide();
            $("#adminRevueList").hide();
            $("#adminList").show();
            $("#empruntList").hide();
            currentList = adminList;
            break;

        case 'userBookButton':
            $("#userBookList").show();
            $("#userRevueList").hide();
            currentList = userBookList;
            break;

        case 'userRevueButton':
            $("#userBookList").hide();
            $("#userRevueList").show();
            currentList = userRevueList;
            break;
    }

});

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


