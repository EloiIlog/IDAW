<?php
    //print_r($_POST);
    addAliment();

    function addAliment(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        }
        $user=16;
    $aliments=$_POST['aliments'];
    $quantites=$_POST['quantites'];
    $insert='';
    for ($i=0; $i<$_POST['nbaliment']; $i++){
        $insert=$insert."INSERT INTO comporepas ( IdRepas,IdAliment, quantite)
        VALUES ((SELECT IdRepas 
        FROM historique 
        WHERE date='".$_POST['date']."' AND heure='".$_POST['time']."'), 
        (SELECT IdAliment FROM aliments2
        WHERE nom='".$aliments[$i]."'), '".$quantites[$i]."');";
        }
        
        $sql1 = "INSERT INTO historique (date, heure, IdRepas, typeRepas, IdUtilisateur) 
        VALUES ('".$_POST['date']."', 
        '".$_POST['time']."', NULL, '".$_POST['type']."', '16');";
        echo "2  : :".$sql1;
        mysqli_query($conn,$sql1);
        $sql2=$insert;
        mysqli_query($conn,$sql2);
        

        mysqli_close($conn);
    }