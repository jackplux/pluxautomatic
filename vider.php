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

<p><strong>C'est fait. :)<br /><br />
Votre dossier "sites" a subi une purge et est maintenant vide. </p>
Vous avez fait de la place sur votre serveur.</strong>


    </div>





</body>
<html>

<?php



//-exemple-//
RepEfface('sites');

function RepEfface($dir)
{
    $handle = opendir($dir);
    while($elem = readdir($handle)) //ce while vide tous les repertoire et sous rep
    {
		if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.') //si c'est un repertoire
        {
			RepEfface($dir.'/'.$elem);
		}
		else
		{
			if(substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.')
			{
				unlink($dir.'/'.$elem);
			}
		}
			
	}
	
	$handle = opendir($dir);
	while($elem = readdir($handle)) //ce while efface tous les dossiers
	{
		if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.') //si c'est un repertoire
        {
			RepEfface($dir.'/'.$elem);
			rmdir($dir.'/'.$elem);
		}	
	
	}
	rmdir($dir); //ce rmdir eface le repertoire principale
}
?>

<?php
//recreer sites
$dir_dest = "sites";
$dir_source = 'boite';


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
