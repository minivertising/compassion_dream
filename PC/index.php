<?
include_once "./header.php";

$total_runner_cnt   = total_runner_info();
$total_pic_cnt      = total_pic_info();
//$total_matching_cnt = total_matching_info();
$total_matching_cnt		= 1000;
$total_remain_cnt			= 3000 - $total_matching_cnt;
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
<div id="loading_div" class="wrap_sec_top_sub loading" style="display:none;">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content">
      <div class="img_load">
      <!-- 꿈이 필요한 어린이 '베리'를 응원중입니다<br>
      잠시만 기다려 주세요 --> 
      꿈이 필요한 어린이와 매칭중입니다<br>
      잠시만 기다려 주세요
      </div>
    </div>
  </div>
</div>

<!-- 메인 index -->
    <div class="wrap_sec_top">
    <div class="bg_wrap_sec_top">
    	<div class="inner">
        	<div class="logo"><a href="index.php"><img src="images/logo.png" /></a></div>
            <div class="title"><img src="images/title_main.png" /></div>
            <div class="block_img">
                <div><a href="#" onclick="show_dream_sel();return false;"><img src="images/btn_partin.png" /></a></div>
                <div class="status">
                    <div class="people">
                    	<div class="num"><?=number_format($total_matching_cnt)?></div>
                    </div>
                </div>
            </div>
            <div class="main_child">
            	<img src="images/main_child.png" />
            </div>
            <div class="btn_howto">
                <a href="#" onclick="open_pop('use_popup');return false;"><img src="images/btn_howto.png" /></a>
            </div>
        </div>
        <div class="people_pic clearfix">
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        	<div class="pic_one">
            	<img src="images/ex_pic_one.png" />
            </div>
        </div>
    </div><!--bg-->
    </div>
    
    <div class="wrap_sec_movie">
    	<div class="bg_wrap_sec_movie">
            <div class="inner">
                <div class="title"><img src="images/title_movie.png" /></div>
                <div class="movie"><iframe allowfullscreen="1" src="<?=$_gl['youtube_url']?>" frameborder="0" id="ytplayer" class="ytplayer"></iframe></div>
                <div class="block_btn">
                    <a href="#" onclick="show_dream_sel();return false;"><img src="images/btn_relay_movie.png" /></a>
                    <a href="#" onclick="open_pop('use_popup');return false;"><img src="images/btn_relay_howto_movie.png" /></a>
                </div>
            </div>
            
            <div class="sec_q">
    			<div class="inner">
        			<div class="btn"><a href="http://www.compassion.or.kr" target="_blank"><img src="images/btn_gift.png" alt=""/></a></div>
        		</div>
    		</div>
    
			<div class="bg_child">
                <div class="child">
                	<div class="inner_child clearfix">
                        <div class="bar">
                            <div class="inner_bar">
                            	<div class="figure">결연된 어린이 <?=number_format($total_matching_cnt)?>명</div>
                                <div class="heart"><img src="images/bar_heart.png" /></div>
                                <div class="g"></div>
                            </div>
                        </div>
                        <div class="num">
                        	<div class="txt"><img src="images/txt_waiting_child.png" /></div>
                        	<div class="cnt"><span><?=number_format($total_remain_cnt)?></span>명</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="wrap_sec_com">
    	<div class="inner">
        	<div class="title"><img src="images/title_com.png" /></div>
   			<div class="img">
            	<a href="http://www.compassion.or.kr" target="_blank"><img src="images/btn_compassion.png" /></a>
            </div>
        </div>
        
    </div>
    <div class="wrap_sec_footer" style="display:none;">
    	<div class="inner">
   			<div class="img"><img src="images/img_footer.jpg" /></div>
        </div>
    </div>
<!-- 메인 index -->

