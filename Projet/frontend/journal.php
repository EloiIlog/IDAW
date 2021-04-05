<!doctype html>
<html lang="fr">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <title>Journal</title>
        <style>
        body{ margin-top: 5em; }
        .table {
        margin-top: 100px;
        margin-bottom: 100px;
        }
        </style>
    </head>


        <h1 id="titre">Journal de Bord</h1>
        <p>Rentrez votre dernier repas</p>
        <p id="enCours"></p>

    <form id="addRepasForm" action="" onsubmit="ajoutJournal();">
        <div class="form-group row">
            <label for="inputDate" class="col-sm-2 col-form-label">Date du repas</label>
            <p id=erreur></p>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="inputDate" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputHeure" class="col-sm-2 col-form-label">Heure du repas</label>
            <p id=erreur></p>
            <div class="col-sm-3">
                <input type="time" class="form-control" id="inputHeure" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputTypeRepas" class="col-sm-2 col-form-label">Type de repas</label>
            <select id="inputTypeRepas" name="inputTypeRepas">
                <option value="Petit Déjeuner">Petit Déjeuner</option>
                <option value="Déjeuner">Déjeuner</option>
                <option value="Diner">Diner</option>
                <option value="Collation matin">Collation matin</option>
                <option value="Collation après midi">Collation après midi</option>
                <option value="Brunch">Brunch</option>
                <option value="Grignotage">Grignotage</option>
            <select>
        </div>
        <div class="form-recherche">
            <label for="searchTypeAliment" class="col">Type d'aliment n°1</label>
            <select id="typeSelectionAliment1" name="typeSelectionAliment1">
            <select>
        </div>
        <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-2" >
                    <button onclick="selectTypeAliment(1);" class="btn btn-primary form-control">Valider votre selection de type</button>
                </div>
        </div>
        <div class="form-group row">
        <label for="searchAliment" class="col">Aliment consommé n°1</label>
            <select id="inputAliment1" name="inputAliment1">
                <option  value="tout">aliment1</option>
            <select>
        </div>
        <div class="form-group row" id=quantite>
            <label for="inputQuantite2" class="col-sm-2 col-form-label">Quantité d'aliment n°1 (en g)</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputQuantite1" >
            </div>
        </div>
        <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-2" >
                    <button onclick="ajoutChamps();" class="btn btn-primary form-control">Ajouter un aliment</button>
                </div>
        </div>
        <div class="form-group row">
            <label for="inputCommentaires" class="col-sm-2 col-form-label">Commentaires sur le repas</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputCommentaires" >
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
        let urlBackendPrefix = "http://localhost/GitHub/IDAW/projet/backend/";
        let record={};
        let indicealiment=1;
        let aliments=[];
        let quantites=[];
        let timer=0;
        let types={};
        let selAliment={};

        $(document).ready(function(){
        $.getJSON(urlBackendPrefix+"recupTypes.php", function(data){
            console.log(data);
            types=data;
            $.each(data, function(i, a){
                $("#typeSelectionAliment1" ).append('<option value='+a.type+'>'+a.type+'</option>')
                //$("#inputType" ).append('<option value='+a.type+'>'+a.type+'</option>')
                });
            });
            console.log(types);
        });

        function selectTypeAliment(id){
            event.preventDefault();
            let envoi={};
            typeSel=$("#typeSelectionAliment"+id+"").val();
            console.log("voici la selection :"+typeSel);
            envoi.typeA=typeSel;
            console.log("voici la selection :"+envoi.typeA);
            $.ajax({
                url: urlBackendPrefix+"afficherAliments.php",
                method: "POST",
                dataType : "json",
                data : envoi,
            }).always(function(response){
                console.log(response);
                data=response;
                selAliment=response;
                $.each(data, function(i, a){
                    $("#inputAliment"+id+"" ).append('<option value='+a.nom+'>'+a.nom+'</option>')
                    });
                });
        }

        function ajoutChamps(){
            event.preventDefault();
            indicealiment++;
            $("<div class='form-recherche'><label for='searchTypeAliment' class='col'>Type d'aliment n°"
            +indicealiment+"</label><select id='typeSelectionAliment"
            +indicealiment+"' name='typeSelectionAliment"
            +indicealiment+"'><option value='tout'>Tout afficher</option><select></div></div><div class='form-group row'><span class='col-sm-2'></span><div class='col-sm-2' ><button onclick='selectTypeAliment("
            +indicealiment+");' class='btn btn-primary form-control'>Valider votre selection de type</button></div></div><div class='form-group row'><label for='searchAliment' class='col'>Aliment consommé n°"
            +indicealiment+"</label><select id='inputAliment"
            +indicealiment+"' name='inputAliment1"
            +indicealiment+"'><select><div class='col-sm-3'></div></div><div class='form-group row'><label for='inputQuantite"
            +indicealiment+"' class='col-sm-2 col-form-label'>Quantite n°"
            +indicealiment+"</label><div class='col-sm-3'><input type='text' class='form-control' id='inputQuantite"
            +indicealiment+"' ></div>").appendTo("#quantite");
            $.each(types, function(i, a){
                $("#typeSelectionAliment"+indicealiment+"").append('<option value='+a.type+'>'+a.type+'</option>');
            });
            $.each(selAliment, function(i, a){
                    $("#inputAliment"+indicealiment+"" ).append('<option value='+a.nom+'>'+a.nom+'</option>')
                    });

        }

        function ajoutJournal(){
            event.preventDefault();
            $("#enCours").append(`Votre repas à bien été enregistré dans l'historique <br>
            Pour voir vos statistique aller dans l'onglet <a href='historique.php'>historique</a>`)
            record.date=$('#inputDate').val();
            record.time=$('#inputHeure').val();
            record.type=$('#inputTypeRepas').val();
            record.comment=$('#inputCommentaires').val();
            for (let i = 1; i <= indicealiment; i++) {
                let a=$('#inputAliment'+i+'').val();
                console.log(a);
                aliments[i-1]=a;
                console.log(aliments);
                let b=$('#inputQuantite'+i+'').val()
                quantites[i-1]=b;
            }
            record.aliments=aliments;
            record.quantites=quantites;
            record.nbaliment=indicealiment;
            ajouteHistorique(record);
            //setTimeout(ajouteComporepas(record), 2000);
            /*for (let j = 1; j <= 1000000000; j++) {
                timer=timer+1;
            }
            console.log(timer);
            if (timer>999999998){
                for (let k = 0; k < indicealiment; k++){
                record.indiceEnCours=k;
                
                }
                timer=0;
             
            }*/
        }

        function ajouteHistorique(newRecord){
            console.log(newRecord);
            $.ajax({
                url: urlBackendPrefix+"addHistorique.php",
                method: "POST",
                dataType : "json",
                data : newRecord,    
            }).always(function(response){
                //let data = JSON.stringify(response);
                console.log(response);
                ajouteComporepas(newRecord);
                });
        }

        function ajouteComporepas(newRecord){
            console.log(newRecord);
            $.ajax({
                url: urlBackendPrefix+"addComporepas.php",
                method: "POST",
                dataType : "json",
                data : newRecord,    
            }).always(function(response){
                //let data = JSON.stringify(response);
                console.log(response);
                });
        }

        </script>

