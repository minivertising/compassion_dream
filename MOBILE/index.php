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
<div id="loading_div" class="wrap_page loading" style="display:none">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content">
      <div class="img_load">
        <img src="images/img_loading.png" />
      </div>
      <div class="txt_load">
      꿈이 필요한 어린이와 매칭중입니다<br>
      잠시만 기다려 주세요 
      </div>
    </div>
  </div>
</div>
<!-- index 메인 페이지 -->
	<div id="contents_div" class="wrap_page main_page">
    	<div class="wrap_top_bg">
            <div class="quick">
                <a href="http://www.compassion.or.kr" target="_blank"><img src="images/quick.png" /></a>
            </div>
            <div class="main_top clearfix">
                <div class="logo"><a href="index.php"><img src="images/logo_main.png" /></a></div>
                <div class="btn_how"><a href="#" onclick="open_pop('use_popup');return false;"><img src="images/btn_howto.png" /></a></div>
            </div>	
            <div class="main_block">
                <div class="title">
                    <img src="images/title_main.png" />
                </div>
                <div class="btn_block main">
                    <a href="#" onclick="show_dream_sel();return false;"><img src="images/btn_apply_main.png" /></a>
                </div>
            
                <div class="img_child">
                    <img src="images/img_main_child.png" />
                </div>
            </div>
            <div class="main_num">
                <div class="num"><?=number_format($total_matching_cnt)?></div>
                <img src="images/bg_main_num.png" />
            </div>    
        </div>
        
        <div class="people_list">
        	<div class="inner_people_list clearfix">
            	<div class="one"><img src="images/ex_list.png" /></div>
                <div class="one"><img src="images/ex_list.png" /></div>
                <div class="one"><img src="images/ex_list.png" /></div>
            </div>
        	
        </div>
        
        <div class="sec_movie">
        	<div class="title_movie"><img src="images/title_movie.png" /></div>
            <div class="youtube"><iframe allowfullscreen="1" src="<?=$_gl['youtube_url']?>" frameborder="0" id="ytplayer" class="ytplayer"></iframe></div>
            <div class="btn_movie_block">
            	<a href="#" class="apply" onclick="show_dream_sel();return false;"><img src="images/btn_apply_movie.png" /></a>
                <a href="#" class="howto" onclick="open_pop('use_popup');return false;"><img src="images/btn_howto_movie.png" /></a>
                <img src="images/bg_sec_movie.jpg" class="bg" />
            </div>
        </div>
        
        <div class="sec_child_num">
        	<div class="bg_bar">
            	<div class="inner_bg_bar">
                	<div class="txt_num">결연된 어린이 <?=number_format($total_matching_cnt)?>명 </div>
                	<div class="icon"><img src="images/icon_head.png" width="35" /></div>
                	<div class="bar"></div>
                </div>
            </div>
            <div class="num">
<?=number_format($total_remain_cnt)?>
            </div>
        	 <img src="images/bg_num_child.jpg" class="bg" />
        </div>
        
        <div class="sec_com">
        	<a href="http://www.compassion.or.kr" target="_blank"><img src="images/btn_go_com.png" /></a>
        	<img src="images/bg_com.jpg" class="bg" />
        </div>
    </div>
<!-- index 메인 페이지 -->