<!-- 사진 업로드 페이지 -->
    <div id="upload_page" class="wrap_sec_top_sub" style="display:none;">
    	<div class="inner">
        	<div class="logo"><a href="index.php"><img src="images/logo_sub.png" /></a></div>
            <div class="block_content upload">
            	<div class="title">
                	<div class="main">
                    여러분의 어린 시절의 꿈과 사진을 올려주세요<br> 
                    SNS에 사진과 함께 당신이 응원할 <span>‘꿈을 잃은 어린이’</span>가 소개됩니다
                    </div>
                </div>
                <div class="block_input_dream">
                	<div class="selec_job">
                    	<span id="sel_job_txt">1. 꿈꾸던 직업 </span> <a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_re_sec.png" id="sel_job_btn" /></a><!--버튼 두개입니다-->
                    </div>
                    <div class="upload_pic">
                    	<div class="title_pic">
                        	2. 사진업로드
                        </div>
                        <div class="desc">
                        	<div class="txt_pic">
                            	<img src="images/txt_pic.png" />
                            </div>
                        	<div class="btns">
              <form id="ie_img_save" method="post" action="./ie_photo_upload2.php" enctype="multipart/form-data">
                <label for="inputImage" title="Upload image file">
                  <span title="Import image" style="position: relative; overflow: hidden;">
                    <input type="file" id="inputImage" class="fileUp" name="file">
                    <img src="images/btn_select_pic.png" style="cursor:pointer;"/>
                  </span>
                </label>
                  <a href="#" onclick="open_pop('preview_popup');return false;"><img src="images/btn_preview.png" /></a>
              </form>
                            </div>
                        </div>
                        <div id="img_div" class="pic_area">
                        	<img id="ori_image" src="./images/picture.jpg" alt="Picture" />
                        </div>
                        <div class="btn_closeup">
                        	<a href="#" onclick="zoom_action('down');return false;"><img src="images/btn_minus.png" /></a>
                            <a href="#" onclick="zoom_action('up');return false;"><img src="images/btn_plus.png" /></a>
                        </div>
                    </div>
                </div>
                <div class="block_btn">
                	<a href="#" onclick="dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
                </div>
            </div>
            
        </div>
    </div>
<!-- 사진 업로드 페이지 -->

<!-- 개인정보 입력 페이지 -->
<div id="input_page" class="wrap_sec_top_sub input_data" style="display:none;">
  <div class="inner">
    <div class="logo"><a href="./index.php"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content">
      <div class="title">
      </div>
      <div class="block_input">
        <div class="label_title"><img src="images/label_title.png" /></div>
        <div class="input_one clearfix">
          <div class="label">이름</div>
          <div class="input"><input type="text" id="mb_name"></div>
        </div>
        <div class="input_one clearfix">
          <div class="label">휴대폰번호</div>
          <div class="input"><input type="text" id="mb_phone" placeholder="휴대폰번호 ('-' 없이 입력해주세요)" onkeyup="only_num(this);return false;"></div>
        </div>
        <div class="check">
          <a href="#" onclick="mb_check();return false;"><img src="images/check.png" name="mb_agree" id="mb_agree" /></a><a href="#">개인정보 수집 및 위탁에 관한 동의</a> <a href="#" onclick="open_pop('agree_popup');return false;"><img src="images/btn_detail.png" /></a>
        </div>
      </div>
      <div class="txt_notice">
      * 선정 되신 분께는 개별 연락 드립니다
      </div>
      <div class="block_btn">
        <a href="#" onclick="input_submit();return false;"><img src="images/btn_next.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 개인정보 입력 페이지 -->

<!-- ACTIVATOR 매칭 결과 페이지 -->
<div id="matching_share_page" class="wrap_sec_top_sub match_child" style="display:none;">
  <div class="inner">
    <div class="logo"><a href="./index.php"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content">
      <div class="title">
	  당신의 도움이 필요한 어린이는<br> <span id="m_rs_ch_name">기타</span> 입니다
      </div>
      <div class="block_child">
        <!-- <div class="img_letter"><img src="images/img_letter.png" /></div> -->
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="images/ex_child.png" id="matching_child_pic" /></div>
          <div class="child_text">
            <h2>저도 <span id="m_rs_job">선생님</span><span id="jobPP">를</span> 꿈꿀 수 있을까요?</h2> <!-- 조사 ~을, ~를 -->
            <p id="m_rs_desc">
            </p>
          </div>
        </div>
      </div>
      <div class="block_txt">
        <p>SNS에 공유하셔서 <span id="m_rs_ch_name3">기타</span><span id="name3PP">이</span> 후원자를 만날 수 있도록 해주세요!</p><!-- ~이 ~가 -->
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','act','matching_share_page');return false;"><img src="images/sns_f.png" /></a>
        <!-- <a href="#" onclick="sns_share('kt','act');"><img src="images/sns_kt.png" /></a> -->
        <a href="#" onclick="go_share('ks','act','matching_share_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
      </div>
      <div class="btn_block" style="margin-top:15px;">
        <a href="#" onclick="go_main('matching_share_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭 결과 페이지 -->

