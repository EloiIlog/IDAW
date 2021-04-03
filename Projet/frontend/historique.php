<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <title>Historique</title>
        <style>
        body{ margin-top: 5em; }
        .table {
        margin-top: 100px;
        margin-bottom: 100px;
        }
        </style>
    </head>
    <body>

    <form id="selectHist" action="" onsubmit="chargeHistorique();">
        <div class="form-recherche">
            <label for="searchDuree" class="col">Durée de l'enregistrement</label>
            <select id="dureeSelection" name="dureeSelection">
                <option value="tout">tout</option>
                <option value="jour">jour</option>
                <option value="semaine">semaine</option>
                <option value="mois">mois</option>
            <select>
        </div>
        <div class="form-recherche">
            <label for="searchType" class="col">Type d'aliment</label>
            <select id="typeSelection" name="typeSelection">
                <option value="tout">Tout afficher</option>
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
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Type de repas</th>
            <th scope="col">Nom de l'aliment</th>
            <th scope="col">Quantité</th>
            <th scope="col">Energie</th>
            <th scope="col">Sel (g/100 g)</th>
        </tr>
    </thead>
    <tbody id="historiqueTableBody">
    </tbody>
</table>

<script>
    let urlBackendPrefix = "http://localhost/GitHub/IDAW/projet/backend/";
        let types={};
        let historique={};

//Ajoute le selecteur de type
$(document).ready(function(){
        $.getJSON(urlBackendPrefix+"recupTypes.php", function(data){
            console.log(data);
            types=data;
            $.each(data, function(i, a){
            $("#typeSelection" ).append('<option value='+a.type+'>'+a.type+'</option>')
            //$("#inputType" ).append('<option value='+a.type+'>'+a.type+'</option>')
        });
                    });
                    console.log(types);
            });

function chargeHistorique(){
    event.preventDefault();
    $('#historiqueTableBody').empty();
    let selection={};
    let typeSel=$('#typeSelection').val();
    let dureeSel=$('#dureeSelection').val();
    selection.type=typeSel;
    selection.duree=dureeSel;
    console.log(selection);

    $.ajax({
            url: urlBackendPrefix+"afficherHistorique.php",
            method: "POST",
            dataType : "json",
            data : selection,
            /*success : function(lignehistorique){

            }*/    
        }).always(function(response){
                        //let data = JSON.stringify(response);
                        console.log(response);
                        historique=response;
            $.each(response, function(i, a){
                console.log(a);
                afficheUneLigne(a);
                
                    });
    });
}

function afficheUneLigne(record){
    $("#historiqueTableBody").append('<tr> <td> '
        +record.date+'  </td> <td> '
        +record.heure+'  </td><td> '
        +record.nom+'  </td><td> '
        +record.type+'  </td><td> '
        +record.energie+'  </td><td> '
        +record.sel+'  </td><td> </tr>');
}
</script>