<!doctype html>
<html lang="fr">
    <head>
<script src='js/journal.js' async></script>
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

    