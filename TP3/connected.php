<!DOCTYPE html>
<html>
  <head>
    <title>Coucou la mif</title>
    <?php if(isset($_COOKIE['cookie_style']))
    $a=$_COOKIE['cookie_style'];
    echo "<link rel='stylesheet' href='$a.css'>";
    ?>
    <meta charset="UTF-8">
    
  </head>
  
<body>
    <?php
        // on simule une base de données
        $users = array(
        // login => password
        'riri' => 'fifi',
        'yoda' => 'maitrejedi',
        'eloi' => 'lebest' );
        $login = "anonymous";
        $errorText = "";
        $successfullyLogged = false;
        if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];

        // si login existe et password correspond
            if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
            } else
            $errorText = "Erreur de login/password";
        } else
        $errorText = "Merci d'utiliser le formulaire de login";
        if(!$successfullyLogged) {
        echo $errorText;
        } else {
        echo "<h1>Bienvenu ".$login."</h1>";
        }
    ?>
    <h1>Page de Eloi</h1>
    <?php if(isset($_COOKIE['cookie_style']))
    $a=$_COOKIE['cookie_style'];
    echo $a;
    ?>
</body>

