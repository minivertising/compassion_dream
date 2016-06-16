<?
	include_once "config.php";

	//unset($media);
	$media	= $_REQUEST['media'];
	$rs		= $_REQUEST['rs'];
	$ugu		= $_REQUEST['ugu'];

	$_SESSION['ss_media']	= $media;
	$_SESSION['ss_serial']	= $rs;
	$_SESSION['ugu']			= $ugu;

	//BR_InsertTrackingInfo($media, $gubun);

	if($gubun == "MOBILE")
	{
		Header("Location:http://www.mnv.kr/MOBILE/follower_index.php?media=".$media."&rs=".$rs."&ugu=".$ugu);
		exit;
	}else{
		Header("Location:http://www.mnv.kr/PC/follower_index.php?media=".$media."&rs=".$rs."&ugu=".$ugu);
		exit;
	}

?>
