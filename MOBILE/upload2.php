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

	// switch ($mimeType) {
	// 	case 'image/png':
	// 	$file_exe = "png";
	// 	break;
	// 	default:
	// 	$file_exe = "jpg";
	// 	break;
	// }

	$real_name = $file_name;
	$arr = explode(".", $real_name);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe	
	$arr1 = $arr[0];
	$arr2 = $arr[1];
	$arr3 = $arr[2];
	$arr4 = $arr[3];
	if($arr4) {
		$file_exe = $arr4;
	} else if($arr3 && !$arr4) {
		$file_exe = $arr3;
	} else if($arr2 && !$arr3) {
		$file_exe = $arr2;
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

	if(!move_uploaded_file($file_tmp_name, $save_full_path)){
		die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
	}else{
		$targ_w = $imageSize[0];
		$targ_h = $imageSize[1];
		$image_quality = 80;
		$result_filename = $save_full_path;
		$original_src = $save_full_path;

		if($mimeType == "image/png"){
			$img_r = imagecreatefrompng($original_src);
		}else{
			$img_r = imagecreatefromjpeg($original_src);
		}

		$dst_r = ImageCreateTrueColor($targ_w, $targ_h);
		imagecopyresampled($dst_r,$img_r,0,0,0,0,
		$targ_w,$targ_h,$targ_w,$targ_h);
		imagejpeg($dst_r, $result_filename, $image_quality);
		imagedestroy($dst_r);

	}
	echo $result_filename;
?>