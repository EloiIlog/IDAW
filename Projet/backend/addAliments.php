<?php
    print_r($_POST);
    addAliment();

    function addAliment(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        }
        $sql = "INSERT INTO aliments(nom, type) 
        VALUES ("."'".$_POST['nom']."',".
            "'".$_POST['type']."')";

        echo $sql;

        mysqli_query($conn,$sql);
        mysqli_close($conn);
    }

    