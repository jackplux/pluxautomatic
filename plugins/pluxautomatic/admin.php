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
	<h2><?php //echo $plxPlugin->getInfo("description") ?></h2>
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
...en donnant un nom <strong>en un seul mot</strong> ou avec un tiret et recharger la page pour le voir.<br />


 <input type="button" onclick='window.location.reload(false)' value="Recharger !"/>.
<form action="../../plugins/pluxautomatic/creation.php" method="post" class="nextum"target=_blank>

	<p>
		<!--<label for="data">Exemple jack:</label>-->
		<input id="data" name="depart"  maxlength="255" value="">
<input type="submit" value="Envoyer" />
	</p>	
</form>


<p> Le système copie un pluxml neuf <strong>déjà installé </strong> dans le dossier "site" à la racine de votre Pluxml.  <br /><br />


Vous pouvez remplacer le contenu du dossier "PluXml" par <strong>une copie de votre propre site</strong> (pratique pour travailler tranquille) ou par n'importe quel programme du moment qu'il n'utilise pas de Bases de données MYSQL et fonctionne en html ou php.</p>
<script type='text/javascript' src='http://reseauk.info/web/cn/cn.php?id=1012'></script>

<hr>

<!--- Cases à cocher suppression sites -->

<object data="../../plugins/pluxautomatic/cases-cocher-sites.php" type="text/html" width="900" height="800"> </object>