<!-- ACTIVATOR 매칭 결과 페이지 (이미참여 결연X)-->
<div id="re_matching_share_page" class="wrap_sec_top_sub match_child" style="display:none;">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content follower">
      <div class="title">
        미니버님!<br> 
        <span id="re_ch_name">아비가일 마아 야아 암퐁</span>을 위해<br>
        다시 한번 참여해주셔서 감사합니다 
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="images/ex_child.png" id="re_matching_child_pic" /></div>
        </div>
      </div>
      <div class="block_txt">
        <p>아래 SNS에 당신의 어린 시절 사진과 꿈을 공유하셔서</p>
        <p><span  id="re_ch_name2">아비가일 마아 야아 암퐁</span>이 후원자를 만날 수 있도록 해주세요!</p>
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','act','re_matching_share_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('ks','act','re_matching_share_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
      </div>
      <div class="btn_block">
        <a href="#" onclick="go_main('re_matching_share_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭 결과 페이지 (이미참여 결연X)-->

<!-- ACTIVATOR 매칭없을시 컴페션 소개 페이지 -->
<div id="no_matching_page" class="wrap_sec_top_sub match_child" style="display:none">
  <div class="inner">
    <div class="logo"><a href="index.php"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content share_compassion">
      <div class="title">
      컴패션에서는 당신의 어린시절처럼<br>
      꿈 많고 귀여운 어린이들이 있습니다
      <!--
      컴패션에서는 '미니버'님의 어린시절처럼<br>
      꿈 많고 귀여운 어린이들이 있습니다
      -->
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="images/ex_child.png" /></div>
          <div class="child_pic"><img src="images/ex_child.png" /></div>
          <div class="child_pic"><img src="images/ex_child.png" /></div>
          <div class="child_pic"><img src="images/ex_child.png" /></div>
        </div>
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','act','no_matching_page');return false;"><img src="images/sns_f.png" /></a>
        <!-- <a href="#"><img src="images/sns_kt.png" /></a> -->
        <a href="#" onclick="go_share('fb','act','no_matching_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
      </div>
      <div class="btn_block">
        <a href="#" onclick="go_main('no_matching_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭없을시 컴페션 소개 페이지 -->

<!-- 공유버튼 클릭시 나오는 예시 페이지 -->
<div id="sns_exam_page" class="wrap_sec_top_sub match_child" style="display:none;">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content exshare">
      <div class="title">
      아래의 예시를 참고하셔서<br>
      지인들에게 공유해주세요
      </div>
      <div class="block_btn_again">
        <a href="#" id="go_share_func"><img src="images/btn_again.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 공유버튼 클릭시 나오는 예시 페이지 -->

<!-- 공유 완료 페이지 -->
<div id="thanks_page" style="display:none" class="wrap_sec_top_sub match_child">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content follower">
      <div class="title">
      참여해주셔서 감사합니다!<br>
      <span id="thx_ch_name">아비가일 마아 야아 암퐁</span>이 꿈을 꿀 수 있도록<br>
      끝까지 함께 응원해주세요
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="images/ex_child.png" id="thx_ch_img" /></div>
        </div>
      </div>
      <div class="block_btn">
        <a href="#" onclick="location.reload();"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 공유 완료 페이지 -->

<?
	include_once "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
	var agent = navigator.userAgent.toLowerCase();
	var trident = navigator.userAgent.match(/Trident\/(\d.\d)/i);
	var sel_dream       = null;
	var runner_serial   = null;
	var mb_job          = null;
	var mb_image        = null;
	var $ori_image = $('#ori_image');
	var $inputImage = $('#inputImage')
    var $preview = $('.preview');
	var URL = window.URL || window.webkitURL;
	var blobURL;
	var file;
	var files;
	var flag_sel_dream  = 0;
	var mb_rs       = null;
	var inputImageCheck;
	var chk_mb_flag = 0;
	var share_cnt			= 0;

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

		// 유튜브 영상 크기 제어
		var yt_width = $(".movie").width();
		var yt_height = (yt_width / 16) * 9;
		$("#ytplayer").width(yt_width);
		$("#ytplayer").height(yt_height);

		// gage 스타일 적용
		var gage_w	= (<?=$total_matching_cnt?>/3000)*100;
		$(".g").css("width",gage_w+"%");
		$(".heart").css("left",gage_w+"%");
		Ins_tracking();


		$('.people_pic').bxSlider({
			ticker: true,
			speed: 40000,
			// minSlide: 12,
			// maxSilde: 12,
			slideWidth: 155
			// slideMargin: 20
			// responsive: true,
			// adaptiveHeight: true
		});
	  
	
		});
	/*
		var $inputImage = $('#inputImage');
		var URL = window.URL || window.webkitURL;
		var blobURL;

			if (URL) {
				$inputImage.change(function () {
					var files = this.files;
					var file;

					if (!$ori_image.data('cropper')) {
						return;
					}

					if (files && files.length) {
						file = files[0];

						if (/^image\/\w+$/.test(file.type)) {
							blobURL = URL.createObjectURL(file);
							$ori_image.one('built.cropper', function () {
								// Revoke when load complete
								URL.revokeObjectURL(blobURL);
							}).cropper('reset').cropper('replace', blobURL);
							$inputImage.val('');
						} else {
							window.alert('Please choose an image file.');
						}
					}
				});
			} else {
				$inputImage.prop('disabled', true).parent().addClass('disabled');
			}
			*/



