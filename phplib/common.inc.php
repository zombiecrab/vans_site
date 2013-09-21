<?php

function getImageLocationArrayOrig($searchLocation) {
    $filesFinal = array();
    $files = scandir($searchLocation);
    //remove the . and .. files
    unset($files[0]);
    unset($files[1]);
    
    $prefix = sprintf('%s%s',$searchLocation,'/');
    
    foreach ($files as $file) {
        $filesFinal[] = sprintf('%s%s',$prefix,$file);
    }
    
    return ($filesFinal);
}

function getImageLocationArray($searchLocation) {
	$prefix = sprintf('%s%s',$searchLocation,'/');
	$filesFinal = array();
	
	if ($dh = opendir($searchLocation)) {
		while (($file = readdir($dh)) !== false) {
			if ($file == "." || $file == "..") continue;
			
			 $filesFinal[] = sprintf('%s%s',$prefix,$file);
		}	   
	}
	
	return $filesFinal;
}

function getImageDimesionsArray($path) {
    list($width, $height, $type, $attr) = getimagesize($path);
    $rtn = array("width" => $width, "height" => $height);
    return $rtn;
}
?>