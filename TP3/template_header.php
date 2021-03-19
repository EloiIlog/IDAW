<!DOCTYPE html>
<html>
  <head>
    <title>Coucou la mif</title>
    <?php
    $a="style1";
    if(isset($_GET['css'])){
        $a=$_GET['css'];
    }
    else if(isset($_COOKIE['cookie_style'])){
    $a=$_COOKIE['cookie_style'];}
    echo "<link rel='stylesheet' href='$a.css'>";
    session_start();
    ?>
    <meta charset="UTF-8">
    
  </head>