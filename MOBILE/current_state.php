<?
    include_once "./header.php";

	$ch_data	= sel_child_info($mb_data['mb_child']);

?>
<body class="bg_status">
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
<div class="wrap_page mystatus">
  <div class="head_title">
    <img src="images/title_status.png" width="95" />
  </div>
  <div class="title">
    <span>미니버</span>님의 어릴적 사진은<br>
    <span><?=number_format($mb_data['mb_share_cnt'])?></span>명에 의해 공유되고 있습니다
  </div>
  <div class="pic_child">
    <div><img src="<?=$ch_data['ch_full_img_url']?>" /></div>
    <div class="txt_wating">
    후원자님을 기다리고 있어요!  <!-- 후원자님을 만났어요-->
    </div>
  </div>
  <div class="head_title t_2">
    <img src="images/title_sponsor_ox.png" width="70" />
  </div>
  <!-- ing
  <div class="txt_status">
    <span>미니버</span>님의 어린이는<br>
    <span class="yellow">결연</span>이 <span class="yellow">완료</span>되었습니다
  </div>
  -->

  <div class="txt_status">
    <span>미니버</span>님의 어린이는<br>
    <span class="yellow">결연</span>을 <span class="yellow">기다리는 중</span>입니다
  </div>
  <!-- ing
  <div class="txt_status_2">
     -회원님의 링크는 기타와 같이<br>
     도움이 필요한 어린이를 위해 달리게 됩니다.
  </div>
  <div class="btn_block last">
    <a href="#"><img src="images/btn_help_oher.png"/></a> 
  </div>
  -->
  <div class="btn_block bt_2">
    <a href="#" onclick="open_pop('share_popup');return false;"><img src="images/btn_more_people.png"/></a> 
  </div>
  <div class="btn_block last">
    <a href="index.php"><img src="images/btn_new_pic.png"/></a> 
  </div>
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