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
    $("#bookList").show();
    $("#revuesList").hide();
});

$('#revuesButton').on('click', function() {
    $("#bookList").hide();
    $("#revuesList").show();
});