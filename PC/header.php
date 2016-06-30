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
		$img_url		= str_replace("..","http://mydream.compassion.or.kr",$mb_data['mb_image']);
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta property="fb:app_id" content="649187078561789" />
<meta property="og:title" content="나의 어릴적 꿈을 소개합니다" />
<meta property="og:type" content="website" />
<?
	if (isset($rs))
	{
// PC, MOBILE 구분 ?
?>
<meta property="og:url" content="http://mydream.compassion.or.kr/PC/index.php?rs=<?=$mb_data['mb_serial']?>&ugu=<?=$ugu?>" />
<meta property="og:image" content="<?=$img_url?>" />
<?
	}else{
?>
<meta property="og:url" content="http://mydream.compassion.or.kr/PC/index.php" />
<meta property="og:image" content="" />
<?
	}
?>
<meta property="og:description" content="Compassion BLUE BATON CHALLENGE" />
<link rel="shortcut icon" type="image/x-icon" href="./img/icon/favicon.ico" />
<title>PC MAIN</title>
<link href="../lib/Cropper/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style_yang.css" rel="stylesheet" type="text/css">
<link href="../lib/bxslider/jquery.bxslider.css" rel="stylesheet" />
<link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
<link rel="stylesheet" href="../lib/colorbox/colorbox.css">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script src="../lib/Cropper/js/bootstrap.min.js"></script>
<script src="../lib/Cropper/js/cropper.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/canvas-to-blob.js"></script>
<script type="text/javascript" src="../lib/colorbox/jquery.colorbox-min.js"></script>
<script src="../lib/bxslider/jquery.bxslider.min.js"></script>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script src="../js/html5shiv.js"></script>
<script type="text/javascript" src="../js/excanvas.js"></script>
<style>
.preview {
  overflow: hidden;
  width: 400px; 
  height: 300px;
}
.fileUp {
	position: absolute;
    top: 6;
    right: 0;
    /*font-size: 100px;*/
    width: 107px;
    height: 38px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
