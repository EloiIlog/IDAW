<?php
  require_once("template_header.php");
  require_once("template_menu.php");
  $currentPageId = 'accueil';
  $currentLangId = 'fr';
  
  if(isset($_GET['page'])) {
  $currentPageId = $_GET['page'];
  }
  
  if(isset($_GET['lang'])) {
    $currentLangId = $_GET['lang'];
  }
?>
<?php
  if($currentLangId=='en'){
    require_once("template_titre_en.php");
  }
  else{
    require_once("template_titre_fr.php");
  }
  

?>
<?php
renderMenuToHTML($currentPageId,$currentLangId);
?>
<section class="corps">
<?php
$pageToInclude =$currentLangId . "/" . $currentPageId . ".php";
if(is_readable($pageToInclude))
require_once($pageToInclude);
else
require_once("error.php");
?>
</section>
<?php
require_once("template_footer.php");
?>