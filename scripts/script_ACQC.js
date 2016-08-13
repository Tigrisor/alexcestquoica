function initCategoryNumberArray(categoryArrayLength)
{
	categoryNumberArray = [];
	
	for(i=0; i<categoryArrayLength; i++)
	{
		categoryNumberArray.push(i);
	}
	
	return categoryNumberArray;
}

function displayRandomPicture(categoryNumberArray, categoryArray) {
	
	if(categoryNumberArray.length == 0)
	{
		categoryNumberArray = initCategoryNumberArray(categoryArray.length);
	}
	
	// on détermine au hasard un index dans le tableau des numéros de catégories
	var randomIndexNumber = Math.floor(Math.random() * categoryNumberArray.length);	
	// on récupère le numéro de la catégorie a utiliser
	var categoryNumber = categoryNumberArray[randomIndexNumber];
	// on récupère la liste des fichier associés a la catégorie
	var filesList = categoryArray[categoryNumber].files;
	// on détermine au hasard le numéro du fichier a utiliser
	var randomFileNumber=Math.floor(Math.random() * filesList.length);		
	// on affiche le fichier correspondant au numéro
	$("#label").text(filesList[randomFileNumber].name);
	$("#picture").attr("src",filesList[randomFileNumber].path); 
	
	// on supprime le numéro de catégorie utilisé pour ne pas le retrouver au prochain passage
	categoryNumberArray.splice(randomIndexNumber, 1);	
	// on retourne le tableau
	return categoryNumberArray;
}

function clickHandler() {	

	//var categoryNumberArray = [];

	categoryNumberArray = displayRandomPicture(categoryNumberArray, categoryArray);
	/*
	var randomCategoryNumber=Math.floor(Math.random() * categoryArray.length);
	
	var filesList = categoryArray[randomCategoryNumber].files;
	
	var randomFileNumber=Math.floor(Math.random() * filesList.length);
	
	$("#label").text(filesList[randomFileNumber].name);
	$("#picture").attr("src",filesList[randomFileNumber].path);  
*/	
}

var categoryNumberArray = [];

// a voir si utiliser directement la variable fileList marcherait
// si on enlevait les quotes dans le fichier
var categoryArray = JSON.parse(fileList);

// *** partie nettoyage ***

//on enlève 1 élément a l'index 0
categoryArray.splice(0, 1);

for (i = 0; i < categoryArray.length; i++) {	  
	//on enlève 1 élément a l'index 0 pour chaque élément
	categoryArray[i].files.splice(0, 1);
}  

// *** partie mise a plat ***
/*
var fileInfoArray = new Array();

for (i = 0; i < fileInfoArrayRaw.length; i++) {	  
	for (j = 0; j < fileInfoArrayRaw[i].files.length; j++) {	  	  
		fileInfoArray.push(fileInfoArrayRaw[i].files[j]);	  
	}
}  
*/

window.onload = clickHandler;