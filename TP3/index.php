<?php require_once("template_header.php");
require_once("template_style.php");
if(isset($_SESSION['login'])){
    echo $_SESSION['login']." est connecté"."<br>";
    echo "<a href='deconnection.php'>Déconnection</a>";}
else{
    echo "<h1>Bienvenu</h1>";
    echo "<a href='login.php'>Connection</a><br>" ;
    echo"Si vous n'avez pas encore de compte: <br>
    <a href='inscription.php'>Inscription</a><br>";
    require_once("connected.php");
    }
 
if(isset($_SESSION['login'])){
    require_once("template_body.php");
}
?>