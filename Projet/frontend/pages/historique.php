<!doctype html>
<html lang="fr">
    <head>
<script src='js/historique.js' async></script>
</head>

<h1 id="titre">Historique</h1>
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
                    <button type="submit" class="btn btn-primary form-control">Recherche</button>
                </div>
            </div>
    </form>

    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Type de repas</th>
            <th scope="col">Commentaires</th>
            <th scope="col">Aliments</th>
        </tr>
    </thead>
    <tbody id="historiqueTableBody">
    </tbody>
</table>
<div id="boutonStat" class="row justify-content-center"></div>
        <h1>Statistique nutritionnel</h1>
            <div id="stat"></div>
