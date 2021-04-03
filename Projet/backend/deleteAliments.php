<?php
    print_r($_POST);
    deleteAliment();

    function deleteAliment(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        }
        $sql = "DELETE FROM aliments2 
        WHERE idAliment=".$_POST['idsql']."";
        

        echo $sql;

        mysqli_query($conn,$sql);
        mysqli_close($conn);
    }