<!-- 사진 업로드 페이지 -->
    <div id="upload_page" class="wrap_page sub upload" style="display:none;">
    	<div class="inner">
            <div class="block_content">
                <div class="title">
                	<span class="small">당신의 어린시절 사진과 꿈을 올려주시면</span><br>
					'같은 꿈을 꾸고픈 어린이'가<br>
					당신 지인에게 소개됩니다
                </div>
                
                <div class="block_input_dream">
                	<div class="selec_job clearfix">
                    	<div class="txt_1" id="sel_job_txt">1. 내 어린시절 꿈 선택 </div>
                        <div class="txt_2"><a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_sec.png" width="60" id="sel_job_btn" /></a></div><!--버튼 두개입니다-->
                    </div>
                    <div class="upload_pic">
                    	<div class="title_pic">
                        	2. 사진업로드
                        </div>
                        <div class="desc">
                        	<div class="txt_pic">
                            	* 1개의 이미지 파일을 등록할 수 있습니다
                            </div>
                        	<div class="btns">
              <label for="inputImage" title="Upload image file">
                <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                <span title="Import image with Blob URLs"><img src="images/btn_select_pic.png" width="80" /></span>
              </label>


              <a href="#" onclick="open_pop('preview_popup')"><img src="images/btn_preview.png" width="80"  /></a>
                            </div>
                        </div>
                        <div id="img_div" class="pic_area">
            <img id="ori_image" src="./images/picture.jpg" alt="Picture" />
                        </div>
                        <div class="btn_closeup">
                        	<a href="#" onclick="zoom_action('down');return false;"><img src="images/btn_minus.png" width="80" /></a>
                            <a href="#" onclick="zoom_action('up');return false;"><img src="images/btn_plus.png" width="80" /></a>
                        </div>
                    </div>
                </div>
                <div class="block_btn upload">
                	<a href="#" onclick="dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
                </div>
            </div>
            
        </div>
    </div>
<!-- 사진 업로드 페이지 -->

<!-- 개인정보 입력 페이지 -->
    <div id="input_page" class="wrap_page sub input_data" style="display:none">
    	<div class="inner">
            <div class="block_content">
            	<div class="title">
					참여하신 분 중 추첨을 통해<br>
					컴패션 현지 센터를 방문할 수 있는<br>
					기회를 드립니다
                </div>
                <div class="block_input">
                	
                    <div class="sub_title">
                        참여자 정보
                    </div>
                    <div class="input_one clearfix">
                    	<div class="label">이름</div>
                        <div class="input"><input type="text" id="mb_name"></div>
                    </div>
                	<div class="input_one clearfix">
                    	<div class="label">휴대폰번호</div>
                        <div class="input"><input type="tel" id="mb_phone" placeholder="휴대폰번호 ('-' 없이 입력해주세요)" onkeyup="only_num(this);return false;"></div>
                    </div>
                    <div class="check clearfix">
          <a href="#" class="box" onclick="mb_check();return false;"><img src="images/check.png" name="mb_agree" id="mb_agree" /></a>
          <a href="#" class="txt">개인정보 수집 및 위탁에 관한 동의</a>
          <a href="#" class="bt" onclick="open_pop('agree_popup');return false;"><img src="images/btn_detail.png" /></a>
                    </div>
                </div>
                <div class="sub_title add">
                	추첨에 선정 되신 분께는 개별 연락 드립니다
                </div>
                <div class="block_btn">
                	<a href="#" onclick="input_submit();return false;"><img src="images/btn_next.png" /></a>
                </div>
            </div>
            
        </div>
    </div>
<!-- 개인정보 입력 페이지 -->

<!-- ACTIVATOR 매칭 결과 페이지 --> <!-- 임시 추가 -->
    <div id="matching_share_page" class="wrap_page share_match_child" style="display:none;">
    	<div class="inner">
            <div class="block_content">
<!--        <div class="title">
                	아래 SNS에 어린 시절 사진을 공유하여 <br>
                    <span>'아비가일 마아 야아 암퐁'</span>이<br>
                    후원자를 만날 수 있도록 해주세요!

              </div> -->
              <div class="title">
              		당신의 도움이 필요한 어린이는<br>
					'<span id="m_rs_ch_name">아비가일 마아 야아 암퐁</span>'입니다
              </div>
                <div class="block_child">
                	<div class="inner_block_child clearfix">
                        <div class="child_pic"><img src="images/ex_child.png" id="matching_child_pic" /></div>
                        <div class="child_text">
                            <h2>"저도 <span id="m_rs_job">선생님을</span> 꿈꿀 수 있을까요?"</h2>
                            <div class="bg_line">
                                <p>
                                    안녕하세요 <br>
                                    저는  필리핀에 살고 있는 기타에요<br>
                                    어린 시절에  선생님이 꿈이 셨군요<br>
                                    저도 언젠가는 그렇게 멋진 꿈을 꾸고 싶어요!
                                    어린 시절에  선생님이 꿈이 셨군요<br>
                                    어린 시절에  선생님이 꿈이 셨군요<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block_txt">
                	SNS에 공유하셔서<br>
					<span id="m_rs_ch_name3">기타</span>의 후원자를 찾아주세요
                </div>
                <div class="block_btn sns">
                	<a href="#" onclick="sns_share('fb','act');return false;"><img src="images/sns_f.png" /></a>
                	<a href="#" onclick="sns_share('kt','act');return false;"><img src="images/sns_kt.png" /></a>
                	<a href="#" onclick="sns_share('ks','act');return false;"><img src="images/sns_ks.png" /></a>
                </div>
                <div class="block_btn howtotag">
                	<a href="#"  onclick="open_pop('exam_share_popup');return false;" class="clearfix">
                    	<span>어린이들을 도울 수 있는 SNS별 친구 태그 방법 보기</span>
                        <img src="images/btn_more.png" width="20" />
                    </a>
                </div>
                <div class="block_btn ok">
                	<a href="index.php"><img src="images/btn_ok.png" /></a>
                </div>
            </div>
            
        </div>
    </div>
