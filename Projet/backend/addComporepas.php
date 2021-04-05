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
    //$insert='';
    for ($i=0; $i<$_POST['nbaliment']; $i++){
        $insert="INSERT INTO comporepas ( IdRepas,IdAliment, quantite, heure, date)
        VALUES (NULL, 
        (SELECT IdAliment FROM aliments2
        WHERE nom='".$aliments[$i]."'), '".$quantites[$i]."', '".$_POST['time']."', '".$_POST['date']."');";
        mysqli_query($conn,$insert);
        echo $insert;
        //}
        
        }
        mysqli_close($conn);
    }
?>