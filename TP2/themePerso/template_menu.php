
<?php 
function renderMenuToHTML($currentPage){
    echo "<div class='conteneur-flex ligne'>";
    $mymenu = array(
        'index'=>'Acceuil',
        'cv' =>  'Cv' ,
        'projet' => 'Mes Projets',
        'info_technique' => 'Contact',
    );
    foreach ($mymenu as $pageId => $pageParameters){
        echo "<div class='element-flex'>";
        if ($pageId==$currentPage){
            echo "<a href='$pageId.php' id=current>";
            echo $pageParameters;
            echo "</a></div>";
        }
        else {
           echo "<a href='$pageId.php'>";
           echo $pageParameters;
           echo "</a></div>";
        }
    }
   echo "</div>";
}
?>