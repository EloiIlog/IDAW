<?php require_once("template_header.php");
require_once("template_style.php");
?>
<h1 class=gros>Titre et peut etre menu</h1>

<?php 
if(isset($_SESSION['login'])){
    echo $_SESSION['login']."<br>";
    echo "<a href='deconnection.php'>Déconnection</a>";
    require_once("template_body.php");
}
else{
    echo "<h1>Bienvenu</h1>";
    echo "<a href='login.php'>Connection</a>" ;
    require_once("connected.php");
    }
?>