<!-- ACTIVATOR 매칭 결과 페이지 -->

<?
	include_once "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
	var sel_dream       = null;
	var runner_serial   = null;
	var mb_job          = null;
	var mb_image        = null;
	var $ori_image = $('#ori_image');
	var $inputImage = $('#inputImage')
  var $preview = $('.preview');
	var URL = window.URL || window.webkitURL;
	//var realFath;
	//var convertPath;
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
		var yt_width = $(".youtube").width();
		var yt_height = (yt_width / 16) * 9;
		$("#ytplayer").width(yt_width);
		$("#ytplayer").height(yt_height);
		$(".youtube").height(yt_height);

		// gage 스타일 적용
		var gage_w	= (<?=$total_matching_cnt?>/3000)*100;
		$(".bar").css("width",gage_w+"%");
		$(".icon").css("left",gage_w+"%");
		Ins_tracking();



		Ins_tracking();
    });
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

        build: function (e) {
          console.log(e.type);
        },
        built: function (e) {
          console.log(e.type);
        },
        cropstart: function (e) {
          console.log(e.type, e.action);
        },
        cropper: function (e) {
          console.log(e.type, e.action);
        },
        cropend: function (e) {
          console.log(e.type, e.action);
        },
        crop: function (e) {
          console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
        },
        zoom: function (e) {
          console.log(e.type, e.ratio);
         }
    });
}

$($inputImage).change(function(){
	inputImageCheck = "Y";
	//files = this.files;
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
	//readURL(this);
});


function zoom_action(type){
  if(type=="up")
  {
    $($ori_image).cropper('zoom', 0.1);
  }else{
    $($ori_image).cropper('zoom', -0.1);
  }
}


function dream_next()
{
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

	// 사진 저장할 내용 추가
	/*
	$($ori_image).cropper('getCroppedCanvas', {width:1200, height:630}).toBlob(function (blob) {
	  var formData = new FormData();
	  // formData.append('croppedImage', blob);
	  formData.append('croppedImage', blob, "test.jpg");
	*/
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
			// $("#loading_div").show();
      // $("#upload_page").hide();
			$("#upload_page").fadeOut('fast', function(){
				$("body").addClass("bg_sub_page bg_loading");
				$("#loading_div").fadeIn('fast');
			});
		},
		success: function (res) {
			// console.log(data);
			//mb_image    = data;
			//open_pop('input_popup');
			var rs_ch = res.split("||");
			if (rs_ch[0] == "Y")
			{
				// 매칭될 아이가 있을 경우
				mb_image    = rs_ch[1];
				setTimeout(function(){
					$("#loading_div").fadeOut('slow', function(){
						$("body").removeClass("bg_sub_page bg_loading");
							$("#input_page").fadeIn('slow');
					});
				},1500);
			}else if (rs_ch[0] == "N"){
				// 매칭될 아이가 없을 경우
				mb_image    = rs_ch[1];
				mb_rs       = rs_ch[2];
				setTimeout(function(){
					$("#loading_div").fadeOut('slow', function(){
  						$("#no_matching_page").fadeIn('slow');
					});
				},1500);
			}else {
				// 에러 
				alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
				location.reload();
			}
		}

	/*
	  $.ajax('./upload2.php', {
		method: "POST",
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function(response){
			$("#loading_div").show();
			$("#upload_page").hide();
		},
		success: function (data) {
			alert(data);
			// console.log(data);
			//mb_image    = data;
			//open_pop('input_popup');
			var rs_ch = res.split("||");
			if (rs_ch[0] == "Y")
			{
				// 매칭될 아이가 있을 경우
				mb_image    = rs_ch[1];
				$("#loading_div").hide();
				$("#input_page").show();
			}else if (rs_ch[0] == "N"){
				// 매칭될 아이가 없을 경우
				mb_image    = rs_ch[1];
				mb_rs       = rs_ch[2];
				$("#loading_div").hide();
				$("#no_matching_page").show();

			}else {
				// 에러 
				alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
				location.reload();
			}
		}
		*/
	});
	//    
	// if (mb_job == "")
	// {
	//     alert("당신의 어린시절 꿈을 선택해 주세요.");
	//     return false;
	// }
	

}

