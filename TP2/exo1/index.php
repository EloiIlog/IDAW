<html>
<head>
<title> Exemple date heure </title>
</head>
<body>
<p>Salut la zone</p>
<?php date_default_timezone_set("Europe/Paris");
echo date("d/m/y");
$d=date("h:i:s");
echo "   c'est l'heure $d";
?>
<p>On va faire un petite boucle maintenant qui compte jusqu'à 9</p>
<?php $c = 0;
do{
    $c=$c+1;
}while($c>0 && $c<9);
echo $c;
?>
<p>1 ere fonction</p>
<?php function salut($nb){
    $slt=" ";
    for($i=0; $i<$nb;$i++)
        $slt="Salut; ".$slt;
    return $slt;
}
echo salut(13);
?>
<p>Tableaux</p>
<?php $tab1 = array("A","B","C");
print_r($tab1);
echo '\n';
$tab2[0] = "Hey";
$tab2[1] = "C'est";
$tab2[2] = "Eloi";
print_r($tab2);
foreach($tab2 as $text){
    echo $text."M.";
}
?>
<p>Tableaux 2</p>
<?php 
$salut = array(
    'prenom' => 'Eloi',
    'nom' => 'Guisnet',
);
echo $salut['prenom'];
?>

</body>
</html>