<?
	include_once "./header.php";
	if (isset($_REQUEST['lmsflag']))
		$lms_flag = $_REQUEST['lmsflag'];
	else
		$lms_flag = "N";

	$total_runner_cnt   = @total_runner_info();
	$total_pic_cnt      = @total_pic_info();
	$total_matching_cnt = @total_matching_info();
	//$total_matching_cnt		= 1000;
	$total_remain_cnt			= $total_runner_cnt - $total_matching_cnt;
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
<?
	if ($lms_flag == "Y")
	{
?>
<div id="contents_div" class="wrap_page lms_landing">
	<div class="logo"><a href="#" onclick="location.reload();"><img src="images/logo_lms.png" /></div>
	<div class="title">
		<img src="images/title_lms.png" />
	</div>
	<div class="sec_movie yt_player">
		<iframe allowfullscreen="1" src="<?=$_gl['youtube_url']?>" frameborder="0" id="ytplayer" class="ytplayer"></iframe>
	</div>
	<div class="sec_txt">
      <img src="images/txt_lms_body_01.png" />
    </div>
    <div class="btn_block">
      <div class="vision"><a href="#" onclick="open_pop('trip_popup');return false;"><img src="images/btn_vision.png" /></a> </div>
    </div>
    <div class="sec_txt">
      <img src="images/txt_lms_body_02.png" />
    </div>
    <div class="btn_block">
      <div class="apply"><a href="#" onclick="show_dream_sel();return false;"><img src="images/btn_apply_lms.png" /></a> </div>
      <div class="more"><a href="#" onclick="open_pop('use_popup');return false;"><img src="images/btn_more_lms.png" /></a> </div>
    </div>

	<!-- <div class="sec_txt">
		<img src="images/txt_lms_body.png" />
	</div>
	<div class="btn_block">
		<div class="vision"><a href="#" onclick="open_pop('trip_popup');return false;"><img src="images/btn_vision.png" /></a> </div>
		<div class="apply"><a href="#" onclick="show_dream_sel();return false;"><img src="images/btn_apply_lms.png" /></a> </div>
		<div class="more"><a href="#" onclick="open_pop('use_popup');return false;"><img src="images/btn_more_lms.png" /></a> </div>
	</div> -->
</div>
<?
	}else{
?>
<div id="contents_div" class="wrap_page main_page">
	<div class="wrap_top_bg">
		<div class="quick">
			<a href="http://www.compassion.or.kr/mobile/compassion_mobile.aspx" target="_blank"><img src="images/quick.png" /></a>
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
			<div class="num"><?=number_format($total_runner_cnt)?></div>
			<img src="images/bg_main_num.png" />
		</div>    
	</div>
	<div class="people_list">
		<div class="inner_people_list clearfix">
<?
	$slider_query = "SELECT * FROM ".$_gl['activator_info_table']." order by idx DESC limit 20";
	$slider_res = mysqli_query($my_db, $slider_query);

	while ($slider_data = @mysqli_fetch_array($slider_res))
	{
?>
					<div class="one"><img src="<?=$slider_data['mb_image']?>" /></div>
<?
	}
?>
		</div>
	</div>
	<div class="sec_movie">
		<div class="title_movie"><img src="images/title_movie.png" /></div>
		<div class="youtube yt_player"><iframe allowfullscreen="1" src="<?=$_gl['youtube_url']?>" frameborder="0" id="ytplayer" class="ytplayer"></iframe></div>
		<div class="btn_movie_block">
			<div onclick="show_dream_sel();return false;"><a href="#" class="apply"><img src="images/btn_apply_movie.png" /></a></div>
			<div onclick="open_pop('use_popup');return false;"><a href="#" class="howto"><img src="images/btn_howto_movie.png" /></a></div>
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
<?
	}
?>

<!-- index 메인 페이지 -->

