<?php
    
get_aliments();

    function get_aliments(){
        require_once('config.php');
        //On établit la connexion
        $conn = mysqli_connect($servername, $username, $password,$database);
        //On vérifie la connexion
        if($conn->connect_error){
        die('Erreur : ' .$conn->connect_error);
        }

        $sql = "SELECT * from ALIMENTS";
        $affiche= mysqli_query($conn, $sql);

        $array = array();
        while($row = mysqli_fetch_row($affiche)){
            array_push($array, $row);
        }
        echo json_encode($array, JSON_UNESCAPED_UNICODE);

        mysqli_close($conn); 
}

    
?>