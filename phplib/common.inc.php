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

function getImageLocationArrayOrigArray($searchLocation) {
    $fileArr = array();
    $files = scandir($searchLocation);
    $filesFinal = array();
    
    //remove the . and .. files
    unset($files[0]);
    unset($files[1]);
    
    $fileArr["pathPrefix"] = sprintf('%s%s',$searchLocation,'/');

    foreach ($files as $file) {
        $fileArr["filename"] = $file;
        $fileArr["path"] = sprintf('%s%s',$fileArr["pathPrefix"],$fileArr["filename"]);
        $filesFinal[$fileArr["filename"]] = $fileArr;
    }
    
    return ($filesFinal);
}

function getImageDimesionsArray($path) {
    list($width, $height, $type, $attr) = getimagesize($path);
    $rtn = array("width" => $width, "height" => $height);
    return $rtn;
}
?>