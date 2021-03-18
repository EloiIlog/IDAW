    <?php
        // on simule une base de données
        //$users = array(
        // login => password
        /*'riri' => 'fifi',
        'yoda' => 'maitrejedi',
        'eloi' => 'lebest' );*/
        $login = "anonymous";

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
            echo 'Connexion database reussi';
            echo "<br>";

            $sql = $conn->query("SELECT * from login");
        
        $errorText = "";
        $successfullyLogged = false;
        if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        

        // si login existe et password correspond
            while($row = $sql->fetch_assoc()){ 
                if($row['Login']==$tryLogin && $row['Password']==$tryPwd){
                $successfullyLogged = true;
                $login = $tryLogin;
                } 
                else{
                $errorText = "Erreur de login/password";
                }
            }
        } 
        else
        $errorText = "Merci d'utiliser le formulaire de login";
        
        if(!$successfullyLogged) {
        echo $errorText;
        } else {
        //echo "<h1>Bienvenu ".$login."</h1>";
        $_SESSION['login'] = $login;
        }
        /*echo $_SESSION['login'];
         if(isset($_COOKIE['cookie_style']))
    $a=$_COOKIE['cookie_style'];
    echo $a;*/
    ?>


