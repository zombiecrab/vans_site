<?php 
require("../config.php"); 
// we first include the upload class, as we will need it here to deal with the uploaded fileinclude_once'class.upload.php';
$searchPath      = '../../gallery';$finalPath       = '../gallery';$finalPathThumbs = '../gallery/thumbs';
function getImageLocationArray($searchLocation) {
	$filesFinal = array();    $files = scandir($searchLocation);    //remove the . and .. files    unset($files[0]);    unset($files[1]);    $prefix = sprintf('%s%s',$searchLocation,'/');    foreach ($files as $file) {		if (strpos($file, 'thumbs') === false ) {        	$filesFinal[] = sprintf('%s%s',$prefix,$file);		}    }    return ($filesFinal);
}function cleanLocationArray($locations){	unset($locations[0]);    unset($locations[1]);		return $locations;}function removeDups($workingLocations) {	global $finalPath;		$tempFiles = array();		$preExistinfLocationFileNames = scandir($finalPath);	$preExistinfLocationFileNames = cleanLocationArray($preExistinfLocationFileNames);		foreach ($workingLocations as $workLoc) {		$allgood = TRUE;		foreach ($preExistinfLocationFileNames as $preFile){			if (strpos($workLoc, $preFile) !== FALSE){				$allgood = FALSE;			}		}		if ($allgood) {			$tempFiles[] = $workLoc;		}	}		return $tempFiles;}
$locations = getImageLocationArray($searchPath);$locations = removeDups($locations);/**$files = array();
foreach ($_FILES['my_field'] as $k => $l) {
    foreach ($l as $i => $v) {
        if (!array_key_exists($i, $files)) 
            $files[$i] = array();
        $files[$i][$k] = $v;
    }
}**/

foreach ($locations as $file) {
	// we instanciate the class for each element of $file
    $handle = new Upload($file);
	if ($handle->uploaded) {
		$handle->Process($finalPath);
        // we check if everything went OK
        if ($handle->processed) {
		 	printf("Processed <a href=\"%s/%s\" >%s</a><br>", $finalPath, $handle->file_dst_name, $handle->file_dst_name);
		} else {
			echo "meh" . $handle->file_dst_name . "\n";
		}
		$handle->image_resize          = true;
		$handle->image_x               = 100;
		$handle->image_y               = 100;
		$handle->jpeg_quality		   = 95;		
        $handle->Process($finalPathThumbs);
        // we check if everything went OK
        if ($handle->processed) {
		 	printf("Processed <a href=\"%s/%s\" >%s(thumb)</a><br>", $finalPathThumbs, $handle->file_dst_name, $handle->file_dst_name);
		} else {
			echo "meh" . $handle->file_dst_name . "\n";
		}
	}
}