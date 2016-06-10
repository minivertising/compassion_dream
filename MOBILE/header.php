<?
	include_once "../config.php";

	$rs	= $_REQUEST['rs'];

	$mb_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$rs."'";
	$mb_result 	= mysqli_query($my_db, $mb_query);
	$mb_data	= mysqli_fetch_array($mb_result);

	$img_url		= str_replace("..","http://www.mnv.kr",$mb_data['mb_image']);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes,initial-scale=1.0, maximum-scale=1.0"/>
<meta property="og:title" content="나의 어릴적 꿈을 소개합니다">
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.mnv.kr/MOBILE/lms_index.php?rs=<?=$mb_data['mb_serial']?>" />
<meta property="og:image" content="<?=$img_url?>" />
<meta property="og:description" content="Compassion BLUE BATON CHALLENGE">
<link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
<title>모바일 메인</title>
<!--[if lt IE 9]><script src="./js/html5shiv.js"></script><![endif]-->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
<!-- <link href="../lib/bxslider/jquery.bxslider.css" rel="stylesheet" /> -->
<link href="../lib/Cropper/css/bootstrap.min.css" rel="stylesheet">
<link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
<link rel="stylesheet" href="../lib/colorbox/colorbox.css">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script src="../lib/Cropper/js/bootstrap.min.js"></script>
<script src="../lib/Cropper/js/cropper.js"></script>
<script type="text/javascript" src="../js/m_main.js"></script>
<script type="text/javascript" src="../js/canvas-to-blob.js"></script>
<script type="text/javascript" src="../lib/colorbox/jquery.colorbox-min.js"></script>
<!-- <script src="../lib/bxslider/jquery.bxslider.js"></script> -->
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>

<style>
.container {
	max-width: 100%;
}

img {
	max-width: 100%;
}

</style>
