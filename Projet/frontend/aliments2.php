<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <title>tabletest</title>
        <style>
        body{ margin-top: 5em; }
        .table {
        margin-top: 100px;
        margin-bottom: 100px;
        }
        </style>
    </head>
    <body>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom Aliment</th>
            <th scope="col">Type d'aliment</th>
        </tr>
    </thead>
    <tbody id="alimentsTableBody">
    </tbody>
</table>
    <form id="addAlimentsForm" action="" onsubmit="onFormSubmit();">
        <div class="form-group row">
            <label for="inputAliment" class="col-sm-2 col-form-label">Nom Aliment</label>
            <p id=erreur></p>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAliment" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputType" class="col-sm-2 col-form-label">Type d'aliment</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputType" >
            </div>
        </div>
        <div class="form-group row">
            <span class="col-sm-2"></span>
        <div class="col-sm-2" >
            <button type="submit" class="btn btn-primary form-control">Submit</button>
        </div>
</div>
</form>

<script>
    let idligne = 0; 
    let aliments = [];
    let currentEditedFoodId =-1;
    let urlBackendPrefix = "http://localhost/GitHub/IDAW/projet/backend/";
            
    $(document).ready(function(){
        $.getJSON(urlBackendPrefix+"afficherAliments.php", function(data){ 
            console.log(data);
            $.each(data, function(i, a){
                console.log(a[2])
                let aliment = {};
                aliment.nom = a[0];
                aliment.type = a[1];
                aliment.idsql = a[2];
                aliments.push(aliment);
                afficheUnAliment(aliment);
                    });
                    console.log(aliments);
                });
            });

    function afficheUnAliment(newFood){
        newFood.id = idligne;
        $("#alimentsTableBody").append('<tr id='+newFood.id+'> <td> '
        +newFood.nom+'  </td> <td> '
        +newFood.type+'  </td> <td><button onclick=edit('+idligne+')>edit</button><button onclick=remove('+idligne+')>remove</button></td></tr>');
        idligne++;}

    /*function ajouteAliment(){

    }*/

    let currentligne=-1;
    function onFormSubmit() {
// prevent the form to be sent to the server
    event.preventDefault();
    let nom = $("#inputAliment").val();
    let type = $("#inputType").val();
//$("check").val();
    let aliment={};
    aliment.nom = nom;
    aliment.type = type;
    console.log(aliments[idligne-1])
    aliment.idsql= (aliments[idligne-1].idsql);
    
    aliment.id= idligne;
if (nom!=''){
    if (currentligne==-1){ 
        aliment.idsql++;
        aliments.push(aliment);
        console.log(aliments);
        $("#erreur").empty();

    $("#alimentsTableBody").append('<tr id='+idligne+'><td>'+aliments[idligne].nom+'</td><td>'
        +aliments[idligne].type+
        '</td> <td><button onclick=edit('+idligne+')>edit</button><button onclick=remove('+idligne+')>remove</button></td></tr>') ;
    console.log(aliments[idligne]);
    idligne++;
    ajouteAlimentSql(aliment);
    }

    
    else{
        console.log(aliments[currentligne]);
        console.log(aliments[currentligne].nom);
        let saveid=aliments[currentligne].idsql;
        aliments[currentligne]=aliment;
        aliments[currentligne].idsql=saveid;
    $('#'+currentligne).empty();
    $("#erreur").empty();
    $('<tr id='+currentligne+'><td>'+aliments[currentligne].nom+'</td><td>'
        +aliments[currentligne].type+
        '</td> <td><button onclick=edit('
        +currentligne+')>edit</button><button onclick=remove('
        +currentligne+')>remove</button></td></tr>').appendTo('#'+currentligne) ;
        console.log(aliments[currentligne]);
        console.log(aliments[currentligne].nom);
    currentligne=-1;
    editAlimentSql(aliment);
    }
}
}

    function ajouteAlimentSql(newFood){
        //$(document).ready(function(){
        $.ajax({
            url: urlBackendPrefix+"addAliments.php",
            method: "POST",
            dataType : "json",
            data : newFood
        }).always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
    });
    }
    function editAlimentSql(changeFood){
        console.log(changeFood);
        //$(document).ready(function(){
        $.ajax({
            url: urlBackendPrefix+"editAliments.php",
            method: "POST",
            dataType : "json",
            data : changeFood
        }).always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
    });
    }

    function edit(a){
        $("#erreur").empty();
    $("#erreur").append('Vous êtes entrain de modifier la ligne '+(a+1));
    currentligne=a;
    }
    function remove(b){
        console.log(b);
        $("#erreur").append('Vous avez supprimé la ligne '+b);
        $('#'+b).empty();
        let num={};
        num.idsql=aliments[b].idsql;
        $.ajax({
            url: urlBackendPrefix+"deleteAliments.php",
            method: "POST",
            dataType : "json",
            data : num
        }).always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
    });
    }
    /*$(document).ready(function(){
        $.ajax({
            url: urlBackendPrefix+"afficherAliments.php",
            method: "POST",
            dataType : "json"
        }).done(function(reponse){
            let data = JSON.stringify(reponse);
            $("#alimentsTableBody").append(`<tr> 
        <td> ${data.nom}  </td> </tr>`);
        });
    });*/
</script>