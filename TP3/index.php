<?php 
if(isset($_GET['css'])){
$content = $_GET['css']; // Contenu du cookie
setcookie("cookie_style", $content);
}

require_once("template_header.php");
require_once("template_style.php");
if(isset($POST['login'])){
    echo $_POST['login']." est connecté"."<br>";
    echo "<a href='deconnection.php'>Déconnection</a>";
    require_once("template_body.php");
}
if(isset($_SESSION['login'])){
    echo $_SESSION['login']." est connecté"."<br>";
    echo "<a href='deconnection.php'>Déconnection</a>";
    require_once("template_body.php");
}
else{
    echo "<h1>Bienvenu</h1>";
    require_once("connected.php");
    echo "<a href='login.php'>Connection</a><br>" ;
    echo"<br>Si vous n'avez pas encore de compte: <br>
    <a href='inscription.php'>Inscription</a><br>";
    }
?>