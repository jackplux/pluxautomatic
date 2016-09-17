<?php

// test pour étudier le script

//  https://openclassrooms.com/forum/sujet/supprimer-contenu-dossier-79922
 



function VideDossier($path){
  $tab = array_slice(scandir($path), 2);
  foreach($tab as $file){
    if(is_dir($path.$file))
      VideDossier($path.$file.'/');
    else
      unlink($path.$file);
  }
  rmdir($path);
}
 
if(isset($_POST['del_dir'])){
  array_map('VideDossier', $_POST['del_dir']);
  echo '<div>Site'.(count($_POST['del_dir']) > 1 ? 's' :'').' supprimé'.(count($_POST['del_dir']) > 1 ? 's' :'').'</div>';

}
 
if(isset($_POST['del_file'])){
  array_map('unlink', $_POST['del_file']);
  echo '<div>Fichier'.(count($_POST['del_file']) > 1 ? 's' :'').' effacé'.(count($_POST['del_file']) > 1 ? 's' :'').'</div>';
}
 
$path = '../../sites/'; // Place bien le slash en fin de ligne
$tab = array_slice(scandir($path), 2);
$liste_dossiers = '<h3>Liste des sites actuels :</h3> <ul>';
//$liste_fichiers = '<h3>Liste des fichiers accessibles :</h3><ul>';
foreach($tab as $file){
  if(is_dir($path.$file))
    $liste_dossiers .= '<li><label><a href="'.$path.''.$file.'"target=_blank><input type="checkbox" name="del_dir[]" value="'.$path.$file.'/" /> '.$file.'</label></li>';
  else
    $liste_fichiers .= '<!--<li><label><input type="checkbox" name="del_file[]" value="'.$path.$file.'" /> '.$file.'</label></li>-->';
}
echo '<form action="" method="post"><div>'.$liste_dossiers.'</ul>'.$liste_fichiers.'</ul></div><div><input type="submit" value="Supprimer" /></div></form>';

// fin test pour étudier le script
?>
