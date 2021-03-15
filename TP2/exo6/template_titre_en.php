<div class="conteneur-titre">
        <h1 >My Pro Website</h1>
        <?php 
        $currentPageId = 'accueil';
        if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];}
        echo "<button><a href='index.php?page=$currentPageId&lang=fr'>Français</a></button>"
      ?>
      </div>