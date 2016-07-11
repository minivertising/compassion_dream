<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "insert_tracking_info" :
		$log_query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$_SESSION['ss_media']."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$log_result		= mysqli_query($my_db, $log_query);

		if ($log_result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;
	break;
	case "insert_share_info" :
		$sns_media		= $_REQUEST['sns_media'];
		$mb_serial		= $_REQUEST['mb_serial'];
		$mb_gubun	= $_REQUEST['mb_gubun'];

		$query 		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, inner_media, sns_regdate) values('".$sns_media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

		if ($mb_gubun == "act")
		{
			$mb_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$mb_serial."'";
			$mb_result 	= mysqli_query($my_db, $mb_query);
			$mb_data	= mysqli_fetch_array($mb_result);

			$ch_query 	= "UPDATE ".$_gl['child_info_table']." SET ch_choice='S' WHERE idx='".$mb_data['mb_child']."'";
			$ch_result 	= mysqli_query($my_db, $ch_query);

			$a_query 	= "UPDATE ".$_gl['activator_info_table']." SET shareYN='Y' WHERE mb_serial='".$mb_serial."'";
			$a_result 	= mysqli_query($my_db, $a_query);

			$dupli_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_phone='".$mb_data['mb_phone']."'";
			$dupli_result 	= mysqli_query($my_db, $dupli_query);
			while($dupli_data	= mysqli_fetch_array($dupli_result))
			{
				if ($dupli_data['mb_lms'] == "Y")
				{
					$dupli_flag	= "Y";
					break;
				}else{
					$dupli_flag	= "N";
				}
			}

			if ($dupli_flag == "N")
				send_lms($mb_data['mb_phone'], $mb_serial);

		}else{
			$f_query 	= "UPDATE ".$_gl['follower_info_table']." SET shareYN='Y' WHERE mb_serial='".$mb_serial."'";
			$f_result 	= mysqli_query($my_db, $f_query);

		}


		if ($result)
			$flag = "Y";
		else
			$flag = "N";

		echo $flag;

	break;

	case "insert_info" :
		$mb_name			= $_REQUEST['mb_name'];
		$mb_phone			= $_REQUEST['mb_phone'];
		$mb_job				= $_REQUEST['mb_job'];
		$mb_job_kor			= $_REQUEST['mb_job_kor'];
		//$mb_serial			= $_REQUEST['mb_serial'];
		$mb_image			= $_REQUEST['mb_image'];
		$media				= $_SESSION['ss_media'];

		$dupli_query 	= "SELECT mb_child FROM ".$_gl['activator_info_table']." WHERE mb_phone='".$mb_phone."'";
		$dupli_result 	= mysqli_query($my_db, $dupli_query);
		while ($dupli_data = mysqli_fetch_array($dupli_result))
		{
			$dupli_arr[]	= $dupli_data['mb_child'];
		}
		//$dupli_data		= mysqli_fetch_array($dupli_result);

		$mb_serial	= create_serial("activator", null);
		if ($dupli_arr)
		{
			$i = 0;
			foreach($dupli_arr as $key => $val)
			{
				// 이벤트 참여한적이 있을 경우
				$ch_query 	= "SELECT * FROM ".$_gl['child_info_table']." WHERE idx='".$val."'";
				$ch_result 	= mysqli_query($my_db, $ch_query);
				$ch_data		= mysqli_fetch_array($ch_result);
				$check_choice	= false;
				if ($ch_data['ch_choice'] == "Y")
				{
					$check_choice	= true;
				}else{
					$check_choice	= false;
					break;
				}
				$i++;
			}

			// 이벤트 참여한적이 있을 경우
			//$ch_query 	= "SELECT * FROM ".$_gl['child_info_table']." WHERE idx='".$dupli_data['mb_child']."'";
			//$ch_result 	= mysqli_query($my_db, $ch_query);
			//$ch_data		= mysqli_fetch_array($ch_result);
			if ($check_choice === true)
			{
				// 매칭된 아이가 결연 되었을 경우
				$child_info	= matching_child($mb_job);

				$child_arr	= explode("||",$child_info);

				$cName_post_position = has_batchim($child_arr[2]); //아이 이름 받침 유무 검사 0 or 0보다 큰 정수 리턴
				$job_post_position = has_batchim($mb_job_kor); //직업 받침 유무 검사 0 or 0보다 큰 정수 리턴

				$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_name,mb_phone,mb_job,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_job."','".$child_arr[0]."','".$mb_image."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
				$result 	= mysqli_query($my_db, $query);

				if ($result)
					$flag	= "Y||".$child_arr[1]."||".$mb_serial."||".$child_arr[2]."||".$child_arr[3]."||".$cName_post_position."||".$job_post_position."||".$child_arr[4];
				else
					$flag	= "N||fail||N";

			}else{
				// 매칭된 아이가 결연 되지 않았을 경우
				$cName_post_position = has_batchim($ch_data['ch_nick']);
				$job_post_position = has_batchim($mb_job_kor);

				$flag	= "C||".$ch_data['ch_full_img_url']."||".$mb_serial."||".$ch_data['ch_nick']."||".$ch_data['ch_nation_name']."||".$cName_post_position."||".$job_post_position;

				$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_name,mb_phone,mb_job,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_job."','".$ch_data['idx']."','".$mb_image."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
				$result 	= mysqli_query($my_db, $query);
			}
		}else{
			// 이벤트 참여한적이 없을 경우
			$child_info	= matching_child($mb_job);

			$child_arr	= explode("||",$child_info);

			$cName_post_position = has_batchim($child_arr[2]); //아이 이름 받침 유무 검사 0 or 0보다 큰 정수 리턴
			$job_post_position = has_batchim($mb_job_kor); //직업 받침 유무 검사 0 or 0보다 큰 정수 리턴

			$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_name,mb_phone,mb_job,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_job."','".$child_arr[0]."','".$mb_image."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
			$result 	= mysqli_query($my_db, $query);

			if ($result)
				$flag	= "Y||".$child_arr[1]."||".$mb_serial."||".$child_arr[2]."||".$child_arr[3]."||".$cName_post_position."||".$job_post_position."||".$child_arr[4];
			else
				//$flag	= "N||fail||N||N||N";
				$flag	= $query;
		}
		echo $flag;
	break;

	case "url_info" :
		$mb_serial			= $_REQUEST['mb_serial'];
		$ugu					= $_REQUEST['ugu'];

		if ($ugu	== "act")
		{
			$img_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$mb_serial."'";
		}else{
			$img_query 	= "SELECT * FROM ".$_gl['follower_info_table']." WHERE mb_serial='".$mb_serial."'";
		}
		$img_result 	= mysqli_query($my_db, $img_query);
		$img_data	= mysqli_fetch_array($img_result);
		$img_url		= str_replace("..","http://mydream.compassion.or.kr",$img_data['mb_image']);

		echo $img_url;
	break;

    case "input_follower_IE" :

        $ori_data		= $_REQUEST['crop_image_url'];
        $mb_child		= $_REQUEST['mb_child'];
        $mb_job			= $_REQUEST['mb_job'];
		$mb_job_kor			= $_REQUEST['mb_job_kor'];
        $parent_idx		= $_REQUEST['parent_idx'];
        $rs				= $_REQUEST['rs'];
        $cropboxData	= $_REQUEST['cropboxData'];
        $path_parts = pathinfo($ori_data);
        $file_ext = $path_parts['extension'];
        $data = "./PC/tmp_images/".$path_parts['basename'];
        $file_time = date("YmdHis"); 
        $file_Name = "compassion_".$file_time;   // 실제 업로드 될 파일명 생성 (본인이 원하는 파일명 지정 가능)  
        $change_file_name = $file_Name;          // 변경된 파일명을 변수에 지정 
        //$real_name = addslashes($real_name);      // 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
        //$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
        $save_dir = './files/'.date("Ymd").'/';

        // 폴더 존재 여부 확인 후 존재하지 않으면 폴더 생성
        if ( !is_dir($save_dir) ) {
            if(mkdir($save_dir, 0777)) { 
                if(is_dir($save_dir)) { 
                    chmod($save_dir, 0777); 
                }
            }
        }

		$job_post_position = has_batchim($mb_job_kor); //직업 받침 유무 검사 0 or 0보다 큰 정수 리턴

        $dest_url = $save_dir . $change_file_name.'.jpg';
      
        $vImg = imagecreatefromjpeg($data);

        // create a new true color image
        $vDstImg = Imagecreatetruecolor(1200,630);

        // copy and resize part of an image with resampling
        imagecopyresampled($vDstImg, $vImg, 0, 0, $cropboxData['x'], $cropboxData['y'],
         1200, 630, $cropboxData['width'], $cropboxData['height']);

        // output image to file
        $saveYN = imagejpeg($vDstImg, $dest_url, 85);
        // @unlink($dest_url);
        imagedestroy($vDstImg);
        // echo $sResultFileName;
        // echo $dest_url;
        if($saveYN == false){
            die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
        }else{
            $mb_serial  = create_serial("follower",$rs);
            $dest_url   = ".".$dest_url;
			$exif = exif_read_data($dest_url);
			print_r($exif);
            $query  = "INSERT INTO ".$_gl['follower_info_table']."(mb_ipaddr,mb_job,parent_idx,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_job."','".$parent_idx."','".$mb_child."','".$dest_url."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
            $result     = mysqli_query($my_db, $query);

            if ($result)
            {
                if ($mb_child == "")
                    $flag   = "N||".$mb_serial."||".$job_post_position;
                else
                    $flag   = "Y||".$mb_serial."||".$job_post_position;
            }else{
                $flag   = "E||null||null";
            }
            echo $flag;
        }
        
    break;

	case "input_follower" : 
		$data			= $_REQUEST['canvasurl'];
		$mb_child	= $_REQUEST['mb_child'];
		$mb_job		= $_REQUEST['mb_job'];
		$parent_idx	= $_REQUEST['parent_idx'];
		$rs			= $_REQUEST['rs'];
		$mb_job_kor			= $_REQUEST['mb_job_kor'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

		$file_time = date("YmdHis"); 
		$file_Name = "compassion_".$file_time;	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)	 
		$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
		//$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
		//$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
		$save_dir = './files/'.date("Ymd").'/';

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
		$job_post_position = has_batchim($mb_job_kor); //직업 받침 유무 검사 0 or 0보다 큰 정수 리턴


		//mkdir($_SERVER['DOCUMENT_ROOT'] . "/photos");

		//file_put_contents($dest_url, $data);
		if (!file_put_contents($dest_url, $data))
		{
			die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
		}else{
			// 이미지 로테이트 
			//$ori_images	= str_replace("..",".",$dest_url);
			//$image = imagecreatefromjpeg($dest_url) or die('Error opening file '.$dest_url);
			//$exif = exif_read_data($dest_url);

			$mb_serial	= create_serial("follower",$rs);
			$dest_url	= ".".$dest_url;
			$query 	= "INSERT INTO ".$_gl['follower_info_table']."(mb_ipaddr,mb_job,parent_idx,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_job."','".$parent_idx."','".$mb_child."','".$dest_url."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
			$result 	= mysqli_query($my_db, $query);

			if ($result)
			{
				if ($mb_child == "")
					$flag	= "N||".$mb_serial."||".$job_post_position;
				else
					$flag	= "Y||".$mb_serial."||".$job_post_position;
			}else{
				$flag	= "E||null||null";
			}

			echo $flag;
		}

	break;

    case "input_image_IE" :
        $ori_data = $_REQUEST['crop_image_url'];
        $mb_job = $_REQUEST['mb_job'];
        $cropboxData = $_REQUEST['cropboxData'];
        $path_parts = pathinfo($ori_data);
        $file_ext = $path_parts['extension'];
        $data = "./PC/tmp_images/".$path_parts['basename'];
        $file_time = date("YmdHis"); 
        $file_Name = "compassion_".$file_time;   // 실제 업로드 될 파일명 생성 (본인이 원하는 파일명 지정 가능)  
        $change_file_name = $file_Name;          // 변경된 파일명을 변수에 지정 
        //$real_name = addslashes($real_name);      // 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
        //$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
        $save_dir = './files/'.date("Ymd").'/';

        // 폴더 존재 여부 확인 후 존재하지 않으면 폴더 생성
        if ( !is_dir($save_dir) ) {
            if(mkdir($save_dir, 0777)) { 
                if(is_dir($save_dir)) { 
                    chmod($save_dir, 0777); 
                }
            }
        }

        $dest_url = $save_dir . $change_file_name.'.jpg';
      
        $vImg = imagecreatefromjpeg($data);

        // create a new true color image
        $vDstImg = Imagecreatetruecolor(1200,630);

        // copy and resize part of an image with resampling
        imagecopyresampled($vDstImg, $vImg, 0, 0, $cropboxData['x'], $cropboxData['y'],
         1200, 630, $cropboxData['width'], $cropboxData['height']);

        // output image to file
        $saveYN = imagejpeg($vDstImg, $dest_url, 85);
        // @unlink($dest_url);
        imagedestroy($vDstImg);
        // echo $sResultFileName;
        // echo $dest_url;
        if($saveYN == false){
            die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
        }else{
            $matching_childYN   = match_YN_child();
            $dest_url   = ".".$dest_url;

            if ($matching_childYN > 0)
            {
                // 매칭될 아이가 있을 경우
                $flag   = "Y||".$dest_url."||null";

            }else{
                // 매칭될 아이가 없을 경우
                $mb_serial  = create_serial("activator",null);
                $query  = "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_job,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_job."','".$dest_url."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
                $result     = mysqli_query($my_db, $query);

                if ($result)
                    $flag   = "N||".$dest_url."||".$mb_serial;
                else
                    $flag   = "E||null||null";
            }
            echo $flag;
        }

    break;

    case "input_image" :
        $data           = $_REQUEST['crop_image_url'];
        $mb_job     = $_REQUEST['mb_job'];
		$media				= $_SESSION['ss_media'];

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

		$file_time = date("YmdHis"); 
		$file_Name = "compassion_".$file_time;	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)	 
		$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
		//$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
		//$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
		$save_dir = './files/'.date("Ymd").'/';

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


		if (!file_put_contents($dest_url, $data))
		{
			print_r($data);
			die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
		}else{
			$matching_childYN	= match_YN_child();
			$dest_url	= ".".$dest_url;

			if ($matching_childYN > 0)
			{
				// 매칭될 아이가 있을 경우
				$flag	= "Y||".$dest_url."||null";

			}else{
				// 매칭될 아이가 없을 경우
				$mb_serial	= create_serial("activator",null);
				$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_job,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_job."','".$dest_url."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
				$result 	= mysqli_query($my_db, $query);

				if ($result)
					$flag	= "N||".$dest_url."||".$mb_serial;
				else
					$flag	= "E||null||null";
			}

			echo $flag;
		}

	break;

    case "state_input_image" :
		$data				= $_REQUEST['crop_image_url'];
		$mb_job			= $_REQUEST['mb_job'];
		$mb_name		= $_REQUEST['mb_name'];
		$mb_phone	= $_REQUEST['mb_phone'];
		$mb_child		= $_REQUEST['mb_child'];
		$media			= $_SESSION['ss_media'];

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);

		$file_time = date("YmdHis"); 
		$file_Name = "compassion_".$file_time;	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)	 
		$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
		//$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
		//$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)
		$save_dir = './files/'.date("Ymd").'/';

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


		if (!file_put_contents($dest_url, $data))
		{
			print_r($data);
			die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
		}else{
			$dest_url	= ".".$dest_url;

			$mb_serial	= create_serial("activator",null);

			$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_job,mb_name,mb_phone,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_job."','".$mb_name."','".$mb_phone."','".$mb_child."','".$dest_url."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
			$result 	= mysqli_query($my_db, $query);

			if ($result)
				$flag	= "Y||".$dest_url."||".$mb_serial;
			else
				$flag	= "E||null||null";


			echo $flag;
		}

	break;

	case "insert_share_cnt" :
		$serial			= $_REQUEST['serial'];
		$ugu				= $_REQUEST['ugu'];
		$parent_idx		= $_REQUEST['parent_idx'];

		$result	= ins_share_cnt($serial, $ugu,$parent_idx);
		echo $result;
	break;
}
?>