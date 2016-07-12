<?
	include_once "../config.php";

	$used	= $_REQUEST['used'];
	$used_arr	= explode('_',$used);
	$rs	= $used_arr[0];
	$ugu	= $used_arr[1];
	print_r($rs);
	print_r($ugu);
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
		$img_url		= str_replace("..","http://mydream.compassion.or.kr",$mb_data['mb_image']);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes,initial-scale=1.0, maximum-scale=1.0"/>
<meta property="fb:app_id" content="649187078561789" />
<meta property="og:title" content="내꿈꿔 릴레이" />
<meta property="og:type" content="website" />
<?
	if (isset($rs))
	{
// PC, MOBILE 구분 ?
?>
<meta property="og:url" content="http://mydream.compassion.or.kr/MOBILE/index.php?rs=<?=$mb_data['mb_serial']?>&ugu=<?=$ugu?>" />
<meta property="og:image" content="<?=$img_url?>" />
<?
	}else{
?>
<meta property="og:url" content="http://mydream.compassion.or.kr/MOBILE/index.php" />
<meta property="og:image" content="http://mydream.compassion.or.kr/MOBILE/images/compassion_share.jpg" />
<?
	}
?>
<meta property="og:description" content="내 어린 시절 꿈과 사진으로 꿈이 필요한 어린이에게 후원자를 찾아주는 컴패션의 릴레이 캠페인입니다" />
<link rel="shortcut icon" type="image/x-icon" href="./images/compassion.ico" />
<title>한국컴패션 - 내 꿈꿔 릴레이</title>
<!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
<link href="../lib/bxslider/m_jquery.bxslider.css" rel="stylesheet" />
<link href="../lib/Cropper/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
<link rel="stylesheet" href="../lib/colorbox/colorbox.css">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script src="../lib/Cropper/js/bootstrap.min.js"></script>
<script src="../lib/Cropper/js/cropper.js"></script>
<script type="text/javascript" src="../js/m_main.js"></script>
<script type="text/javascript" src="../js/canvas-to-blob.js"></script>
<script type="text/javascript" src="../lib/colorbox/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.js"></script>
<script src="../lib/bxslider/jquery.bxslider.js"></script>
<script src="../lib/load-image/load-image.all.min.js"></script>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>