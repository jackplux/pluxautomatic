























<?php

 //Vérification d'un formulaire

   while(list($id,$value) = each($_POST)){
  if(empty($value))
  echo "Le champ ".$id." est vide <br />";
  }  
 $depart = $_POST['depart'];
 $titre = $_POST['titre'];
 $nom = $_POST['nom'];
 $adresse = $_POST['adresse'];
 $pass = $_POST['pass'];
htmlspecialchars($pass);
htmlspecialchars($titre);
htmlspecialchars($nom);
htmlspecialchars($adresse);
htmlspecialchars($pass);
 $url2='$url';$script='if ($url) {header("Location: $url");} else if($QUERY_STRING) {header("Location: ".urldecode($QUERY_STRING));} else {echo "Error bad URL 2 ";} ?>  <br><br>Bonjour '.$depart.',<br><br>Votre site a été créé, il ne reste plus qu\'a le configurer, c\'est très simple:<a href=\'/site/install\'>IcI</a><br>       <p align="right">Bonne visite '.$nom.' !</p>';

 if(is_dir("$depart")){
 echo "Le nom de domaine <b><i>(http://boutique.reseauk.info/$depart/)</i></b> est deja utilise.";
 }



$dir_dest = "sites/$depart";
$dir_source = 'PluXml';


mkdir($dir_dest, 0755);

$dir_iterator = new RecursiveDirectoryIterator($dir_source, RecursiveDirectoryIterator::SKIP_DOTS);

$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

foreach($iterator as $element){

	if($element->isDir()){
		mkdir($dir_dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
	} else{
		copy($element, $dir_dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
	}
}


?>


<!doctype html>

<html lang="fr">
<head> 
<meta charset="utf-8">

<style type="text/css">
HTML  CSS   Result
Edit on 
body
{
  background-color: #fcfcfc;
}
.center-div
{
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 600px;
  height: 250px;
  background-color: #ffffff;
  border-radius: 3px;
 border-width:1px;
 border-style:solid;
 border-color:red;
}

</style>
</head>
<body>



<div class="center-div">
       <h1><img alt="Le testeur fou" src="le-testeur-fou.jpg" style="width: 196px; height: 200px; float: left;" />Bravo !</h1>

<p><strong>Votre site est en ligne 

<?php echo " $depart <br></b> et son adresse est votre URL/sites/$depart/</b>.<br><br>Pour y aller <a href='sites/$depart/' class='ici'>Cliquez ici</a>";
  ?>





    </div>





</body>
<html>
