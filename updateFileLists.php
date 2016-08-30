<?php

    function surroundWithQuotes($stringToSurround){
		return "\"".$stringToSurround."\"";
    }


//$listFiles = scandir ( "jstree-v.pre1.0");
//echo $listFiles;

$imageDirectory="image";

$slash="/";
$accOuv="{";
$accFer="}";
$bracOuv="[";
$bracFer="]";
$dirString="\"directory\":";
$filesString="\"files\":";
$pathString="\"path\":";
$nameString="\"name\":";
$comma=",";

$result="fileList='[";

$subDirectoryList = array_diff(scandir($imageDirectory), array('..', '.'));


$numSubDirectory = count($subDirectoryList);
$i = 0;

foreach ($subDirectoryList as $subDirectory) {
	
	$result=$result.$accOuv.$dirString.surroundWithQuotes($subDirectory).$comma.$filesString.$bracOuv;
	
    //echo $subDirectory;    
	$subfilePath = $imageDirectory.$slash.$subDirectory;
	//echo $subfilePath;
	// normalement c'est un répertoire
	if(is_dir( $subfilePath ))
	{
		$fileList = array_diff(scandir($subfilePath), array('..', '.'));
		
		$numFile = count($fileList);
		$j = 0;
		foreach ($fileList as $file) {
			$result=$result.$accOuv.$pathString.surroundWithQuotes($subfilePath.$slash.$file).$comma.$nameString.surroundWithQuotes($subDirectory).$accFer;
			
			
			if(++$j !== $numFile) {
				$result=$result.$comma;
				}
			
			//echo $subfilePath.$slash.$file;
			//echo "<br>";
		}
	}
	//echo "<br>";
	
	$result=$result.$bracFer.$accFer;
		if(++$i !== $numSubDirectory) {
		$result=$result.$comma;
		}
}



$result=$result."]'";
echo $result;

$writeResult = file_put_contents( "scripts/list_files.json" , $result );

if($writeResult != 0)
{
	echo "La liste de fichier a été mise à jour."
}
else
{
	echo "Erreur lors de l'écriture du fichier de liste d'image."
}


?>
