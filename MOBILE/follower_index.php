<?
	include_once "./header.php";

	// ins_share_cnt($rs);

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
    <div id="page_div1">
	  <h2>어릴적 내 꿈은 <?=$_gl['job'][$mb_data['mb_job']]?></h2>
	  <div>
	    <img src="<?=$mb_data['mb_image']?>" style="width:100%">
	  </div>
	  <a href="#" onclick="next_page('2');return false;">다음</a>
    </div>
    <div id="page_div2" style="display:none">
	  <h2>저는 사실 하루가 다르게 꿈이 바뀌었어요.</h2>
	  <a href="#" onclick="next_page('3');return false;">다음</a>
    </div>
    <div id="page_div3" style="display:none">
	  <h2>그런데 만약 그 어린시절에 꿈을 꿀 수 없었다면 어땠을까요?</h2>
	  <a href="#" onclick="next_page('4');return false;">다음</a>
    </div>
    <div id="page_div4" style="display:none">
	  <h2>여기 꿈을 꾸는 것조차 허락되지 않은 어린이가 있어요</h2>
	  <a href="#" onclick="next_page('5');return false;">어린이 만나기</a>
    </div>
    <div id="page_div5" style="display:none">
	  <h2>저와 함께 꿈꾸는 행복을 <?=$ch_data['ch_ko_name']?>에게 전해주실래요?</h2>
	  <div>
	    <img src="<?=$ch_data['ch_top_img_url']?>" style="width:100%">
	  </div>
	  <a href="#">1:1 결연</a>
	  <a href="#" onclick="open_pop('dream_sel_popup');return false;">사진 공유</a>
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
    });
</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->