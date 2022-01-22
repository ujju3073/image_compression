<?php 
function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}


$files = glob('*.{jpg,png,gif,jpeg}', GLOB_BRACE);//read files from the directory having these extensions
foreach($files as $file) {
	
  	// Store the path of source file
  	$source = 'source.jpg';//source file name
	
	$filesize = filesize($source);//file size in bytes
	$filesize = round($filesize / 1024,0);//file size in Kb
	
  	// Store the path of destination file
	$destination = 'destination.jpg';//destination file name. You can also copy files in other directory.
	
	// directory
	$compress = compress($source, $destination,50);
}



?>