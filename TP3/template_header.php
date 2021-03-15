<!DOCTYPE html>
<html>
  <head>
    <title>Coucou la mif</title>
    <?php if(isset($_COOKIE['cookie_style'])){
    $a=$_COOKIE['cookie_style'];
    echo "<link rel='stylesheet' href='$a.css'>";}
    else{
        echo "<link rel='stylesheet' href='style1.css'>";
    }
    session_start();
    ?>
    <meta charset="UTF-8">
    
  </head>