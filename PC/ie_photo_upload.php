<?php

		// print_r($_POST);

	  	$targ_src = $_POST['ieImageSrc'];
	  	$img_info = getimagesize($targ_src);
		$targ_w = $img_info[0];
	  	$targ_h = $img_info[1];
	  	$targ_dir = "./images/";
		$jpeg_quality = 85;
		$src = $targ_src;
		if($img_info[mime]=="image/jpeg"){
			$img_exe = ".jpg";
			$img_r = imagecreatefromjpeg($src);
		}else if($img_info[mime]=="image/png"){
			$img_exe = ".png";
			$img_r = imagecreatefrompng($src);
		}
		$output_filename = $targ_dir."pre".time().$img_exe;

		// print_r($img_info);
		$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

		imagecopyresampled($dst_r,$img_r,0,0,0,0,
		$targ_w,$targ_h,$targ_w,$targ_h);

		// header('Content-type: image/jpeg');
		imagejpeg($dst_r, $output_filename, $jpeg_quality);
		// imagejpeg($dst_r, null, $jpeg_quality);
		imagedestroy($dst_r);

		echo $output_filename;

?>