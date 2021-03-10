<?php require_once('template_header.php');
?>
    <div class="conteneur-flex">
      <div class="conteneur-titre">
        <h1 >Mon Site Professionel</h1>
      </div>
        <div class="conteneur-flex ligne">
          <div class="element-flex"><a href="../themePerso/index.html">Accueil</a></div>
          <div class="element-flex"><a id="current" href="../themePerso/projet.html">Mes projet</a></div>
          <div class="element-flex"><a href="../themePerso/cv.html">Mon CV</a></div>
        </div>
        <div>
          <h3>Projet 1: Devenir maitre alpaga</h3>
          <p>Mon futur employeur:  <a href="https://www.elevage-alpagas.com/">Les joulies alpagas</a></p>
          <video src="Mon élevage d'alpaga.mp4" controls width=50%>Mes alpagas de collection</video>
        </div>
    </div>
    <?php require_once('template_footer.php');
?>