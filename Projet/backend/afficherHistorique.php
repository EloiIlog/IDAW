<?php
    require_once("config.php");
    if ($_POST['duree']=="mois"){
        $interval="AND date between DATE_SUB(CURRENT_DATE,INTERVAL 1 MONTH) 
        AND CURRENT_DATE";
    }
    else if ($_POST['duree']=="semaine"){
        $interval="AND date between DATE_SUB(CURRENT_DATE,INTERVAL 7 DAY) 
        AND CURRENT_DATE";
    }

    else if ($_POST['duree']=="jour"){
        $interval="AND date=CURRENT_DATE";
    }
    else if ($_POST['duree']=="tout"){
        $interval="";
    }

    if ($_POST['type']=="tout"){
        $type="";
    }
    else{
        $type="AND type='".$_POST['type']."'";
    }

    try{
        $dbco = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        $infosAliments = $dbco->prepare("SELECT date, heure, nom, typeRepas, 
        quantite, energie, proteines, glucides, lipides, sucres, AG, sel, potassium, commentaires
        FROM aliments2 as a, comporepas as r, historique as h 
        WHERE h.heure=r.heureR AND h.date=r.dateR AND r.IdAliment=a.IdAliment
        ".$type."
        ".$interval."");
        $infosAliments->execute();

        $resultatinfosAliments = $infosAliments->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultatinfosAliments);
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }


    
?>