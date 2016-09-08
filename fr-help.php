<?php if(!defined('PLX_ROOT')) exit; ?>

<h2>Aide</h2>

Le principe du plugin plux-automatic est de copier une archive dans un répertoire nommé "sites" qui se trouve à la racine de votre site (et non de votre hébergement).<br /><br />

Grâce au plugin, vous donnerez un nom à vos sites de test (toujours un seul mot), pourrez les supprimer quand vous n'en aurez plus besoin et même purger tout le répertoire "sites" d'un seul clic. Tout le reste se fait tout seul. ;)<br /><br />

<strong>Problème connu</strong><br /><br />

-->  Le rafraichissement de la page de création de sites (creation.php) provoque l'installation d'un pluxml neuf dans le dossier sites mais ce n'est pas grave du tout sinon que vous pourrez voir ses répertoires dans l'administration de<strong> Pluxautomatic</strong> à la rubrique<strong> "Ci dessous, la liste des sites créés"</strong>.<br />

Ils seront supprimés à la prochaine purge de ce répertoire.

<p>-->  Pour des questions de sécurité, il est avantageux de renommer certains fichiers </p>

Par exemple, la purge du dossier "sites" se fait grâce au fichier "vider.php" à la racine de votre Pluxml et n'importe qui sachant que vous utilisez ce plugin peut purger à votre place.<br />
La combine (en attendant de trouver mieux) est donc de renommer ce fichier mais pensez à modifier aussi /plugins/pluxautomatic/admin.php à la ligne...<br />


<p>../../vider.php"target=_blank>PURGER !</a></p>


<strong>Le gestionnaire de fichiers.</strong>

Pour des raisons de <strong>sécurité</strong>, le gestionnaire de fichiers vous demandera une identification à chaque session pour éviter que des petits malins gèrent vos sites de test à votre place.<br /><br />

Le login et le mot de passe par défaut sont "testov" et "testov"<br /><br />

Vous pouvez changer ces identifiants et procéder à divers réglages du gestionnaire en éditant le fichier /sites/index-ex.php et en remplaçant ces valeurs vers la ligne 163 qui raconte...<br /><br />

<em><//$_CONFIG['users'] = array();<br />
$_CONFIG['users'] = array(array("testov", "testov", "admin"));</em><br /><br />

A la ligne 240,vous pouvez renseigner votre propre @mail pour recevoir une notification quand un fichier sera téléchargé sur votre site.<br /><br />

<em>$_CONFIG['upload_email'] = "votre émail@truc.com";</em><br /><br />

Le reste du gestionnaire de fichier est déjà configuré mais vous pouvez regarder <strong>les opportunités qu'il offre</strong> et qui ne sont pas toutes activées.

<p> Je vous souhaite de trés bons tests et bon vent. :)</p>





