<?php
    //print_r($_POST);
    afficherAliments();

    function afficherAliments(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        } 
        $sql = "SELECT nom from aliments2 WHERE type='".$_POST['typeA']."';";
        echo "1  : :".$sql;
        mysqli_query($conn,$sql);
        mysqli_close($conn);
    }