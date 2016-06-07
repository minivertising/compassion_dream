<?php
include_once "config.php";

switch ($_REQUEST['exec'])
{
	case "insert_share_info" :
		$sns_media	= $_REQUEST['sns_media'];
		$sns_flag		= $_REQUEST['sns_flag'];

		$query 		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, inner_media, sns_regdate) values('".$sns_media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

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
		$mb_serial			= $_REQUEST['mb_serial'];
		$mb_image			= $_REQUEST['mb_image'];
		$media				= $_SESSION['ss_media'];

		/*
		아이 매칭 로직이 추가 되어야 함.
		*/

		$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_name,mb_phone,mb_job,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_job."','".$mb_image."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$serial."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag	= "Y";
		else
			$flag	= "N";

		echo $query;
	break;

}
?>