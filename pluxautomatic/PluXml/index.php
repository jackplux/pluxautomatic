<?php
define('PLX_ROOT', './');
define('PLX_CORE', PLX_ROOT.'core/');
include(PLX_ROOT.'config.php');
include(PLX_CORE.'lib/config.php');

# On verifie que PluXml est installÃ©
if(!file_exists(path('XMLFILE_PARAMETERS'))) {
	header('Location: '.PLX_ROOT.'install.php');
	exit;
}

# On dÃ©marre la session
session_start();

# On inclut les librairies nÃ©cessaires
include(PLX_CORE.'lib/class.plx.date.php');
include(PLX_CORE.'lib/class.plx.glob.php');
include(PLX_CORE.'lib/class.plx.utils.php');
include(PLX_CORE.'lib/class.plx.capcha.php');
include(PLX_CORE.'lib/class.plx.erreur.php');
include(PLX_CORE.'lib/class.plx.record.php');
include(PLX_CORE.'lib/class.plx.motor.php');
include(PLX_CORE.'lib/class.plx.feed.php');
include(PLX_CORE.'lib/class.plx.show.php');
include(PLX_CORE.'lib/class.plx.encrypt.php');
include(PLX_CORE.'lib/class.plx.plugins.php');

# Creation de l'objet principal et lancement du traitement
$plxMotor = plxMotor::getInstance();

# Hook Plugins
eval($plxMotor->plxPlugins->callHook('Index'));

$plxMotor->prechauffage();
$plxMotor->demarrage();

# Creation de l'objet d'affichage
$plxShow = plxShow::getInstance();

eval($plxMotor->plxPlugins->callHook('IndexBegin'));

# On dÃ©marre la bufferisation
ob_start();
ob_implicit_flush(0);

# Traitements du thÃšme
if($plxMotor->style == '' or !is_dir(PLX_ROOT.$plxMotor->aConf['racine_themes'].$plxMotor->style)) {
	header('Content-Type: text/plain; charset='.PLX_CHARSET);
	echo L_ERR_THEME_NOTFOUND.' ('.PLX_ROOT.$plxMotor->aConf['racine_themes'].$plxMotor->style.') !';
} elseif(file_exists(PLX_ROOT.$plxMotor->aConf['racine_themes'].$plxMotor->style.'/'.$plxMotor->template)) {
	# On impose le charset
	header('Content-Type: text/html; charset='.PLX_CHARSET);
	# Insertion du template
	include(PLX_ROOT.$plxMotor->aConf['racine_themes'].$plxMotor->style.'/'.$plxMotor->template);
} else {
	header('Content-Type: text/plain; charset='.PLX_CHARSET);
	echo L_ERR_FILE_NOTFOUND.' ('.PLX_ROOT.$plxMotor->aConf['racine_themes'].$plxMotor->style.'/'.$plxMotor->template.') !';
}

# RÃ©cuperation de la buffÃ©risation
$output = ob_get_clean();

# Hooks spÃ©cifiques au thÃšme
ob_start();
eval($plxMotor->plxPlugins->callHook('ThemeEndHead'));
$output = str_replace('</head>', ob_get_clean().'</head>', $output);
ob_start();
eval($plxMotor->plxPlugins->callHook('ThemeEndBody'));
$output = str_replace('</body>', ob_get_clean().'</body>', $output);

# Hook Plugins
eval($plxMotor->plxPlugins->callHook('IndexEnd'));

# On applique la rÃ©Ã©criture d'url si nÃ©cessaire
if($plxMotor->aConf['urlrewriting']) {
	$output = plxUtils::rel2abs($plxMotor->aConf['racine'], $output);
}

# On applique la compression gzip si nÃ©cessaire et disponible
if($plxMotor->aConf['gzip']) {
	if($encoding=plxUtils::httpEncoding()) {
		header('Content-Encoding: '.$encoding);
		$output = gzencode($output,-1,FORCE_GZIP);
    }
}

# Restitution Ã©cran
echo $output;
exit;
?>
