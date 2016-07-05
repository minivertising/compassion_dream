<?
	include_once "config.php";

	//unset($media);
	$media		= $_REQUEST['media'];
	$lms_flag	= $_REQUEST['lmsflag'];
	$tab	= $_REQUEST['tab'];

	$_SESSION['ss_media'] = $media;
	$_SESSION['ss_testurl'] = $testurl;

	//BR_InsertTrackingInfo($media, $gubun);

	if($gubun == "MOBILE")
	{
		Header("Location:http://mydream.compassion.or.kr/MOBILE/index.php?media=".$media."&lmsflag=".$lms_flag."");
		exit;
	}else{
		Header("Location:http://mydream.compassion.or.kr/PC/index.php?media=".$media."");
		exit;
	}

?>
