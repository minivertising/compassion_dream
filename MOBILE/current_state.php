<?
    include_once "./header.php";

	$ch_data	= sel_child_info($mb_data['mb_child']);

	$share_count	= $mb_data['mb_share_cnt'] + $mb_data['mb_f_share_cnt'];
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
<div id="contents_div" class="wrap_page mystatus">
	<!-- <div class="logo"><a href="#" onclick="location.reload();"><img src="images/logo_lms.png" /></div> -->
  <div class="head_title">
    <img src="images/title_status.png" width="95" />
  </div>
  <div class="title">
    <span><?=$mb_data['mb_name']?></span>님의 어릴적 사진은<br>
    <span><?=number_format($share_count)?></span>명에 의해 공유되고 있습니다
  </div>
  <div class="pic_child">
    <div><img src="<?=$ch_data['ch_full_img_url']?>" /></div>
<?
	if ($ch_data['ch_choice'] == "Y")
	{
?>
    <div class="txt_wating">
    후원자님을 만났어요
    </div>
  </div>
  <div class="head_title t_2">
    <img src="images/title_sponsor_ox.png" width="70" />
  </div>
  <div class="txt_status">
    <span><?=$mb_data['mb_name']?></span>님의 어린이는<br>
    <span class="yellow">결연이 완료</span>되었습니다
  </div>
  <div class="txt_status_2">
     -회원님의 링크는 <?=$ch_data['ch_nick']?><?= has_batchim($ch_data['ch_nick']) > 0 ? "과" : "와" ?> 같이<br>
     도움이 필요한 어린이를 위해 달리게 됩니다.
  </div>
  <div class="btn_block last">
    <a href="index.php"><img src="images/btn_help_oher.png"/></a> 
  </div>
<?
	}else{
?>
    <div class="txt_wating">
    후원자님을 기다리고 있어요!
    </div>
  </div>
  <div class="head_title t_2">
    <img src="images/title_sponsor_ox.png" width="70" />
  </div>
  <div class="txt_status">
    <span><?=$mb_data['mb_name']?></span>님의 어린이는<br>
    <span class="yellow">결연을 기다리는 중</span>입니다
  </div>
  <div class="btn_block bt_2">
    <a href="#" onclick="go_other_sns();return false;"><img src="images/btn_more_people.png"/></a> 
  </div>
  <div class="btn_block last">
    <a href="#" onclick="show_dream_sel();$('body').attr('class','bg_sub_page');return false;"><img src="images/btn_new_pic.png"/></a> 
  </div>
<?
	}
?>
</div>
<?
	include_once "./page_div.php";
	include_once "./popup_div.php";
?>

</body>
</html>
<script type="text/javascript">
	var sel_dream			= null;
	var runner_serial		= null;
	var mb_job				= null;
	var mb_image			= null;
	var $ori_image			= $('#ori_image');
	var $inputImage		= $('#inputImage')
	var $preview			= $('.preview');
	var URL					= window.URL || window.webkitURL;
	var flag_sel_dream	= 0;
	var mb_rs				= null;
	var chk_mb_flag		= 0;
	var share_cnt			= 0;
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
		s_ugu	= 'act';
    });
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
		background: false,
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
	$("#img_div").show();
	$(".btn_closeup").show();
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

	var croppedCanvas = $($ori_image).cropper('getCroppedCanvas', {width:1200, height:630});
	crop_image_url = croppedCanvas.toDataURL("image/jpeg");

	$.ajax({
		method: 'POST',
		url: '../main_exec.php',
		data: {
			exec					: "state_input_image",
			crop_image_url	: crop_image_url,
			mb_job				: sel_dream,
			mb_name			: "<?=$mb_data['mb_name']?>",
			mb_phone			: "<?=$mb_data['mb_phone']?>",
			mb_child			: "<?=$mb_data['mb_child']?>"
		},
		beforeSend: function(response){
			$("#upload_page").fadeOut('fast', function(){
				$("body").addClass("bg_sub_page bg_loading");
				$("#loading_div").fadeIn('fast');
			});
		},
		success: function (res) {
			var rs_ch = res.split("||");
			if (rs_ch[0] == "Y")
			{
				// 매칭될 아이가 있을 경우
				mb_image	= rs_ch[1];
				mb_rs		= rs_ch[2];
				$("#re_matching_child_pic").attr("src","<?=$ch_data['ch_full_img_url']?>");
				$("#thx_ch_img").attr("src","<?=$ch_data['ch_full_img_url']?>");
				//var job_add		= job_ko_add(sel_dream);
				//job_add_arr		= job_add.split("||");
				$("#act_name").html("<?=$mb_data['mb_name']?>");
				$("#re_ch_name").html("'<?=$ch_data['ch_nick']?>'");
				$("#re_ch_name2").html("'<?=$ch_data['ch_nick']?>'");
				$("#thx_ch_name").html("'<?=$ch_data['ch_nick']?>'");
				setTimeout(function(){
					$("#loading_div").fadeOut('slow', function(){
						$("body").removeClass("bg_sub_page bg_loading");

							$("#re_matching_share_page").fadeIn('slow');
					});
				},1500);
			}else {
				// 에러 
				alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
				location.reload();
			}
		}

	});
}

function go_other_sns()
{
	mb_rs		= "<?=$rs?>";
	$("#re_matching_child_pic").attr("src","<?=$ch_data['ch_full_img_url']?>");
	$("#thx_ch_img").attr("src","<?=$ch_data['ch_full_img_url']?>");
	//var job_add		= job_ko_add(sel_dream);
	//job_add_arr		= job_add.split("||");
	$("#act_name").html("<?=$mb_data['mb_name']?>");
	$("#re_ch_name").html("'<?=$ch_data['ch_nick']?>'");
	$("#re_ch_name2").html("'<?=$ch_data['ch_nick']?>'");
	$("#thx_ch_name").html("'<?=$ch_data['ch_nick']?>'");

	$("#contents_div").fadeOut('fast', function(){
		$("body").attr("class","bg_sub_page");
		$("#re_matching_share_page").fadeIn('fast');
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