<?
	include_once "./page_div.php";
	include_once "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
	var sel_dream     = null;
	var runner_serial   = null;
	var mb_job        = null;
	var mb_image      = null;
	var $ori_image      = $('#ori_image');
	var $inputImage   = $('#inputImage')
	var $preview      = $('.preview');
	var URL         = window.URL || window.webkitURL;
	var flag_sel_dream  = 0;
	var mb_rs       = null;
	var chk_mb_flag   = 0;
	var share_cnt     = 0;
	var blobURL;
	var file;
	var files;
	var inputImageCheck;
	var s_ugu	= null;
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
		var yt_width = $(".yt_player").width();
		var yt_height = (yt_width / 16) * 9;
		$("#ytplayer").width(yt_width);
		$("#ytplayer").height(yt_height);
		$(".yt_player").height(yt_height);
		// gage 스타일 적용
		var gage_w	= (<?=$total_matching_cnt?>/<?=$total_remain_cnt?>)*100;
		$(".bar").css("width",gage_w+"%");
		$(".icon").css("left",gage_w+"%");
		// 미리보기 제어
		$(".preview").width($(document).width()*0.9);
		s_ugu	= 'act';

		$('.inner_people_list').bxSlider({
			ticker: true,
			speed: 20000,
			//minSlide: 3,
			//maxSilde: 3,
			slideWidth: 120,
			slideMargin: 2
			// responsive: true,
			// adaptiveHeight: true
		});

		Ins_tracking();
		});


	    $inputImage.change(function (){
        inputImageCheck = "Y";
        $("#img_div").show();
        $(".btn_closeup").show();
        $($ori_image).cropper('destroy');
        $('#img_save').ajaxSubmit({
            beforeSubmit: function (){
                $($ori_image).attr('src', './images/bx_loader.gif');
            },
            success: function (data) {
              // console.log(data);
                $($ori_image).attr('src', data);
                image_crop();
            }
        })
    });


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
				background: false,
				cropBoxMovable: true,
				cropBoxResizable: true,
				preview: '.preview',
				center:true,
				zoomOnWheel:false,
				toggleDragModeOnDblclick:false,
		});
}

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
		success: function (res) {
			// console.log(data);
			//mb_image    = data;
			//open_pop('input_popup');
			var rs_ch = res.split("||");
			if (rs_ch[0] == "Y")
			{
				// 매칭될 아이가 있을 경우
				mb_image    = rs_ch[1];
					$("#upload_page").fadeOut('slow', function(){
							$("#input_page").fadeIn('slow');
					});
			}else if (rs_ch[0] == "N"){
				// 매칭될 아이가 없을 경우
				mb_image    = rs_ch[1];
				mb_rs       = rs_ch[2];
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
		},
		url: "../main_exec.php",
		beforeSend: function(response){
			$("#input_page").fadeOut('fast', function(){
				$("body").addClass("bg_sub_page bg_loading");
				$("#loading_div").fadeIn('fast');
			});

		},
		success: function(response){
				var rs_ch = response.split("||");
				mb_rs = rs_ch[2];
				if (rs_ch[0] == "Y")
				{
					// 아이가 새로 매칭될 경우
					$("#matching_child_pic").attr("src",rs_ch[1]);
					$("#thx_ch_img").attr("src",rs_ch[1]);
			// $("#input_page").hide();
					// $("#input_page").fadeOut('slow', function(){
					// 이름, 매칭된 아이 이름, 꿈 표시하는 부분

						// var job_add   = job_ko_add(sel_dream);
						// job_add_arr   = job_add.split("||");
						//$("#m_rs_name").html(mb_name);
						$("#m_rs_ch_name").html(rs_ch[3]);
						$("#m_rs_ch_name2").html(rs_ch[3]);
						// $("#m_rs_ch_name3").html(rs_ch[3]);
						$("#thx_ch_name").html("'"+rs_ch[3]+"'");
						// $("#m_rs_job").html(job_add_arr[0]);
						// $("#m_rs_job2").html(job_add_arr[1]);
						$("#m_rs_nation").html(rs_ch[4]);
						$("#m_rs_desc").html(rs_ch[7]);

						if(rs_ch[5] > 0) {
							//받침 O
							// $("#name2PP").html("이에요");
							// $("#name3PP").html("이");
							$("#thxNamePP").html("이");
						}

						$("#m_rs_job").html(job_lang_kor);
						$("#m_rs_job2").html(job_lang_kor);

						if(rs_ch[6] > 0){
							//받침 O
							$("#jobPP").html("을");
							// $("#job2PP").html("이");
						}

					$("#loading_div").fadeOut('fast', function(){
						$("body").removeClass("bg_sub_page bg_loading");
						$("#matching_share_page").fadeIn('fast');
					});
				}else if (rs_ch[0] == "C"){
					// 아이가 매칭되었으나 결연은 안되었을 경우 ( 수정할수도 있음 )
					$("#matching_child_pic").attr("src",rs_ch[1]);
					$("#re_matching_child_pic").attr("src",rs_ch[1]);
					$("#thx_ch_img").attr("src",rs_ch[1]);
					$("#m_rs_job").html(job_lang_kor);
					$("#m_rs_job2").html(job_lang_kor);
					$("#act_name").html(mb_name);
					$("#re_ch_name").html("'"+rs_ch[3]+"'");
					$("#re_ch_name2").html("'"+rs_ch[3]+"'");
					$("#thx_ch_name").html("'"+rs_ch[3]+"'");
					$("#m_rs_desc").html(rs_ch[7]);
					if(rs_ch[5] > 0)
					{
						$("#reNamePP").html("을");
						$("#reName2PP").html("이");
						$("#thxNamePP").html("이");
					}

					if(rs_ch[6] > 0)
					{
						$("#jobPP").html("을");
					}

					$("#loading_div").fadeOut('fast', function(){
						$("body").removeClass("bg_sub_page bg_loading");
						$("#re_matching_share_page").fadeIn('fast',function(){
							$("body").removeClass("bg_sub_page bg_loading");
							$("#loading_div").hide();
						});

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

function sns_share(media, flag, page)
{
	if (media == "fb")
	{
		
		//https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer
		//var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.belif-play.com/PC/index.php'),'sharer','toolbar=0,status=0,width=600,height=325');
		var newWindow = window.open('https://www.facebook.com/dialog/share?app_id=649187078561789&display=popup&hashtag=내꿈꿔&href=' + encodeURIComponent('http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu=act'),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
				"mb_gubun" : flag,
				"mb_serial"  : mb_rs
			}
		});
	}else if (media == "kt"){
		// 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		//Kakao.Link.createTalkLinkButton({
		$.ajax({
			type:"POST",
			data:{
				"exec"			: "url_info",
				"mb_serial"		: mb_rs,
				"ugu"			: "act"
			},
			url: "../main_exec.php",
			success: function(response){
				var img_url	= response;

				Kakao.Link.sendTalkLink({
				  //container: '#kakao-link-btn',
				  label: '컴패션 "내꿈꿔" 릴레이\n\r\n\r어릴적 제 꿈이 뭔지 아시나요?\n\r오늘 제가 소개하는 이 어린이도 꿈을 이룰 수 있도록 "내꿈꿔" 릴레이에 함께해주세요!',
				  image: {
					src: img_url,
					width: '1200',
					height: '630'
				  },
				  webButton: {
					text: '링크 열기',
					url: 'http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu=act' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
				  }
				});

			}
		});

		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
				"mb_gubun" : flag,
				"mb_serial"  : mb_rs
			}
		});
	}else{
		Kakao.Story.share({
			url: 'http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu=act',
			text: '#내꿈꿔'
		});
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
				"mb_gubun" : flag,
				"mb_serial"  : mb_rs
			}
		});
	}
	$("#sns_exam_page").fadeOut('fast', function(){
		$("#"+page).fadeIn('fast');
	})

}
</script>