<?php require_once('template_header.php');
?>
    <div class="conteneur-flex">
    <?php require_once('template_titre.php');
?>
      <?php require_once('template_menu.php');
    renderMenuToHTML('projet');
    ?>
        <div>
          <h3>Projet 1: Devenir maitre alpaga</h3>
          <p>Mon futur employeur:  <a href="https://www.elevage-alpagas.com/">Les joulies alpagas</a></p>
          <video src="Mon élevage d'alpaga.mp4" controls width=50%>Mes alpagas de collection</video>
        </div>
    </div>
    <?php require_once('template_footer.php');
?>