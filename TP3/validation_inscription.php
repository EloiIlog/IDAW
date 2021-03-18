<?php require_once("template_header.php");
require_once("template_style.php");?>
<?php
           //database connexion 
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
            /*echo 'Connexion database reussi';
            echo "<br>";*/
            $sql = $conn->query("INSERT INTO login ('Login','Password','Pseudo')
            VALUES ($_POST['NewLogin'],
             '$_POST['NewPasseword']', '$_POST['NewPseudo']')");
            ?>
<h2> Vous avez bie été inscrit</h2>
<p>Votre login est <?php echo $_POST['NewLogin']?>