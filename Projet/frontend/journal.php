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
            <label for="inputType" class="col-sm-2 col-form-label">Type de repas</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputType" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAliment1" class="col-sm-2 col-form-label">Aliment consommé n°1</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputAliment1" >
            </div>
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
        function ajoutJournal(){
            event.preventDefault();
            $("#enCours").append(`Votre repas à bien été enregistré dans l'historique <br>
            Pour voir vos statistique aller dans l'onglet <a href='historique.php'>historique</a>`)
            record.date=$('#inputDate').val();
            record.time=$('#inputHeure').val();
            record.type=$('#inputType').val();
            record.comment=$('#inputCommentaires').val();
            for (let i = 1; i <= indicealiment; i++) {
                let a=$('#inputAliment'+i+'').val();
                aliments[i-1]=a;
                let b=$('#inputQuantite'+i+'').val()
                quantites[i-1]=b;
            }
            record.aliments=aliments;
            record.quantites=quantites;
            record.nbaliment=indicealiment;
            ajouteHistorique(record);
        }

        function ajoutChamps(){
            event.preventDefault();
            indicealiment++;
            $("<label for='inputAliment'"
            +indicealiment+" class='col-sm-2 col-form-label'>Aliment consommé n°"
            +indicealiment+"</label><div class='col-sm-3'><input type='text' class='form-control' id='inputAliment"
            +indicealiment+"' ></div><label for='inputQuantite"
            +indicealiment+"' class='col-sm-2 col-form-label'>Quantite n°"
            +indicealiment+"</label><div class='col-sm-3'><input type='text' class='form-control' id='inputQuantite"
            +indicealiment+"' ></div>").appendTo("#quantite");
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
                });
        }


        </script>