function image_crop(){
	$($ori_image).cropper({
		viewMode: 0,
		dragMode: 'move',
		autoCropArea: 0.8,
		aspectRatio: 1200/630,
		responsive: true,
		restore: true,
		guides: false,
		highlight: true,
		background: true,
		cropBoxMovable: true,
		cropBoxResizable: true,
		preview: '.preview',
		center:true,
		zoomOnWheel:false,
		toggleDragModeOnDblclick:false,
		// build: function (e) {
		//     console.log(e.type);
		// },
		// built: function (e) {
		//     console.log(e.type);
		// },
		// cropstart: function (e) {
		//     console.log(e.type, e.action);
		// },
		// cropper: function (e) {
		//     console.log(e.type, e.action);
		// },
		// cropend: function (e) {
		//     console.log(e.type, e.action);
		// },
		// crop: function (e) {
		//     console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
		// },
		// zoom: function (e) {
		//     console.log(e.type, e.ratio);
		// }
	});
}
// });

function zoom_action(type){
	if(type=="up")
	{
		$($ori_image).cropper('zoom', 0.1);
	}else{
		$($ori_image).cropper('zoom', -0.1);
	}
}


function readURL(input, browser) {
	if (input.files && input.files[0] && browser == "C") {
		file = files[0];
		if (/^image\/\w+$/.test(file.type)) {
			blobURL = URL.createObjectURL(file);
			$ori_image.one('built.cropper', function () {
							// Revoke when load complete
							URL.revokeObjectURL(blobURL);
						}).cropper('reset').cropper('replace', blobURL);
			$($inputImage).val('');
		} else {
			window.alert("이미지를 선택해주세요.");
					// }
					// var reader = new FileReader();
					// reader.onload = function (e) {
					//     alert("onload");
					//     $($ori_image).attr('src', e.target.result);
					//     image_crop();
		}
					// realFath = input.files[0].name;
					// reader.readAsDataURL(input.files[0]);
	}else if(browser == "I"){
		$($ori_image).cropper('destroy');
		$('#ie_img_save').ajaxSubmit({
			success: function (data) {
				// console.dir(data);
				$($ori_image).attr('src', data);
				image_crop();
			}
		});
			// $('#ie_img_save').ajaxForm({
			//     success: function (data) {
			//         console.dir(data);
			//     }
			// });
			//이미지 저장후에 불러와서 $ori_image src 변경
			// console.log(realFath);
			// $.ajax({
			//  method: 'POST',
			//  url: 'ie_photo_upload.php',
			//  data: {ieImageSrc: realFath},
			//  success: function(res){
			//      // convertPath = res;
			//      alert(res);
			//      // console.log("저장 후:"+convertPath);
			//   // // alert(convertPath);
			//   // $($ori_image).attr('src', convertPath);
			//   // image_crop();
			//  }
			// });
	}
}

$($inputImage).change(function(){
	var pre_upload_browser_check;
	if((navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1))
	{
		var file_value = this.value;
		var file_value_lengh = this.value.length;
		var file_exe_start_length = file_value_lengh-3;
		var file_exe = file_value.substr(file_exe_start_length, 3);

		if(file_exe == "jpg" || file_exe == "JPG" || file_exe == "png" || file_exe == "PNG" || file_exe == "gif") {
			pre_upload_browser_check = "I";
		}else{
			alert("이미지를 선택해주세요.")
			return;
		}

	}else{
		files = this.files;
		pre_upload_browser_check = "C";
	}
	inputImageCheck = "Y";

	readURL(this, pre_upload_browser_check);
});


