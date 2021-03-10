<?php require_once('template_header.php');
?>
    <div class="conteneur-flex">
      <div class="conteneur-titre">
        <h1 >Mon Site Professionel</h1>
      </div>
      <div class="conteneur-flex ligne">
        <div class="element-flex"><a href="../themePerso/index.html">Accueil</a></div>
        <div class="element-flex"><a href="../themePerso/projet.html">Mes projet</a></div>
        <div class="element-flex"><a id="current" href="../themePerso/cv.html">Mon CV</a></div>
        </div>
        <p>Télécharger mon CV: <a href="../themePerso/CV Eloi Guisnet 2021.pdf">CV Eloi Guisnet</a></p>
        <iframe src="../themePerso/CV Eloi Guisnet 2021.pdf" width=80% height="700px"></iframe>
      </div>
      <?php require_once('template_footer.php');
?>