<?
	$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)1590", "compassion_dream");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$query 	= "SELECT * FROM activator_info WHERE shareYN='Y' AND mb_lms='N'";
	$result 	= mysqli_query($my_db, $query);

	while ($data = mysqli_fetch_array($result))
	{
		$chk_query 	= "SELECT * FROM activator_info WHERE mb_phone='".$data['mb_phone']."'";
		$chk_result 	= mysqli_query($my_db, $chk_query);

		while ($chk_data = mysqli_fetch_array($chk_result))
		{
			if ($chk_data['mb_lms'] == "Y")
			{
				$chk_flag	= "Y";
				break;
			}else{
				$chk_flag	= "N";
			}
		}

		if ($chk_flag == "N")
		{
			send_lms($data['mb_phone'], $data['mb_serial']);
		}
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

더 많은 사람들이 참여해서 후원자 님의 어린이가 꿈을 찾아갈 수 있도록 결연이 되는 그날까지 힘내주세요 :)

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

	echo "end";
?>