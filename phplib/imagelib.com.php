<?php
include 'common.inc.php'; 

$thumb_width = 224;
$thumb_height = 224;

$inDir = "../gallery";
$outDir = "./testout";

function getFilesToParse($inDir, $outDir){
	$inFiles = getImageLocationArrayOrigArray($inDir);
	$exsitingOutfiles = getImageLocationArrayOrigArray($outDir);
	$inFilesToParse = array();
	foreach ($inFiles as $i => $inFile) {
		foreach ($exsitingOutfiles as $j => $exsitingOutfile) {
			if(strpos($inFile["filename"], $exsitingOutfile["filename"]) !== false){
				continue;
			}
			
		}
		$inFilesToParse[] = $inFile;
	}

	return $inFilesToParse;
}

$inFiles = getImageLocationArrayOrigArray($inDir);

foreach ($inFiles as $index => $inFile) {
	$image = imagecreatefromjpeg($inFile["path"]);

	$width = imagesx($image);
	$height = imagesy($image);

	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if ( $original_aspect >= $thumb_aspect )
	{
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	}
	else
	{
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

	// Resize and crop
	imagecopyresampled($thumb,
	                   $image,
	                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
	                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
	                   0, 0,
	                   $new_width, $new_height,
	                   $width, $height);
	imagejpeg($thumb, $outDir.'/'.$inFile['filename'], 80);
	echo '<p><strong>Parsed file: '.$outDir.'/'.$inFile['filename'].'</strong></p>';
}


?>