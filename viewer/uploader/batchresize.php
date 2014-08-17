<?php 
require("../config.php"); 
// we first include the upload class, as we will need it here to deal with the uploaded file
include_once'class.upload.php';

$searchPath = '../../gallery';

function getImageLocationArray($searchLocation) {
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

$locations = getImageLocationArray($searchPath);

$files = array();
foreach ($_FILES['my_field'] as $k => $l) {
    foreach ($l as $i => $v) {
        if (!array_key_exists($i, $files)) 
            $files[$i] = array();
        $files[$i][$k] = $v;
    }
}

foreach ($locations as $file) {
	// we instanciate the class for each element of $file
    $handle = new Upload($file);
	if ($handle->uploaded) {
		
		$handle->Process('../gallery');
        // we check if everything went OK
        if ($handle->processed) {
		 	echo "Processed <a href=\"../gallery/$handle->file_dst_name\" >" . $handle->file_dst_name . "</a>\n";
		} else {
			echo "meh" . $handle->file_dst_name . "\n";
		}
		
		$handle->image_resize          = true;
		$handle->image_x               = 100;
		$handle->image_y               = 100;
		$handle->jpeg_quality		   = 95;
		
        $handle->Process('../gallery/thumbs');
        // we check if everything went OK
        if ($handle->processed) {
		 	echo "Processed <a href=\"../gallery/thumbs/$handle->file_dst_name\" >" . $handle->file_dst_name . "</a>\n";
		} else {
			echo "meh" . $handle->file_dst_name . "\n";
		}
	}
}