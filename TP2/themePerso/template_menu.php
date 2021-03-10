

<?php 
echo "<div class='conteneur-flex ligne'>"
function renderMenuToHTML($currentPage){
    $mymenu = array(
        'index'=>array('Acceuil'),
        'cv' => array( 'Cv' ),
        'projets' => array('Mes Projets'),
        'technique' => array('Contact')
    );
    foreach ($mymenu as $pageId => $pageParameters){
        echo "<div class='element-flex'><a href='index.php'>Accueil</a></div>";
        echo "<div class='element-flex'><a href='cv.php'>Mon CV</a></div>";
        echo "<div class='element-flex'><a href='projet.php'>Mes projets</a></div>";
        echo "<div class='element-flex'><a href='info_technique.php'>Contact</a></div>";
    }
}