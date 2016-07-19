<?
	$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)1590", "compassion_dream");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	//$query 	= "SELECT * FROM child_info WHERE ch_choice<>'Y'";
	$query 	= "SELECT * FROM child_info WHERE idx='49'";
	$result 	= mysqli_query($my_db, $query);

	while ($data = mysqli_fetch_array($result))
	{
		$url = "http://www.compassion.or.kr/mydream/ReturnCommitment.aspx?ChildMasterID=".$data['ch_id'];

		$response = file_get_contents($url);
		$object = simplexml_load_string($response);

		$matchingYN = $object->ResponseInfo->CommitmentYN;

		//if ($matchingYN == "Y")
		if ($matchingYN == "N")
		{
			//$query2 	= "UPDATE child_info SET ch_choice='Y', ch_choice_date='".date("Y-m-d H:i:s")."' WHERE ch_id='".$data['ch_id']."'";
			//$result2 	= mysqli_query($my_db, $query2);

			$query3 	= "SELECT * FROM activator_info WHERE mb_child='".$data['idx']."'";
			$result3 	= mysqli_query($my_db, $query);

			while($data3	= mysqli_fetch_array($result3))
			{
				if ($data3['mb_lms'] == "Y")
					$lms_rs	= send_lms($data3['mb_phone'],$data3['mb_serial']);
			}
		}
	}

echo $lms_rs;
	// LMS 발송 
	function send_lms($phone, $serial)
	{
		global $_gl;
		global $my_db;

		$s_url		= "http://mydream.compassion.or.kr/MOBILE/current_state.php?used=".$serial."_act"; // URL 변경 해야함.
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

		//$query2 = "UPDATE activator_info SET mb_lms='Y' WHERE mb_serial='".$serial."'";
		//$result2 		= mysqli_query($my_db, $query2);

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
'이제 마음껏 꿈을 꿀 수 있어요 감사합니다!'
내꿈꿔 릴레이를 끝까지 참여해주신 덕분에 후원자님의 어린이가 결연이 이뤄졌습니다.

내꿈꿔 릴레이로 결연 미션에 성공하신 후원자님에게는 감사하는 마음을 담아 추첨을 통해 비전트립을 보내드릴 예정입니다.

선정되신 분에게는 8월 중에 개별적으로 연락을 통해 당첨 여부를 알려드릴 예정입니다.

다시 한번 참여해주셔서 감사합니다!

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