<?php
		// print_r($_POST);
	
		$targ_x = $_POST['x'];
		$targ_y = $_POST['y'];
		$targ_x2 = $_POST['x2'];
		$targ_y2 = $_POST['y2'];
		$targ_w = $_POST['w'];
	  $targ_h = $_POST['h'];
		$jpeg_quality = 90;
		$output_filename= "../lib/Jcrop/css/after.jpg";

		$src = "../lib/Jcrop/css/picture.jpg";
		$img_r = imagecreatefromjpeg($src);
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		imagecopyresampled($dst_r,$img_r,0,0,$targ_x,$targ_y,
		$targ_w,$targ_h,$targ_w,$targ_h);

		// header('Content-type: image/jpeg');
		imagejpeg($dst_r, $output_filename, $jpeg_quality);

?>