<?php
addComporepas();

    function addComporepas(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        }
    $aliments=$_POST['aliments'];
    $quantites=$_POST['quantites'];
    $insert='';
    for ($i=0; $i<$_POST['nbaliment']; $i++){
        $insert="INSERT INTO comporepas ( IdRepas,IdAliment, quantite)
        VALUES ((SELECT IdRepas 
        FROM historique 
        WHERE date='".$_POST['date']."' AND heure='".$_POST['time']."'), 
        (SELECT IdAliment FROM aliments2
        WHERE nom='".$aliments[$i]."'), '".$quantites[$i]."');";
        mysqli_query($conn,$insert);
        echo "comporepas  : :".$i.":::".$insert;
        }
        mysqli_close($conn);
    }
?>