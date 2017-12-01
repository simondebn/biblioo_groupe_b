//List.js

    //Users List

        //Book List
let bookList;
let revueList;

let booksOptions = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'date' ],
    page: 2,
    pagination: [{
        outerWindow: 1
    }],
};
bookList = new List('bookList', booksOptions);


if (bookList !== null) {
    bookList.sort('titre', {
        order: "desc"
    });
}


let revuesOptions = {
    valueNames: [ 'titre', 'auteur', 'domaine', 'description' ],
    page: 2,
    pagination: [{
        outerWindow: 1
    }],
};
revueList = new List('revuesList', revuesOptions);
if (revueList !== null) {
    revueList.sort('titre', {
        order: "desc"
    });
}

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
