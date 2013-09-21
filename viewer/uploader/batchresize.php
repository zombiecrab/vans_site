<?php 
require("../config.php"); 
// we first include the upload class, as we will need it here to deal with the uploaded file
$searchPath      = '../../gallery';
function getImageLocationArray($searchLocation) {
	$filesFinal = array();
}
$locations = getImageLocationArray($searchPath);
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