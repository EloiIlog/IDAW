<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <title>Aliments</title>
        <style>
        body{ margin-top: 5em; }
        .table {
        margin-top: 100px;
        margin-bottom: 100px;
        }
        </style>
    </head>
    <body>


<form id="selectType" action="" onsubmit="chargeAliments();">
    <div class="form-recherche">
        <label for="searchType" class="col">Type d'aliment</label>
        <select id="typeSelection" name="typeSelection">
            <option value="dessert">Dessert</option>
        <select>
    </div>
    <div class="form-group row">
            <span class="col-sm-2"></span>
            <div class="col-sm-2" >
                <button type="submit" class="btn">Recherche</button>
            </div>
        </div>
</form>



<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom Aliment</th>
            <th scope="col">Type d'aliment</th>
            <th scope="col">Energie</th>
            <th scope="col">Protéines (g/100 g)</th>
            <th scope="col">Glucides (g/100 g)</th>
            <th scope="col">Lipides (g/100 g)</th>
            <th scope="col">Sucres (g/100 g)</th>
            <th scope="col">Acides Gras Saturés (g/100 g)</th>
            <th scope="col">Sel (g/100 g)</th>
            <th scope="col">Potassium (mg/100 g)</th>
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
            <div class="form-recherche">
            <select id="inputType" name="inputType">
            <select>
        </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEnergie" class="col-sm-2 col-form-label">Energie (kcal/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputEnergie" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputProteines" class="col-sm-2 col-form-label">Proteines (g/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputProteines" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputGlucides" class="col-sm-2 col-form-label">Glucides (g/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputGlucides" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLipides" class="col-sm-2 col-form-label">Lipides (g/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputLipides" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSucres" class="col-sm-2 col-form-label">Sucres (g/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputSucres" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAG" class="col-sm-2 col-form-label">Acides gras saturés (g/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAG" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSel" class="col-sm-2 col-form-label">Sel (g/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputSel" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPotassium" class="col-sm-2 col-form-label">Potassium (mg/100 g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputPotassium" >
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
    let types = {};
    let currentType = "sandwichs";
    let aliment = {};
    //$("#alimentsTableBody").append("coucou");

    /*$(document).ready(function(){
        $.getJSON(urlBackendPrefix+"afficherAliments.php", function(data){
            console.log(data);
            $.each(data, function(i, a){
                let aliment = {};
                aliment.nom = a.nom;
                aliment.type = a.type;
                aliment.energie = a.energie;
                aliment.proteines = a.proteines;
                aliment.glucides = a.glucides;
                aliment.lipides = a.lipides;
                aliment.sucres = a.sucres;
                aliment.ag = a.AG;
                aliment.sel = a.sel;
                aliment.potassium = a.potassium;
                aliment.idsql = a.IdAliment;
                aliments.push(aliment);
                afficheUnAliment(aliment);
                    });
                    console.log(aliments);
                });
            });*/



            $(document).ready(function(){
        $.getJSON(urlBackendPrefix+"recupTypes.php", function(data){
            console.log(data);
            types=data;
            $.each(data, function(i, a){
            $("#typeSelection" ).append('<option value='+a.type+'>'+a.type+'</option>')
            $("#inputType" ).append('<option value='+a.type+'>'+a.type+'</option>')
        });
                    });
                    console.log(types);
            });

    function chargeAliments(currentType){
        event.preventDefault();
        $('#alimentsTableBody').empty();
        let selection={};
        selection.typeA=$('#typeSelection').val();
        $.ajax({
            url: urlBackendPrefix+"afficherAliments.php",
            method: "POST",
            dataType : "json",
            data : selection
            
        }).always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
                        console.log(response[0]);
            $.each(response, function(i, a){
                aliment.ag=a.AG;
                aliment.idsql = a.IdAliment;
                aliment.nom = a.nom;
                aliment.type = a.type;
                aliment.energie = a.energie;
                aliment.proteines = a.proteines;
                aliment.glucides = a.glucides;
                aliment.lipides = a.lipides;
                aliment.sucres = a.sucres;
                aliment.ag = a.AG;
                aliment.sel = a.sel;
                aliment.potassium = a.potassium;
                aliment.idsql = a.IdAliment;
                aliments.push(aliment);
                afficheUnAliment(aliment);
                    });
                    console.log(aliments);
        });   
    }

    function afficheUnAliment(newFood){
        newFood.id = idligne;

        $("#alimentsTableBody").append('<tr id='+newFood.id+'> <td> '
        +newFood.nom+'  </td> <td> '
        +newFood.type+'  </td><td> '
        +newFood.energie+'(kcal/100g)  </td><td> '
        +newFood.proteines+'  </td><td> '
        +newFood.glucides+'  </td><td> '
        +newFood.lipides+'  </td><td> '
        +newFood.sucres+'  </td><td> '
        +newFood.ag+'  </td><td> '
        +newFood.sel+'  </td><td> '
        +newFood.potassium+'  </td> <td><button onclick=edit('+idligne+')>edit</button><button onclick=remove('+idligne+')>remove</button></td></tr>');
        idligne++;}

    /*function ajouteAliment(){

    }*/

    let currentligne=-1;
    function onFormSubmit() {
// prevent the form to be sent to the server
    event.preventDefault();
    let nom = $("#inputAliment").val();
    let type = $("#inputType").val();
    let energie = $("#inputEnergie").val();
    let proteines = $("#inputProteines").val();
    let glucides = $("#inputGlucides").val();
    let lipides = $("#inputLipides").val();
    let sucres = $("#inputSucres").val();
    let ag = $("#inputAG").val();
    let sel = $("#inputSel").val();
    let potassium = $("#inputPotassium").val();
//$("check").val();
    let aliment={};
    aliment.nom = nom;
    aliment.type = type;
    aliment.energie = energie;
    aliment.proteines = proteines;
    aliment.glucides = glucides;
    aliment.lipides = lipides;
    aliment.sucres = sucres;
    aliment.ag = ag;
    aliment.sel = sel;
    aliment.potassium = potassium;
    console.log(aliments[idligne-1]);
    //aliment.idsql= (aliments[idligne-1].idsql);
    
    aliment.id= idligne;
if (nom!=''){
    if (currentligne==-1){ 
        aliment.idsql++;
        aliments.push(aliment);
        console.log(aliments);
        $("#erreur").empty();

    $("#alimentsTableBody").append('<tr id='+idligne+'><td>'
    +aliments[idligne].nom+'</td><td>'
    +aliments[idligne].type+'</td><td>'
    +aliments[idligne].energie+'</td><td>'
    +aliments[idligne].proteines+'</td><td>'
    +aliments[idligne].glucides+'</td><td>'
    +aliments[idligne].lipides+'</td><td>'
    +aliments[idligne].sucres+'</td><td>'
    +aliments[idligne].ag+'</td><td>'
    +aliments[idligne].sel+'</td><td>'
    +aliments[idligne].potassium+'</td> <td><button onclick=edit('
    +idligne+')>edit</button><button onclick=remove('
    +idligne+')>remove</button></td></tr>') ;
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
    $('<tr id='+currentligne+'><td>'
    +aliments[currentligne].nom+'</td><td>'
    +aliments[currentligne].type+
    +aliments[currentligne].energie+'</td><td>'
    +aliments[currentligne].proteines+'</td><td>'
    +aliments[currentligne].glucides+'</td><td>'
    +aliments[currentligne].lipides+'</td><td>'
    +aliments[currentligne].sucres+'</td><td>'
    +aliments[currentligne].ag+'</td><td>'
    +aliments[currentligne].sel+'</td><td>'
    +aliments[currentligne].potassium+
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