<?
	include_once "../config.php";

	$rs	= $_REQUEST['rs'];
	$ugu	= $_REQUEST['ugu'];
	if (isset($rs))
	{
		if ($ugu	== "act")
		{
			$mb_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$rs."'";
			$mb_result 	= mysqli_query($my_db, $mb_query);
			$mb_data	= mysqli_fetch_array($mb_result);
		}else{
			$mb_query 	= "SELECT * FROM ".$_gl['follower_info_table']." WHERE mb_serial='".$rs."'";
			$mb_result 	= mysqli_query($my_db, $mb_query);
			$mb_data	= mysqli_fetch_array($mb_result);
		}
		$img_url		= str_replace("..","http://www.mnv.kr",$mb_data['mb_image']);
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta property="og:title" content="나의 어릴적 꿈을 소개합니다">
<meta property="og:type" content="website" />
<?
	if (isset($rs))
	{
// PC, MOBILE 구분 ?
?>
<meta property="og:url" content="http://www.mnv.kr/MOBILE/lms_index.php?rs=<?=$mb_data['mb_serial']?>" />
<meta property="og:image" content="<?=$img_url?>" />
<?
	}else{
?>
<meta property="og:url" content="http://www.mnv.kr/MOBILE/lms_index.php" />
<meta property="og:image" content="" />
<?
	}
?>
<meta property="og:description" content="Compassion BLUE BATON CHALLENGE">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
<title>PC MAIN</title>
<!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="../lib/bxslider/jquery.bxslider.css" rel="stylesheet" />
<link href="../lib/Cropper/css/bootstrap.min.css" rel="stylesheet">
<link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
<link rel="stylesheet" href="../lib/colorbox/colorbox.css">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script src="../lib/Cropper/js/bootstrap.min.js"></script>
<script src="../lib/Cropper/js/cropper.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/canvas-to-blob.js"></script>
<script type="text/javascript" src="../lib/colorbox/jquery.colorbox-min.js"></script>
<script src="../lib/bxslider/jquery.bxslider.js"></script>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>

<style>
.container {
	max-width: 100%;
}

img {
	max-width: 100%;
}
</style>