function input_submit()
{
	var mb_name = $("#mb_name").val();
	var mb_phone    = $("#mb_phone").val();
	//mb_image      = "임시 이미지 URL"; // 이미지 경로 작업 완료되면 여기에 값 추가

	if (mb_name == "")
	{
		alert("이름을 입력해 주세요.");
		$("#mb_name").focus();
		return false;
	}

	if (mb_phone == "")
	{
		alert("전화번호를 입력해 주세요.");
		$("#mb_phone").focus();
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
			// $("#loading_div").show();
			// $("#contents_div").hide();
			$("#input_page").fadeOut('slow', function(){
			  // $("#loading_div").fadeIn('slow'); // 로딩이 계속 남아있어 주석처리
			});
		},
		success: function(response){
				alert(response);
				var rs_ch = response.split("||");
				mb_rs = rs_ch[2];
		  // $("#loading_div").hide();
		  // $("#contents_div").show();
		  // $("#loading_div").fadeOut('fast', function(){
		  //   alert("loading_div unset");
		  // });
				if (rs_ch[0] == "Y")
				{
					// 아이가 새로 매칭될 경우
					$("#matching_child_pic").attr("src",rs_ch[1]);
			// $("#input_page").hide();
					// $("#input_page").fadeOut('slow', function(){

					// 이름, 매칭된 아이 이름, 꿈 표시하는 부분
					
					var job_add		= job_ko_add(sel_dream);
					job_add_arr		= job_add.split("||");
					//$("#m_rs_name").html(mb_name);
					$("#m_rs_ch_name").html(rs_ch[3]);
					$("#m_rs_ch_name2").html(rs_ch[3]);
					$("#m_rs_ch_name3").html(rs_ch[3]);
					$("#m_rs_job").html(job_add_arr[0]);
					$("#m_rs_job2").html(job_add_arr[1]);
					$("#m_rs_nation").html(rs_ch[4]);
					
					$("#loading_div").fadeOut('fast', function(){
							  $("#matching_share_page").fadeIn('slow');
					})

				}else if (rs_ch[0] == "C"){
					// 아이가 매칭되었으나 결연은 안되었을 경우 ( 수정할수도 있음 )
					//$("#c_matching_child_pic").attr("src",rs_ch[1]);
					$("#matching_child_pic").attr("src",rs_ch[1]);
			// $("#input_page").hide();
					// $("#input_page").fadeOut('slow');
					// 이름, 매칭된 아이 이름, 꿈 표시하는 부분
					
					var job_add		= job_ko_add(sel_dream);
					job_add_arr		= job_add.split("||");
					//$("#m_rs_name").html(mb_name);
					$("#m_rs_ch_name").html(rs_ch[3]);
					$("#m_rs_ch_name2").html(rs_ch[3]);
					$("#m_rs_ch_name3").html(rs_ch[3]);
					$("#m_rs_job").html(job_add_arr[0]);
					$("#m_rs_job2").html(job_add_arr[1]);
					$("#m_rs_nation").html(rs_ch[4]);
					
					// $("#matching_share_page").show();
					$("#loading_div").fadeOut('fast', function(){
							  $("#matching_share_page").fadeIn('slow');
					})
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
			"media"			: "<?=$_REQUEST['media'];?>"
        },
        url: "../main_exec.php"
    });
}

</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->
