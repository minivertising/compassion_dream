<?
	include_once "../config.php";

	$used	= $_REQUEST['used'];
	$used_arr	= explode('_',$used);
	$rs	= $used_arr[0];
	$ugu	= $used_arr[1];
	if (isset($rs))
	{
		if ($ugu	== "act")
		{
			$mb_query 	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE mb_serial='".$rs."'";
			$mb_result 	= mysqli_query($my_db, $mb_query);
			$mb_data	= mysqli_fetch_array($mb_result);
			$parent_idx	= "";
		}else{
			$mb_query 	= "SELECT * FROM ".$_gl['follower_info_table']." WHERE mb_serial='".$rs."'";
			$mb_result 	= mysqli_query($my_db, $mb_query);
			$mb_data	= mysqli_fetch_array($mb_result);
			$parent_idx	= $mb_data['parent_idx'];
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
<meta property="og:title" content="내꿈꿔 릴레이" />
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
<meta property="og:image" content="http://mydream.compassion.or.kr/MOBILE/images/compassion_share.jpg" />
<?
	}
?>
<meta property="og:description" content="내 어린 시절 꿈과 사진으로 꿈이 필요한 어린이에게 후원자를 찾아주는 컴패션의 릴레이 캠페인입니다" />
<link rel="shortcut icon" type="image/x-icon" href="./images/compassion.ico" />
<title>한국컴패션 - 내 꿈꿔 릴레이</title>
<!-- <link href="../lib/Cropper/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="../lib/bxslider/p_jquery.bxslider.css" rel="stylesheet" />
<link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
<link rel="stylesheet" href="../lib/colorbox/colorbox.css">
<link href="css/style_yang.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
<script src="../lib/Cropper/js/bootstrap.min.js"></script>
<script src="../lib/Cropper/js/cropper.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/canvas-to-blob.js"></script>
<script type="text/javascript" src="../js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="../lib/colorbox/jquery.colorbox-min.js"></script>
<script src="../lib/bxslider/jquery.bxslider.min.js"></script>
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script src="../js/html5shiv.js"></script>
<script type="text/javascript" src="../js/excanvas.js"></script>
<style>
/*.preview {
  overflow: hidden;
  width: 474px; 
  height: 236px;
  padding-top:198px;
  padding-left:89px;
}*/
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
