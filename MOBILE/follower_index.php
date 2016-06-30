<?
	include_once "./header.php";

	// ins_share_cnt($rs);

	// PC에서 유입시 PC로 이동
	if ($gubun == "PC")
		echo "<script>location.href='../PC/follower_index.php?rs=".$rs."&ugu=".$ugu."';</script>";

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
    <h2>여기 꿈을 꾸는 것조차 허락되지 않은 어린이가 있어요</h2>
<?
    if ($ch_data['ch_choice'] == "Y")
    {
?>
    <a href="#" onclick="next_page('6');return false;">어린이 만나기</a>
<?
    }else{
?>
    <a href="#" onclick="next_page('5');return false;">어린이 만나기</a>
<?
    }
?>
    </div>
  <div id="page_div5" class="wrap_sec_top_sub match_child follower" style="display:none;">
    <div class="inner">
      <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
      <div class="block_content result_story_child">
        <div class="title">
          <div class="main">‘<?=$ch_data['ch_nick']?>'야 내 꿈꿔~!’</div>
          <div class="sub">
          꿈꾸는 것조차 어려운 <span><?=$ch_data['ch_nick']?></span>에게<br> 
          내 어린시절 꿈이 담긴 사진으로 희망을 선물하세요
          </div>
        </div>
        <div class="block_child">
          <div class="inner_block_child clearfix">
            <div class="child_pic"><img src="<?=$ch_data['ch_full_img_url']?>" /></div>
            <div class="child_text">
              <p>
              <?=$ch_data['ch_nick']?>는 부모님과 함께 살고 있습니다 <br>
              아버지는 임시직으로 노동일을 하시며 어머니는 집안일을 하십니다 <br>
              기타는 집안에서 시장에서 물건 사고 팔기, 
              물 길어 나르기를 맡아서 합니다
              </p>
            </div>
          </div>
        </div>
        <div class="block_btn apply">
          <div class="inner_apply clearfix">
            <div class="left">
              <div class="bt"><a href="#"><img src="images/btn_sponsor.png" /></a></div>
              <div class="txt">1:1결연으로 '<?=$ch_data['ch_nick']?>'의 꿈을<br> 현실로 만들어주세요!</div>
            </div>
            <div class="right">
              <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
              <div class="txt">SNS에 어릴적 사진을 공유해서<br> '<?=$ch_data['ch_nick']?>'가 꿈꿀 수 있게 도와주세요</div>
            </div>
          </div>
        </div>
        <div class="example">
          <img src="images/story_1.png" width="100" />
        </div>
      </div>
    </div>
  </div>

  <div id="page_div6" class="wrap_sec_top_sub match_child follower" style="display:none;">
    <div class="inner">
      <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
      <div class="block_content result_story_compassion">
        <div class="title">
          <div class="main">얘들아 내 꿈꿔~!’</div>
          <div class="sub">
          컴패션 소개와 함께 어린시절 사진을 SNS에 공유하면<br>  
          꿈이 필요한 어린이들을 도와줄 수 있습니다
          </div>
        </div>
        <div class="block_child">
          <div class="inner_block_child clearfix">
            <div class="child_pic"><img src="images/ex_child.png" /></div>
            <div class="child_pic"><img src="images/ex_child.png" /></div>
            <div class="child_pic"><img src="images/ex_child.png" /></div>
            <div class="child_pic"><img src="images/ex_child.png" /></div>
          </div>
        </div>
        <div class="block_btn apply">
          <div class="inner_apply clearfix">
            <div class="left">
              <div class="bt"><a href="#"><img src="images/btn_sponsor.png" /></a></div>
              <div class="txt">1:1결연으로 '기타'의 꿈을<br> 현실로 만들어주세요!</div>
            </div>
            <div class="right">
              <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
              <div class="txt">SNS에 어릴적 사진을 공유해서<br> '기타'가 꿈꿀 수 있게 도와주세요</div>
            </div>
          </div>
        </div>
        <div class="example">
          <img src="images/story_1.png" width="100" />
        </div>
      </div>
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
    });
</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->