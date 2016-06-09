<?php
	// $file = $_FILES['croppedImage'];
	// var_dump($file);
	$file_name = $_FILES['croppedImage']['name'];                // 업로드한 파일명
	$file_tmp_name = $_FILES['croppedImage']['tmp_name'];   // 임시 디렉토리에 저장된 파일명
	$file_size = $_FILES['croppedImage']['size'];                 // 업로드한 파일의 크기
	$mimeType = $_FILES['croppedImage']['type'];                 // 업로드한 파일의 MIME Type

	// 업로드 파일 확장자 검사 (필요시 확장자 추가)
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
	$mimeType=="") { 
		echo("<script> 
		alert('업로드를 할 수 없는 파일형식입니다.'); 
		document.location.href = './lms_index.php';    
		</script>"); 
		exit;
	}

	// 파일명 변경 (업로드되는 파일명을 별도로 생성하고 원래 파일명을 별도의 변수에 지정하여 DB에 기록할 수 있습니다.)
	$real_name = $file_name;     // 원래 파일명(업로드 하기 전 실제 파일명) 
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

	$file_time = date("YmdHis"); 
	$file_Name = "compassion_".$file_time.".".$file_exe;	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)	 
	$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
	$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
	$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
	$save_dir = '../files/'.date("Ymd").'/';

	// 폴더 존재 여부 확인 후 존재하지 않으면 폴더 생성 
	if ( !is_dir($save_dir) ) {
		if(@mkdir($save_dir, 0777)) { 
			if(is_dir($save_dir)) { 
				@chmod($save_dir, 0777); 
			}
		}
	}

	//파일을 저장할 디렉토리 및 파일명 전체 경로
	$dest_url = $save_dir . $change_file_name;

	//파일을 지정한 디렉토리에 업로드
	if(!move_uploaded_file($file_tmp_name, $dest_url))
	{
		die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
	}else{
		// 이미지 리사이징
		//if(GDRealImageResize($FilePath.$RealFileName, $FilePath.$ResizeFileName, $UploadImg["type"])){
		if(GDRealImageResize($dest_url, $save_dir."test", $mimeType)){
			$Extension = ".png";
			switch($mimeType["type"]){
				case "image/jpeg";
					$Extension = ".jpeg";
					break;
				case "image/jpg";
					$Extension = ".jpg";
					break;
				case "image/png";
					$Extension = ".png";
					break;
			}
			$THURL = "test".$Extension;
			$URL = "test".$Extension;
			unlink($dest_url);
			$UploadImgUrl = $THURL;
			print_r($UploadImgUrl);
		}

		echo $dest_url;
		// echo "<meta http-equiv='refresh' content='2; url=./forms2.php'>";
	}


	// DB에 기록할 파일 변수 (DB에 저장이 필요한 경우 아래 변수명을 기록하시면 됩니다.)
	/*
		$change_file_name : 실제 서버에 업로드 된 파일명. 예: file_145736478766.gif
		$real_name : 원래 파일명. 예: 풍경사진.gif 
		$real_size : 파일 크기(byte)
	*/

function GDRealImageResize($src_file, $dst_file, $type, $quality = 1){
	//기본이미지
	global $Extension;
	$MaxH = 190; 
	$MaxW = 248; 
	$ScaleX;
	$ScaleY;
	$NewImagSizeX;
	$NewImagSizeY;
	
	$im = GDImageLoad($src_file, $type);
	
	if(!$im){
		return false ;
	}
	$RealImgX = imagesx($im); //넓이
	$RealImgY = imagesy($im); //높이
	
	//아래에 주석을 포함한 곳에서 이미지 비율을 계산
	$NewImagSizeY = $MaxH;
	$NewImagSizeX = $MaxW;
	/*$NewImagSizeY = $MaxH;
	$NewImagSizeX = (int)(($RealImgX/$RealImgY)*$MaxH);*/
	//$NewImagSizeX = (int)(($RealImgY/$RealImgX)*$MaxH);
	/*$NewImagSizeX = $MaxW;
	$NewImagSizeY = (int)(($RealImgY/$RealImgX)*$MaxW);*/
 
	$im2 = imagecreatetruecolor($NewImagSizeX, $NewImagSizeY);
	imagecopyresized($im2, $im, 0, 0, 0, 0, $NewImagSizeX, $NewImagSizeY, $RealImgX, $RealImgY);
	
	if($type == "image/jpg" || $type == "image/jpeg"){
		imagejpeg($im2, $dst_file.$Extension);
	}else if($type == "image/png"){
		imagepng($im2, $dst_file.$Extension);
		//echo "sus";
	}
	imagedestroy($im);
	imagedestroy($im2);
	return true;
}
?>