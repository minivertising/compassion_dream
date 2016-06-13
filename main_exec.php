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
		$sns_media	= $_REQUEST['sns_media'];
		$mb_serial	= $_REQUEST['mb_serial'];

		$query 		= "INSERT INTO ".$_gl['share_info_table']."(sns_media, sns_ipaddr, sns_gubun, inner_media, sns_regdate) values('".$sns_media."','".$_SERVER['REMOTE_ADDR']."','".$gubun."','".$_SESSION['ss_media']."','".date("Y-m-d H:i:s")."')";
		$result 	= mysqli_query($my_db, $query);

		$mb_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$mb_serial."'";
		$mb_result 	= mysqli_query($my_db, $mb_query);
		$mb_data	= mysqli_fetch_array($mb_result);

		send_lms($mb_data['mb_phone'], $mb_serial);

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
		$child_info	= matching_child($mb_job);

		$child_arr	= explode("||",$child_info);
		$query 	= "INSERT INTO ".$_gl['activator_info_table']."(mb_ipaddr,mb_name,mb_phone,mb_job,mb_child,mb_image,mb_regdate,mb_gubun,mb_media,mb_serial) values('".$_SERVER['REMOTE_ADDR']."','".$mb_name."','".$mb_phone."','".$mb_job."','".$child_arr[0]."','".$mb_image."','".date("Y-m-d H:i:s")."','".$gubun."','".$media."','".$mb_serial."')";
		$result 	= mysqli_query($my_db, $query);

		if ($result)
			$flag	= "Y||".$child_arr[1];
		else
			$flag	= "N||fail";

		echo $query;
	break;

	case "url_info" :
		$mb_serial			= $_REQUEST['mb_serial'];

		$img_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$mb_serial."'";
		$img_result 	= mysqli_query($my_db, $img_query);
		$img_data	= mysqli_fetch_array($img_result);
	
		$img_url		= str_replace("..","http://www.mnv.kr",$img_data['mb_image']);

		echo $img_url;

	break;
}
?>