<?php
	$data = $_POST['canvasurl'];
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);

	$file_time = date("YmdHis"); 
	$file_Name = "compassion_".$file_time;	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)	 
	$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
	//$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
	//$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
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
	$dest_url = $save_dir . $change_file_name.'.jpg';


	//mkdir($_SERVER['DOCUMENT_ROOT'] . "/photos");

	//file_put_contents($dest_url, $data);
	if (!file_put_contents($dest_url, $data))
	{
		die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
	}else{
		echo $dest_url;
	}

	// die;
?>