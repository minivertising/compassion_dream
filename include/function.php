<?
	// 유입매체 정보 입력
	function InsertTrackingInfo($media, $gubun)
	{
		global $_gl;
		global $my_db;

		$log_query		= "INSERT INTO ".$_gl['tracking_info_table']."(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$media."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		mysqli_query($my_db, $log_query);

		return $log_query;
	}

	function _microtime()
	{
		return array_sum(explode(' ',microtime())); 
	}

	// 공유 클릭 카운트 함수
	function ins_share_cnt($rs, $ugu)
	{
		global $_gl;
		global $my_db;

		if ($ugu == "act")
		{
			$query			= "UPDATE ".$_gl['activator_info_table']." SET mb_share_cnt=mb_share_cnt+1 WHERE mb_serial='".$rs."'";
			$result			= mysqli_query($my_db, $query);
		}else{
			$query			= "UPDATE ".$_gl['follower_info_table']." SET mb_share_cnt=mb_share_cnt+1 WHERE mb_serial='".$rs."'";
			$result			= mysqli_query($my_db, $query);

			$s_query			= "SELECT parent_idx FROM ".$_gl['serial_info_table']." WHERE serial_code='".$rs."'";
			$s_result			= mysqli_query($my_db, $s_query);
			$s_data			= mysqli_fetch_array($s_result);

			$s_arr				= explode("||",$s_data['parent_idx']);

			$i	= 0;
			foreach($s_arr as $key => $val)
			{
				if ($i > 0)
				{
					$s_query			= "SELECT serial_code FROM ".$_gl['serial_info_table']." WHERE idx='".$val."'";
					$s_result			= mysqli_query($my_db, $s_query);
					$s_data				= mysqli_fetch_array($s_result);
					if ($i == 1)
					{
						$a_query			= "SELECT idx FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$s_data['serial_code']."'";
						$a_result			= mysqli_query($my_db, $a_query);
						$a_data				= mysqli_fetch_array($a_result);

						$p_query			= "UPDATE ".$_gl['activator_info_table']." SET mb_f_share_cnt=mb_f_share_cnt+1 WHERE idx='".$a_data['idx']."'";
						$p_result			= mysqli_query($my_db, $p_query);
					}else{
						$f_query				= "SELECT idx FROM ".$_gl['follower_info_table']." WHERE mb_serial='".$s_data['serial_code']."'";
						$f_result				= mysqli_query($my_db, $f_query);
						$f_data				= mysqli_fetch_array($f_result);

						$p_query			= "UPDATE ".$_gl['follower_info_table']." SET mb_f_share_cnt=mb_f_share_cnt+1 WHERE idx='".$f_data['idx']."'";
						$p_result			= mysqli_query($my_db, $p_query);
					}
				}
				$i++;
			}

		}
		return $a_query;
	}

	// 아이 매칭 로직
	function matching_child($job)
	{
		global $_gl;
		global $my_db;

/*
		// ch_choice = Y = 결연까지 이루어진 아이, S = 공유까지 이루어진 아이, M = 매칭까지 이루어진 아이, N = 공유, 결연이 모두 이루어지지 않은 아이
		$ch_query		= "SELECT * FROM ".$_gl['child_info_table']." WHERE ch_dream='".$job."' AND ch_choice='N' limit 1";
		$ch_result		= mysqli_query($my_db, $ch_query);
		$ch_data		= mysqli_fetch_array($ch_result);

		$choice_query		= "UPDATE ".$_gl['child_info_table']." SET ch_choice='M' WHERE idx='".$ch_data['idx']."'";
		$choice_result		= mysqli_query($my_db, $choice_query);
*/
		// ch_choice = Y = 결연까지 이루어진 아이, S = 공유까지 이루어진 아이, M = 매칭까지 이루어진 아이, N = 공유, 결연이 모두 이루어지지 않은 아이
		$ch_query		= "SELECT * FROM ".$_gl['child_info_table']." WHERE ch_choice='N' limit 1";
		$ch_result		= mysqli_query($my_db, $ch_query);
		$ch_data		= mysqli_fetch_array($ch_result);

		$choice_query		= "UPDATE ".$_gl['child_info_table']." SET ch_choice='M' WHERE idx='".$ch_data['idx']."'";
		$choice_result		= mysqli_query($my_db, $choice_query);

		return $ch_data['idx']."||".$ch_data['ch_full_img_url']."||".$ch_data['ch_nick']."||".$ch_data['ch_nation_name']."||".$ch_data['ch_desc'];
	}

	function sel_child_info($ch_idx)
	{
		global $_gl;
		global $my_db;

		$ch_query 	= "SELECT * FROM ".$_gl['child_info_table']." WHERE idx='".$ch_idx."'";
		$ch_result 	= mysqli_query($my_db, $ch_query);
		$ch_data	= mysqli_fetch_array($ch_result);

		return $ch_data;
	}

	function job_ko_add($engJob)
	{
		if ($engJob == "president")
		{
			// 대통령
			$convert_job	= "대통령";
		}else if ($engJob == "congress"){
			// 국회의원
			$convert_job	= "국회의원";
		}else if ($engJob == "businessman"){
			// 기업가
			$convert_job	= "기업가";
		}else if ($engJob == "teacher"){
			// 교사
			$convert_job	= "교사";
		}else if ($engJob == "singer"){
			// 가수
			$convert_job	= "가수";
		}else if ($engJob == "actor"){
			// 배우
			$convert_job	= "배우";
		}else if ($engJob == "designer"){
			// 디자이너
			$convert_job	= "디자이너";
		}else if ($engJob == "model"){
			// 모델
			$convert_job	= "모델";
		}else if ($engJob == "sportsman"){
			// 운동선수
			$convert_job	= "운동선수";
		}else if ($engJob == "lawyer"){
			// 변호사
			$convert_job	= "변호사";
		}else if ($engJob == "doctor"){
			// 의사
			$convert_job	= "의사";
		}else if ($engJob == "scientist"){
			// 과학자
			$convert_job	= "과학자";
		}else if ($engJob == "minister"){
			// 목사
			$convert_job	= "목사";
		}else if ($engJob == "policeman"){
			// 경찰관
			$convert_job	= "경찰관";
		}else if ($engJob == "fireman"){
			// 소방관
			$convert_job	= "소방관";
		}else if ($engJob == "soldier"){
			// 군인
			$convert_job	= "군인";
		}else if ($engJob == "cook"){
			// 요리사
			$convert_job	= "요리사";
		}
	return $convert_job;
	}

	function has_batchim($str, $charset = 'UTF-8') 
	{
		$str = mb_convert_encoding($str, 'UTF-16BE', $charset);
		$str = str_split(substr($str, strlen($str) - 2));
		$code_point = (ord($str[0]) * 256) + ord($str[1]);
		if ($code_point < 44032 || $code_point > 55203) return 0;
		return ($code_point - 44032) % 28;
	}

	function total_runner_info()
	{
		global $_gl;
		global $my_db;

		$total_runner_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE shareYN='Y'";
		$total_runner_result 	= mysqli_query($my_db, $total_runner_query);
		if ($total_runner_result)
			$total_runner_cnt	= mysqli_num_rows($total_runner_result);
		else
			$total_runner_cnt	= 0;
		return $total_runner_cnt;
	}

	function total_pic_info()
	{
		global $_gl;
		global $my_db;

		$total_pic_query 	= "SELECT SUM(mb_share_cnt) total_share_cnt FROM ".$_gl['activator_info_table']." WHERE shareYN='Y'";
		$total_pic_result 	= mysqli_query($my_db, $total_pic_query);
		if ($total_pic_result)
			$total_pic_cnt	= mysqli_fetch_array($total_pic_result);
		else
			$total_pic_cnt	= 0;
		return $total_pic_cnt['total_share_cnt'];
	}


	function total_matching_info()
	{
		global $_gl;
		global $my_db;

		$total_matching_query 	= "SELECT SUM(mb_share_cnt) total_share_cnt FROM ".$_gl['activator_info_table']." WHERE shareYN='Y'";
		$total_matching_result 	= mysqli_query($my_db, $total_matching_query);
		$total_matching_cnt	= mysqli_fetch_array($total_matching_result);

		return $total_pic_cnt['total_share_cnt'];
	}

	function create_serial($flag, $serial)
	{
		global $_gl;
		global $my_db;

		if ($flag == "activator")
		{
			$serial_query 	= "SELECT serial_code FROM ".$_gl['serial_info_table']." WHERE useYN='N' limit 1";
			$serial_result 	= mysqli_query($my_db, $serial_query);
			$serial_data	= mysqli_fetch_array($serial_result);

			$serial_query2 	= "UPDATE ".$_gl['serial_info_table']." SET useYN='Y' WHERE serial_code='".$serial_data['serial_code']."'";
			$serial_result2 	= mysqli_query($my_db, $serial_query2);
		}else{
			// 발급되지 않은 난수코드 1개 가져오기
			$serial_query 	= "SELECT serial_code FROM ".$_gl['serial_info_table']." WHERE useYN='N' limit 1";
			$serial_result 	= mysqli_query($my_db, $serial_query);
			$serial_data	= mysqli_fetch_array($serial_result);

			// 부모난수코드의 idx, parent_idx 정보 가져오기
			$p_serial_query 	= "SELECT idx, parent_idx FROM ".$_gl['serial_info_table']." WHERE serial_code='".$serial."'";
			$p_serial_result 	= mysqli_query($my_db, $p_serial_query);
			$p_serial_data	= mysqli_fetch_array($p_serial_result);

			// 발급된 난수번호의 parent_idx 컬럼에 부모 idx 정보 UPDATE
			$serial_query2 	= "UPDATE ".$_gl['serial_info_table']." SET useYN='Y', parent_idx='".$p_serial_data['parent_idx']."||".$p_serial_data['idx']."' WHERE serial_code='".$serial_data['serial_code']."'";
			$serial_result2 	= mysqli_query($my_db, $serial_query2);

		}
		return $serial_data['serial_code'];
	}

	function match_YN_child()
	{
		global $_gl;
		global $my_db;

		$ch_query 		= "SELECT * FROM ".$_gl['child_info_table']." WHERE ch_choice='N'";
		$ch_result 		= mysqli_query($my_db, $ch_query);
		$ch_match_cnt	= mysqli_num_rows($ch_result);

		return $ch_match_cnt;
	}

	// LMS 발송 
	function send_lms($phone, $serial)
	{
		global $_gl;
		global $my_db;

		$s_url		= "http://mydream.compassion.or.kr/MOBILE/current_state.php?rs=".$serial."&ugu=act"; // URL 변경 해야함.
		$httpmethod = "POST";
		$url = "http://api.openapi.io/ppurio/1/message/lms/minivertising";
		$clientKey = "MTAyMC0xMzg3MzUwNzE3NTQ3LWNlMTU4OTRiLTc4MGItNDQ4MS05NTg5LTRiNzgwYjM0ODEyYw==";
		$contentType = "Content-Type: application/x-www-form-urlencoded";

		$response = sendRequest($httpmethod, $url, $clientKey, $contentType, $phone, $s_url);

		$json_data = json_decode($response, true);

		/*
		받아온 결과값을 DB에 저장 및 Variation
		*/
		$query3 = "INSERT INTO sms_info(send_phone, send_status, cmid, send_regdate) values('".$phone."','".$json_data['result_code']."','".$json_data['cmid']."','".date("Y-m-d H:i:s")."')";
		$result3 		= mysqli_query($my_db, $query3);

		$query2 = "UPDATE activator_info SET mb_lms='Y' WHERE mb_serial='".$serial."'";
		$result2 		= mysqli_query($my_db, $query2);

		if ($json_data['result_code'] == "200")
			$flag = "Y";
		else
			$flag = "N";

		return $flag;
	}

	function sendRequest($httpMethod, $url, $clientKey, $contentType, $phone, $s_url) {

		//create basic authentication header
		$headerValue = $clientKey;
		$headers = array("x-waple-authorization:" . $headerValue);

		$params = array(
			'send_time' => '', 
			'send_phone' => '025322475', 
			'dest_phone' => $phone, 
			//'dest_phone' => '01099017644',
			'send_name' => '', 
			'dest_name' => '', 
			'subject' => '',
			'msg_body' => 
"
내꿈꿔 릴레이를 시작하셨네요!

더 많은 사람들이 참여해서 후원자 님의 어린이가 꿈을 찾아갈 수 있도록 결연이 되는 그날까지 힘내주세요

아래의 링크를 누르시면 내 어린이의 현황을 확인하실 수 있습니다.

현황 확인하기:
".$s_url."
"
		);

		//curl initialization
		$curl = curl_init();

		//create request url
		//$url = $url."?".$parameters;

		curl_setopt ($curl, CURLOPT_URL , $url);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt ($curl, CURLINFO_HEADER_OUT, true);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);

		$response = curl_exec($curl);

		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$responseHeaders = curl_getinfo($curl, CURLINFO_HEADER_OUT);


		curl_close($curl);

		return $response;
	}

?>