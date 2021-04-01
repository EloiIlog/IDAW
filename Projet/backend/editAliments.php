<?php
    print_r($_POST);
    editAliment();

    function editAliment(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        }
        $sql = "UPDATE aliments
        SET nom ='".$_POST['nom']."',
        type='".$_POST['type']."'
        WHERE id=".$_POST['idsql']."";

        echo $sql;

        mysqli_query($conn,$sql);
        mysqli_close($conn);
    }