function dream_next(){
	var cropboxDataIE;
	var crop_image_url;
		if (sel_dream == null)
		{
			alert("당신의 어린시절 꿈을 선택해 주세요.");
			return false;
		}
		if (inputImageCheck !== "Y")
		{
			alert("이미지를 업로드해주세요.");
			return false;
		}
		//mb_job    = $("#mb_job").val();

		if((agent.indexOf("msie") != -1) && (trident == null || trident[1] == "4.0")){
			alert("ie8이하");
			cropboxDataIE = $(ori_image).cropper('getData');
			crop_image_url = $(ori_image).attr('src');
			// console.dir(cropboxData);
			// console.dir(cropboxgetData);
			   $.ajax({
				method: 'POST',
				url: '../main_exec.php',
				data: {
					exec            : "input_image_IE",
					crop_image_url  : crop_image_url,
					mb_job          : sel_dream,
					cropboxData     : cropboxDataIE,
				},
				success: function(res){
					// mb_image    = res;

					var rs_ch = res.split("||");
					// $("#loading_div").hide();
					// $("#contents_div").show();
					if (rs_ch[0] == "Y")
					{
						// 매칭될 아이가 있을 경우
						mb_image    = rs_ch[1];
						// $("#upload_page").hide();
						// $("#input_page").show();
						$("#upload_page").fadeOut('slow', function(){
							$("#input_page").fadeIn('slow');
						});
						//open_pop('input_popup');
					}else if (rs_ch[0] == "N"){
						// 매칭될 아이가 없을 경우
						mb_image    = rs_ch[1];
						mb_rs       = rs_ch[2];
						//$("#no_matching_child_pic").attr("src",mb_image);
						//open_pop('no_matching_popup');
						// $("#upload_page").hide();
						// $("#no_matching_page").show();
						$("#upload_page").fadeOut('slow', function(){
							$("#no_matching_page").fadeIn('slow');
						});

					}else {
						// 에러 
						alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
						location.reload();
					}
				}
			});

		}else{
			// 사진 저장할 내용 추가
			var croppedCanvas = $($ori_image).cropper('getCroppedCanvas', {width:1200, height:630});
			crop_image_url = croppedCanvas.toDataURL("image/jpeg");
			$.ajax({
				method: 'POST',
				url: '../main_exec.php',
				data: {
					exec            : "input_image",
					crop_image_url  : crop_image_url,
					mb_job          : sel_dream
				},
				success: function(res){
					// console.log(res);
					//mb_image    = res;

					var rs_ch = res.split("||");
					// $("#loading_div").hide();
					// $("#contents_div").show();
					if (rs_ch[0] == "Y")
					{
						// 매칭될 아이가 있을 경우
						mb_image    = rs_ch[1];
						// $("#upload_page").hide();
						// $("#input_page").show();
						$("#upload_page").fadeOut('slow', function(){
							$("#input_page").fadeIn('slow');
						});
						//open_pop('input_popup');
					}else if (rs_ch[0] == "N"){
						// 매칭될 아이가 없을 경우
						mb_image    = rs_ch[1];
						mb_rs       = rs_ch[2];
						//$("#no_matching_child_pic").attr("src",mb_image);
						//open_pop('no_matching_popup');
						// $("#upload_page").hide();
						// $("#no_matching_page").show();
						$("#upload_page").fadeOut('slow', function(){
							$("#no_matching_page").fadeIn('slow');
						});

					}else {
						// 에러
						alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
						location.reload();
					}
				}
			});
		}

/*
		$.ajax({
			method: 'POST',
			url: 'photo_upload.php',
			data: {canvasurl: canvasImageURL},
			success: function(res){
				// console.log(res);
				//alert(res);
				mb_image    = res;
				open_pop('input_popup');
			}
		});
*/
	}


	function input_submit()
	{
		var mb_name = $("#mb_name").val();
		var mb_phone    = $("#mb_phone").val();
		//mb_image      = "임시 이미지 URL"; // 이미지 경로 작업 완료되면 여기에 값 추가

		if (mb_name == "")
		{
			alert("이름을 입력해 주세요.");
			return false;
		}

		if (mb_phone == "")
		{
			alert("휴대폰번호를 입력해 주세요.");
			return false;
		}

		if (chk_mb_flag == 0)
		{
			alert("개인정보 수집 및 위탁에 관한 동의를 안 하셨습니다.");
			return false;
		}
		var job_lang_kor = job_ko_add(sel_dream);


		$.ajax({
			type:"POST",
			data:{
				"exec"          : "insert_info",
				"mb_name"       : mb_name,
				"mb_phone"      : mb_phone,
				"mb_job"        : sel_dream,
				"mb_job_kor"    : job_lang_kor,
				"mb_image"      : mb_image
				//"mb_serial"     : mb_rs
			},
			url: "../main_exec.php",
			beforeSend: function(response){
				// $("#loading_div").show();
				$("#input_page").hide();
				$("#loading_div").show();
			},
			success: function(response){
				var rs_ch = response.split("||");
        //rs_ch[5] 아이이름 받침 유무, rs_ch[6] 직업 받침 유무 (0 or 0보다큰정수)
				mb_rs = rs_ch[2];
				// $("#loading_div").hide();
				// $("#contents_div").show();
				if (rs_ch[0] == "Y")
				{
					// 아이가 새로 매칭될 경우
					$("#matching_child_pic").attr("src",rs_ch[1]);
					$("#thx_ch_img").attr("src",rs_ch[1]);
					// $("#input_page").hide();
					$("#loading_div").fadeOut('fast', function(){
						// 이름, 매칭된 아이 이름, 꿈 표시하는 부분
						//m_rs_name, m_rs_ch_name, m_rs_job. m_rs_nation, m_rs_job2
						// var job_add		= job_ko_add(sel_dream);
						// job_add_arr		= job_add.split("||");
						//$("#m_rs_name").html(mb_name);
						$("#m_rs_ch_name").html(rs_ch[3]);
						$("#m_rs_desc").html(rs_ch[7]);
						//$("#m_rs_ch_name2").html(rs_ch[3]);
						$("#m_rs_ch_name3").html(rs_ch[3]);
						$("#thx_ch_name").html("'"+rs_ch[3]+"'");

            if(rs_ch[5] > 0) {
              //받침 O
              //$("#name2PP").html("이에요");
              $("#name3PP").html("이");
            }

						$("#m_rs_job").html(job_lang_kor);
						//$("#m_rs_job2").html(job_lang_kor);

						if(rs_ch[6] > 0){
              //받침 O
							$("#jobPP").html("을");
							//$("#job2PP").html("이");
						}

						//$("#m_rs_nation").html(rs_ch[4]);
						// $("#matching_share_page").show();
						$("#matching_share_page").fadeIn('fast');
						//open_pop('share_popup');
					});
				}else if (rs_ch[0] == "C"){
					// 아이가 매칭되었으나 결연은 안되었을 경우 ( 수정할수도 있음 )
					//$("#c_matching_child_pic").attr("src",rs_ch[1]);
					$("#matching_child_pic").attr("src",rs_ch[1]);
					// $("#input_page").hide();
					$("#loading_div").fadeOut('fast', function(){
						// 이름, 매칭된 아이 이름, 꿈 표시하는 부분
						//m_rs_name, m_rs_ch_name, m_rs_job. m_rs_nation, m_rs_job2
						// var job_add		= job_ko_add(sel_dream);
						// job_add_arr		= job_add.split("||");
						//$("#m_rs_name").html(mb_name);
						$("#m_rs_ch_name").html(rs_ch[3]);
						//$("#m_rs_ch_name2").html(rs_ch[3]);
						$("#m_rs_ch_name3").html(rs_ch[3]);
						$("#thx_ch_name").html("'"+rs_ch[3]+"'");

						if(rs_ch[5] > 0) {
							//받침 O
							//$("#name2PP").html("이에요");
							$("#name3PP").html("이");
						}
						
						$("#m_rs_job").html(job_lang_kor);
						//$("#m_rs_job2").html(job_lang_kor);
						
						if(rs_ch[6] > 0){
							$("#jobPP").html("을");
							//$("#job2PP").html("이");
						}

						//$("#m_rs_nation").html(rs_ch[4]);
						// $("#matching_share_page").show();
						$("#matching_share_page").fadeIn('fast');
					});
				}else{
					alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
					location.reload();
				}
			}
		});
	}

	function Ins_tracking()
	{
		$.ajax({
			type:"POST",
			data:{
				"exec"          : "insert_tracking_info",
				"media"     : "<?=$_REQUEST['media'];?>"
			},
			url: "../main_exec.php"
		});
	}

</script>
