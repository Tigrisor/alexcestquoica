<?php
//$listFiles = scandir ( "jstree-v.pre1.0");
//echo $listFiles;

$imageDirectory="image";
$slash="/";

$subDirectoryList = array_diff(scandir($imageDirectory), array('..', '.'));

foreach ($subDirectoryList as $subDirectory) {
    //echo $subDirectory;    
	$subfilePath = $imageDirectory.$slash.$subDirectory;
	//echo $subfilePath;
	// normalement c'est un répertoire
	if(is_dir( $subfilePath ))
	{
		$fileList = array_diff(scandir($subfilePath), array('..', '.'));
		foreach ($fileList as $file) {
			echo $subfilePath.$slash.$file;
			echo "<br>";
		}
	}
	
	
	echo "<br>";
} 
?>
