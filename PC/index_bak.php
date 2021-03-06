<?
include_once "./header.php";

$total_runner_cnt   = total_runner_info();
$total_pic_cnt      = total_pic_info();
//$total_matching_cnt = total_matching_info();
$total_matching_cnt = 1000;
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
<!-- 메인 index -->
<div class="wrap_sec_top">
  <div class="bg_wrap_sec_top">
    <div class="inner">
      <div class="logo"><a href="./index.php"><img src="images/logo.png" /></a></div>
      <div class="title"><img src="images/title_main.png" /></div>
      <div class="block_img">
        <div><a href="#" onclick="show_dream_sel();return false;"><img src="images/btn_partin.png" /></a></div>
        <div class="status">
          <div class="child">
            <div class="num"><?=$total_matching_cnt?></div>
            <div class="bar">
              <div class="inner_bar">
                <div class="heart"><img src="images/bar_heart.png" /></div>
                <div class="g"></div>
              </div>
            </div>
          </div>
          <div class="people">
            <div class="num"><?=$total_runner_cnt?></div>
          </div>
        </div>
        <div class="btn_howto">
          <a href="#" onclick="open_pop('use_popup');return false;"><img src="images/btn_howto.png" /></a>
        </div>
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
  </div>
</div>

<div class="wrap_sec_com">
  <div class="inner">
    <div class="title"><img src="images/title_com.png" /></div>
    <div class="img">
      <a href="http://www.compassion.or.kr/" target="_blank"><img src="images/btn_compassion.png" /></a>
    </div>
  </div>
</div>
<div class="wrap_sec_footer">
  <div class="inner">
    <div class="img"><img src="images/img_footer.jpg" /></div>
  </div>
</div>
<!-- 메인 index -->

<!-- 사진 업로드 페이지 -->
<div id="upload_page" class="wrap_sec_top_sub" style="display:none;">
  <div class="inner">
    <div class="logo"><a href="./index.php"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content upload">
      <div class="title">
        <div class="main"><span>'기타'</span>에게 어떤 꿈을 이어 주실 건가요?</div>
      </div>
      <div class="block_input_dream">
        <div class="selec_job">
          <span id="sel_job_txt">1. 꿈꾸던 직업선택</span> <a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_sec.png" id="sel_job_btn" /></a><!--버튼 두개입니다-->
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
                  <input type="file" id="inputImage" class="sr-only" name="file" accept="image/*">
                  <span title="Import image with Blob URLs"><img src="images/btn_select_pic.png" style="cursor:pointer;"/></span>
                  <a href="#" onclick="open_pop('preview_popup');return false;"><img src="images/btn_preview.png" /></a>
                </label>
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
      어린시절의 <span id="m_rs_name">미니버</span>님과 같이<br> 꿈이 필요한 어린이는 '<span id="m_rs_ch_name">기타</span>' 입니다
      </div>
      <div class="block_child">
        <div class="img_letter"><img src="images/img_letter.png" /></div>
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="images/ex_child.png" id="matching_child_pic" /></div>
          <div class="child_text">
            <h2>저도 <span id="m_rs_job">선생님을</span> 꿈꿀 수 있을까요?</h2>
            <p>
            안녕하세요 <br>
            저는  <span id="m_rs_nation">필리핀</span>에 살고 있는 <span id="m_rs_ch_name2">기타</span>에요<br>
            어린 시절에  <span id="m_rs_job2">선생님이</span> 꿈이 셨군요<br>
            저도 언젠가는 그렇게 멋진 꿈을 꾸고 싶어요!
            </p>
          </div>
        </div>
      </div>
      <div class="block_txt">
        <p>당신의 어린시절 사진을 공유하면 참여가 완료됩니다</p>
        <p>끝까지 참여해주셔서 <span>'기타'</span>의 후원자님 찾아주세요</p>
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="sns_share('fb','act');"><img src="images/sns_f.png" /></a>
        <!-- <a href="#" onclick="sns_share('kt','act');"><img src="images/sns_kt.png" /></a> -->
        <a href="#" onclick="sns_share('ks','act');"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭 결과 페이지 -->

<!-- ACTIVATOR 매칭없을시 컴페션 소개 페이지 -->
<div id="no_matching_page" class="wrap_sec_top_sub match_child" style="display:none">
  <div class="inner">
    <div class="logo"><a href="./index.php"><img src="images/logo_sub.png" /></a></div>
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
        <a href="#" onclick="sns_share('fb','act');"><img src="images/sns_f.png" /></a>
        <!-- <a href="#"><img src="images/sns_kt.png" /></a> -->
        <a href="#" onclick="sns_share('ks','act');"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭없을시 컴페션 소개 페이지 -->



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
    var $previews = $('.preview');
	var URL = window.URL || window.webkitURL;
	var blobURL;
	var file;
	var files;
	var flag_sel_dream  = 0;
	var mb_rs       = null;
	var inputImageCheck;
	var chk_mb_flag = 0;
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


