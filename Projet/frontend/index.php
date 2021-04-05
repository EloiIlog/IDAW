<?php
  require_once("templates/template_header.php");
  require_once("templates/template_menu.php");
  $currentPageId = 'accueil';
  //$currentLangId = 'fr';
  
  if(isset($_GET['page'])) {
  $currentPageId = $_GET['page'];
  } 
  require_once("templates/template_titre.php");

renderMenuToHTML($currentPageId);
?>
<section class="corps">
<?php

$pageToInclude ="pages/" . $currentPageId . ".php";
if(is_readable($pageToInclude))
require_once($pageToInclude);
else
require_once("error.php");
?>
</section>
<?php
require_once("templates/template_footer.php");
?>