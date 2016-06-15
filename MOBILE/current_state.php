<?
    include_once "./header.php";

	$ch_data	= sel_child_info($mb_data['mb_child']);

?>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '649187078561789',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    <div id="contents_div">
	  <h2>후원자님의 링크는 <?=$mb_data['mb_share_cnt']?>명에 의해 공유되고 있습니다.</h2>
	  <div>
	    <img src="<?=$ch_data['ch_top_img_url']?>" style="width:100%">
	  </div>
	  <a href="#" onclick="open_pop('share_popup');return false;">더 많은 사람들에게 알리기</a>
    </div>
<?
        include_once "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
    var mb_rs       = '<?=$rs?>';
    $(document).ready(function() {
        Kakao.init('59df63251be6d99256b63b98f4948e89');
        $("#cboxTopLeft").hide();
        $("#cboxTopRight").hide();
        $("#cboxBottomLeft").hide();
        $("#cboxBottomRight").hide();
        $("#cboxMiddleLeft").hide();
        $("#cboxMiddleRight").hide();
        $("#cboxTopCenter").hide();
        $("#cboxBottomCenter").hide();
		$("#matching_child_pic").attr("src","<?=$ch_data['ch_top_img_url']?>");
    });
</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->