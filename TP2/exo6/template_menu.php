
<?php 
function renderMenuToHTML($currentPage){
    echo "<div class='conteneur-flex ligne'>";
    $mymenu = array(
        'accueil'=>'Acceuil',
        'projet' => 'Mes Projets',
        'cv' =>  'Cv' ,
        'info_technique' => 'Contact',
    );
    foreach ($mymenu as $pageId => $pageParameters){
        echo "<div class='element-flex'>";
        if ($pageId==$currentPage){
            echo "<a href='index.php?page=$pageId' id=current>";
            echo $pageParameters;
            echo "</a></div>";
        }
        else {
           echo "<a href='index.php?page=$pageId'>";
           echo $pageParameters;
           echo "</a></div>";
        }
    }
   echo "</div>";
}
?>