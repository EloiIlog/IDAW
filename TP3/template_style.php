<form id="style_form" action="index.php" method="GET">
<select name="css">
<option value="style1">style1</option>
<option value="style2">style2</option>
</select>
<input type="submit" value="Appliquer" />
</form>

<?php
if(isset($_GET['css'])){
$content = $_GET['css']; // Contenu du cookie
echo $content."**";
setcookie("cookie_style", $content);
}
?>