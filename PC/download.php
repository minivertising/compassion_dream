<?php
		//print_r($_POST);
	
		$targ_x = $_POST['x'];
		$targ_y = $_POST['y'];
		$targ_x2 = $_POST['x2'];
		$targ_y2 = $_POST['y2'];
		$targ_w = 1200;
	  	$targ_h = 630;
		$jpeg_quality = 90;
		$output_filename = "./after.jpg";

		$src = "./images/picture.jpg";
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

		// imagecopyresampled($dst_r,$img_r,0,0,$targ_x,$targ_y,
		// $targ_w,$targ_h,$targ_w,$targ_h);
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
		$targ_w,$targ_h,$_POST['w'],$_POST['h']);

		header('Content-type: image/jpeg');
		imagejpeg($dst_r, $output_filename, $jpeg_quality);
		// imagejpeg($dst_r, null, $jpeg_quality);
		imagedestroy($dst_r);

?>