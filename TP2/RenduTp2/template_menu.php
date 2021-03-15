
<?php 
function renderMenuToHTML($currentPage,$currentLang){
    echo "<div class='conteneur-flex ligne'>";
    $mymenu = array(
        'accueil'=>array('Acceuil','Welcome'),
        'projet' => array('Mes Projets','My Projects'),
        'cv' =>  array('CV','CV') ,
        'info_technique' => array('Information','Contact'),
    );
    if($currentLang=='en'){
        $la=1;
    }
    else{
        $la=0;
    }
    
    foreach ($mymenu as $pageId => $pageParameters){
        echo "<div class='element-flex'>";
        if ($pageId==$currentPage){
            echo "<a href='index.php?page=$pageId&lang=$currentLang' id=current>";
            echo $pageParameters[$la];
            echo "</a></div>";
        }
        else {
           echo "<a href='index.php?page=$pageId&lang=$currentLang'>";
           echo $pageParameters[$la];
           echo "</a></div>";
        }
    }
   echo "</div>";
}
?>