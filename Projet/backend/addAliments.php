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
        $sql = "INSERT INTO aliments2(nom, type,
        energie, proteines, glucides, lipides, sucres, AG, sel, code_type, potassium) 
        VALUES ("."'".$_POST['nom']."',".
        "'".$_POST['type']."',".
        "'".$_POST['energie']."',".
        "'".$_POST['proteines']."',".
        "'".$_POST['glucides']."',".
        "'".$_POST['lipides']."',".
        "'".$_POST['sucres']."',".
        "'".$_POST['ag']."',".
        "'".$_POST['sel']."',".
        "'0000',".
            "'".$_POST['potassium']."')";

        echo $sql;

        mysqli_query($conn,$sql);
        mysqli_close($conn);
    }

    