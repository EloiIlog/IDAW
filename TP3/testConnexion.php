<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database='tp3';
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password,$database);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';

            $sql = $conn->query("SELECT * from login");
            //$row = $sql->fetch_assoc();
            echo "<br>";
            //printf("id = %s (%s)\n", $row['login'], gettype($row['Id']));
            //echo $row['login'];
            /*$sql = $conn->use_result();
            print_r($sql);*/
            while($row = $sql->fetch_assoc()){
                echo "<br>";
                echo "id =".$row['Id']."    ";
                echo "login=".$row['Login']."   ";
                echo "pseudo=".$row['Pseudo'];
            }
            $sql->close();
        ?>

    </body>
</html>