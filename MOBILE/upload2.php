<?php
	// $file = $_FILES['croppedImage'];
	// var_dump($file);
	$file_name = $_FILES['croppedImage']['name'];                // 업로드한 파일명
	$file_tmp_name = $_FILES['croppedImage']['tmp_name'];   // 임시 디렉토리에 저장된 파일명
	$file_size = $_FILES['croppedImage']['size'];                 // 업로드한 파일의 크기
	$mimeType = $_FILES['croppedImage']['type'];                 // 업로드한 파일의 MIME Type

	if($mimeType=="html" || 
		$mimeType=="htm" || 
		$mimeType=="php" || 
		$mimeType=="php3" || 
		$mimeType=="inc" || 
		$mimeType=="pl" || 
		$mimeType=="cgi" || 
		$mimeType=="txt" || 
		$mimeType=="TXT" || 
		$mimeType=="asp" || 
		$mimeType=="jsp" || 
		$mimeType=="phtml" || 
		$mimeType=="js" || 
		$mimeType=="") 
	{ 
		echo "X";
		exit;
	}

	switch ($mimeType) {
		case 'image/png':
		$file_exe = "png";
		break;
		default:
		$file_exe = "jpg";
		break;
	}

	$imageSize = getimagesize($file_tmp_name);

	$save_time = date("YmdHis");
	$save_name = "compassion_".$save_time.".".$file_exe;
	$save_path = '../files/'.date("Ymd").'/';

	if ( !is_dir($save_path) ) {
		if(@mkdir($save_path, 0777)) { 
			if(is_dir($save_path)) { 
				@chmod($save_path, 0777); 
			}
		}
	}

	$save_full_path = $save_path.$save_name;

	$result = move_uploaded_file($file_tmp_name, $save_full_path);

	$targ_w = $imageSize[0];
	$targ_h = $imageSize[1];
	$image_quality = 80;
	$result_filename = $save_full_path;

	$original_src = $save_full_path;
	$img_r = imagecreatefrompng($original_src);
	$dst_r = ImageCreateTrueColor($targ_w, $targ_h);

	imagecopyresampled($dst_r,$img_r,0,0,0,0,
		$targ_w,$targ_h,$targ_w,$targ_h);

	// header('Content-type: image/jpeg');
	imagejpeg($dst_r, $result_filename, $image_quality);
	imagedestroy($dst_r);
	?>