function readURL(input) {

	if (input.files && input.files[0]) {
		file = files[0];
		if (/^image\/\w+$/.test(file.type)) {
			blobURL = URL.createObjectURL(file);
			$ori_image.one('built.cropper', function () {
							// Revoke when load complete
							URL.revokeObjectURL(blobURL);
						}).cropper('reset').cropper('replace', blobURL);
			$($inputImage).val('');
		} else {
			window.alert('Please choose an image file.');
					// }
					// var reader = new FileReader();
					// reader.onload = function (e) {
					//     alert("onload");
					//     $($ori_image).attr('src', e.target.result);
					//     image_crop();
		}
					// realFath = input.files[0].name;
					// reader.readAsDataURL(input.files[0]);
	}else if((navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1)){
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
	inputImageCheck = "Y";
	files = this.files;
// console.dir(this);
// if ( (navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1) ) {
//  // $($ori_image).cropper('destroy');
//  $('#ie_img_save').ajaxSubmit({
//      success: function (data) {
//          console.dir(data);
//      }
//  });
//  // this.select();
//  // realFath = document.selection.createRangeCollection()[0].text.toString();
//  // this.blur();
//  }
	readURL(this);
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
				beforeSend: function(response){
					$("#loading_div").show();
					$("#contents_div").hide();
				},
				success: function(res){
					// mb_image    = res;

					var rs_ch = res.split("||");
					$("#loading_div").hide();
					$("#contents_div").show();
					if (rs_ch[0] == "Y")
					{
						// 매칭될 아이가 있을 경우
						mb_image    = rs_ch[1];
						$("#upload_page").hide();
						$("#input_page").show();
						//open_pop('input_popup');
					}else if (rs_ch[0] == "N"){
						// 매칭될 아이가 없을 경우
						mb_image    = rs_ch[1];
						mb_rs       = rs_ch[2];
						//$("#no_matching_child_pic").attr("src",mb_image);
						//open_pop('no_matching_popup');
						$("#upload_page").hide();
						$("#no_matching_page").show();

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
				beforeSend: function(response){
					$("#loading_div").show();
					$("#contents_div").hide();
				},
				success: function(res){
					// console.log(res);
					//mb_image    = res;

					var rs_ch = res.split("||");
					$("#loading_div").hide();
					$("#contents_div").show();
					if (rs_ch[0] == "Y")
					{
						// 매칭될 아이가 있을 경우
						mb_image    = rs_ch[1];
						$("#upload_page").hide();
						$("#input_page").show();
						//open_pop('input_popup');
					}else if (rs_ch[0] == "N"){
						// 매칭될 아이가 없을 경우
						mb_image    = rs_ch[1];
						mb_rs       = rs_ch[2];
						//$("#no_matching_child_pic").attr("src",mb_image);
						//open_pop('no_matching_popup');
						$("#upload_page").hide();
						$("#no_matching_page").show();

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


		$.ajax({
			type:"POST",
			data:{
				"exec"          : "insert_info",
				"mb_name"       : mb_name,
				"mb_phone"      : mb_phone,
				"mb_job"        : sel_dream,
				"mb_image"      : mb_image
				//"mb_serial"     : mb_rs
			},
			url: "../main_exec.php",
			beforeSend: function(response){
				$("#loading_div").show();
				$("#contents_div").hide();
			},
			success: function(response){
				var rs_ch = response.split("||");
				mb_rs = rs_ch[2];
				$("#loading_div").hide();
				$("#contents_div").show();
				if (rs_ch[0] == "Y")
				{
					// 아이가 새로 매칭될 경우
					$("#matching_child_pic").attr("src",rs_ch[1]);
					$("#input_page").hide();
					// 이름, 매칭된 아이 이름, 꿈 표시하는 부분
					//m_rs_name, m_rs_ch_name, m_rs_job. m_rs_nation, m_rs_job2
					var job_add		= job_ko_add(sel_dream);
					job_add_arr		= job_add.split("||");
					$("#m_rs_name").html(mb_name);
					$("#m_rs_ch_name").html(rs_ch[3]);
					$("#m_rs_ch_name2").html(rs_ch[3]);
					$("#m_rs_job").html(job_add_arr[0]);
					$("#m_rs_job2").html(job_add_arr[1]);
					$("#m_rs_nation").html(rs_ch[4]);
					$("#matching_share_page").show();
					//open_pop('share_popup');
				}else if (rs_ch[0] == "C"){
					// 아이가 매칭되었으나 결연은 안되었을 경우 ( 수정할수도 있음 )
					//$("#c_matching_child_pic").attr("src",rs_ch[1]);
					$("#matching_child_pic").attr("src",rs_ch[1]);
					$("#input_page").hide();
					// 이름, 매칭된 아이 이름, 꿈 표시하는 부분
					//m_rs_name, m_rs_ch_name, m_rs_job. m_rs_nation, m_rs_job2
					var job_add		= job_ko_add(sel_dream);
					job_add_arr		= job_add.split("||");
					$("#m_rs_name").html(mb_name);
					$("#m_rs_ch_name").html(rs_ch[3]);
					$("#m_rs_ch_name2").html(rs_ch[3]);
					$("#m_rs_job").html(job_add_arr[0]);
					$("#m_rs_job2").html(job_add_arr[1]);
					$("#m_rs_nation").html(rs_ch[4]);
					$("#matching_share_page").show();
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

	function show_dream_sel()
	{
		$("#ytplayer").each(function(){
			this.contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*')
		});
		$(".wrap_sec_top").hide();
		$(".wrap_sec_com").hide();
		$(".wrap_sec_movie").hide();
		$(".wrap_sec_footer").hide();

		$("body").addClass("bg_sub_page");
		$("#upload_page").show();
		image_crop();
	}

	function mb_check()
	{
		if (chk_mb_flag == 0)
		{
			$("#mb_agree").attr("src","images/checked.png");
			chk_mb_flag = 1;
		}else{
			$("#mb_agree").attr("src","images/check.png");
			chk_mb_flag = 0;
		}
	}

</script>
