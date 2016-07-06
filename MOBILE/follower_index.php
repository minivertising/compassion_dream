<?
	include_once "./header.php";

	// ins_share_cnt($rs);

	// PC에서 유입시 PC로 이동
	if ($gubun == "PC")
		echo "<script>location.href='../PC/follower_index.php?rs=".$rs."&ugu=".$ugu."';</script>";

	$ch_data	= sel_child_info($mb_data['mb_child']);
	$convert_job = job_ko_add($mb_data['mb_job']);
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
      꿈이 필요한 어린이 '<?=$ch_data['ch_nick']?>'<?= has_batchim($ch_data['ch_nick']) > 0 ? "을" : "를" ?> 응원중입니다<br>
      잠시만 기다려 주세요 
      </div>
    </div>
  </div>
</div>
<div id="contents_div">
    <div id="page_div1">
	  <h2>어릴적 내 꿈은 <?=$convert_job?><?= has_batchim($convert_job) > 0 ? "이었어요" : "였어요" ?></h2>
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
    <div id="page_div5" class="wrap_page share_match_child" style="display:none;">
      <div class="inner">
        <div class="block_content">
          <div class="title compassion">
          "<span style="color:#E9DE51"><?=$ch_data['ch_nick']?></span>아<br>
          내꿈꿔!"<br>
          </div>
          <div class="sub_txt">
          가난으로 인해 꿈을 잃어버린 <br>
          '<?=$ch_data['ch_nick']?>'의 후원자가 되어주세요
          </div>
          <div class="img_com">
            <div class="img_child story_result">
              <img src="<?=$ch_data['ch_full_img_url']?>" />
            </div>
            <div class="txt_child story_result">	
              <div class="inner">
                <?=$ch_data['ch_desc']?>
              </div>
            </div>
            <img src="images/bg_story_result.jpg" class="bg" />
          </div>
          <div class="block_btn spon">
            <div class="bt"><a href="http://www.compassion.or.kr/Mobile/cdspDetail3.aspx?ChildMasterID=<?=$ch_data['ch_id']?>&ChildID=<?=$ch_data['ch_key']?>" target="_blank"><img src="images/btn_spon.png" /></a></div>
            <div class="txt">1:1후원으로 <?=$ch_data['ch_nick']?>의 꿈을 현실로 만들어주세요!</div>
          </div>
          <div class="block_btn cheer">
            <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
            <div class="txt">1:1 후원이 어려울 경우<br> SNS에 어릴적 사진을 공유하고 함께 응원해주세요</div>
          </div>
          <div class="friends_pic">
            <div class="inner_friends_pic clearfix">
              <div class="img"><img src="images/ex_friend.png" /></div>
              <div class="txt">어린 시절  꿈과 사진을 등록하고<br> SNS공유하면 응원 완료!</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="page_div6" class="wrap_page share_match_child" style="display:none;">
    <div class="inner">
      <div class="block_content">
        <div class="title compassion">
        "얘들아, 내꿈꿔~!"
        </div>
        <div class="sub_txt">
        컴패션 소개와 함께 어린 시절 사진을 sns에 공유하면<br>
        꿈을 잃어버린 어린이들을 도와줄 수 있습니다
        </div>
        <div class="img_com">
          <div class="img_child">
            <div class="inner_img_child clearfix">
              <div class="one"><img src="images/ex_child.png" /></div>
              <div class="one"><img src="images/ex_child.png" /></div>
              <div class="one"><img src="images/ex_child.png" /></div>
            </div>
          </div>
          <img src="images/bg_share_com.png" class="bg" />
        </div>
        <div class="block_btn spon">
          <div class="bt"><a href="#"><img src="images/btn_spon.png" /></a></div>
          <div class="txt">1:1후원으로 기타의 꿈을 현실로 만들어주세요!</div>
        </div>
        <div class="block_btn cheer">
          <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
          <div class="txt">1:1 후원이 어려울 경우<br> SNS에 어릴적 사진을 공유하고 함께 응원해주세요</div>
        </div>
        <div class="friends_pic">
          <div class="inner_friends_pic clearfix">
            <div class="img"><img src="images/ex_friend.png" /></div>
            <div class="txt">어린 시절  꿈과 사진을 등록하고<br> SNS공유하면 응원 완료!</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="upload_page" class="wrap_page sub upload" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title follower">
        여러분의 어린 시절의 꿈과 사진을 올려주세요<br>
        SNS에 사진과 함께 당신이 응원할<br>
        꿈을 잃은 어린이<br>
        <!-- 이미 결연된 아이의 링크 일 경우엔 텍스트? -->
        <span class="name">‘<?=$ch_data['ch_nick']?>’</span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 소개됩니다 <!-- 이 가 -->
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
              <label for="f_inputImage" title="Upload image file">
                <input type="file" class="sr-only" id="f_inputImage" name="file" accept="image/*">
                <span title="Import image with Blob URLs"><img src="images/btn_select_pic.png" width="80" /></span>
              </label>
              <a href="#" onclick="open_pop('preview_popup')"><img src="images/btn_preview.png" width="80"  /></a>
            </div>
          </div>
          <div id="img_div" class="pic_area">
            <img id="f_ori_image" src="./images/picture.jpg" alt="Picture" />
          </div>
          <div class="btn_closeup">
            <a href="#" onclick="zoom_action('down');return false;"><img src="images/btn_minus.png" width="80" /></a>
            <a href="#" onclick="zoom_action('up');return false;"><img src="images/btn_plus.png" width="80" /></a>
          </div>
        </div>
      </div>
      <div class="block_btn upload">
        <a href="#" onclick="f_dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
      </div>
    </div>
  </div>
</div>

<div id="matching_share_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title">
        아래 SNS에 어린 시절 사진을 공유하여<br>
        <span style="color:#E9DE51"><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 후원자를<br>
        만날 수 있도록 해주세요!
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="<?=$ch_data['ch_full_img_url']?>" id="f_matching_child_pic" /></div>
          <div class="child_text">
            <h2>"저도 <span id="m_rs_job"><?=$convert_job?></span><?= has_batchim($convert_job) > 0 ? "을" : "를" ?> 꿈꿀 수 있을까요?"</h2> <!-- 을 를 -->
            <div class="bg_line">
              <p>
             <?=$ch_data['ch_desc']?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="block_txt">
        SNS에 공유하셔서<br>
        <span id="m_rs_ch_name3"><?=$ch_data['ch_nick']?></span>의 후원자를 찾아주세요
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','fol','matching_share_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','fol','matching_share_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','fol','matching_share_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#"  onclick="open_pop('exam_share_popup');return false;" class="clearfix">
          <span>어린이들을 도울 수 있는 SNS별 친구 태그 방법 보기</span>
          <img src="images/btn_more.png" width="20" />
        </a>
      </div>
      <div class="block_btn ok">
        <a href="#" onclick="go_main('matching_share_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>

<div  id="no_matching_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title compassion">
      컴패션에는 당신의 어린 시절처럼<br>
      꿈 많고 귀여운 어린이들이 있습니다
      </div>
      <div class="sub_txt">
      컴패션 소개와 함께 어린 시절 사진을 sns에 공유하면<br>
      꿈을 잃어버린 어린이들을 도와줄 수 있습니다
      </div>
      <div class="img_com">
        <div class="img_child">
          <div class="inner_img_child clearfix">
            <div class="one"><img src="images/ex_child.png" /></div>
            <div class="one"><img src="images/ex_child.png" /></div>
            <div class="one"><img src="images/ex_child.png" /></div>
          </div>
        </div>
        <img src="images/bg_share_com.png" class="bg" />
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','fol','no_matching_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','fol','no_matching_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','fol','no_matching_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;" class="clearfix">
          <span>어린이들을 도울 수 있는 SNS별 친구 태그 방법 보기</span>
          <img src="images/btn_more.png" width="20" />
        </a>
      </div>
      <div class="block_btn ok">
        <a href="#" onclick="go_main('no_matching_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>

<!-- 공유버튼 클릭시 나오는 예시 페이지 -->
<div id="sns_exam_page" class="wrap_page sns_exam" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="img"> 
        <img src="images/sns_share.jpg" class="bg">
      </div>
      <div class="btn_block">
        <a href="#" id="go_share_func"><img src="images/btn_keepgoing.png"></a>
      </div>
    </div>
  </div>
</div>
<!-- 공유버튼 클릭시 나오는 예시 페이지 -->

<!-- 공유 완료 페이지 -->
<div id="thanks_page" class="wrap_page share_match_child" style="display:none">
  <div class="inner">
    <div class="block_content">
      <div class="title">
        참여해주셔서 감사합니다<br>
        <span id="thx_ch_name">'<?=$ch_data['ch_nick']?>'</span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?><br>
        꿈을 꿀 수 있도록 끝까지 함께 응원해주세요 <!-- 이 가 -->
      </div>
      <div class="block_child re">
        <div class="inner_block_child clearfix">
          <div class="child_pic re"><img src="<?=$ch_data['ch_full_img_url']?>" id="thx_ch_img" /></div>
        </div>
      </div>
      <div class="block_btn ok">
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
var sel_dream       = null;
var runner_serial   = null;
var mb_job          = null;
var mb_image        = null;
var $ori_image = $('#f_ori_image');
var $inputImage = $('#f_inputImage');
var URL = window.URL || window.webkitURL;
var realFath;
var convertPath;
var blobURL;
var file;
var files;
var flag_sel_dream  = 0;
var mb_rs       = null;
var inputImageCheck;
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
	Ins_share_cnt('<?=$rs?>','<?=$ugu?>','<?=$parent_idx?>');
	// 미리보기 제어
	$(".preview").width($(document).width()*0.9);
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

function f_preview_img()
{
	open_pop('f_preview_popup');
}

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
		}
	}else if((navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1)){
		$($ori_image).cropper('destroy');
		$('#f_ie_img_save').ajaxSubmit({
			success: function (data) {
				$($ori_image).attr('src', data);
				image_crop();
			}
		});
	}
}

$($inputImage).change(function(){
	inputImageCheck = "Y";
	files = this.files;
	readURL(this);
});


function f_dream_next()
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
        var croppedImg = $($ori_image).cropper('getCroppedCanvas', {width:1200, height:630});
        var canvasImageURL = croppedImg.toDataURL("image/jpeg");
        $.ajax({
            method: 'POST',
            url: '../main_exec.php',
            data: {
                exec            : "input_follower",
                canvasurl   : canvasImageURL,
                mb_child    : "<?=$mb_data['mb_child']?>",
                rs    : "<?=$rs?>",
<?
    if ($ugu == "act")
    {
?>
                parent_idx  : "<?=$mb_data['idx']?>",
<?
    }else{
?>
                parent_idx  : "<?=$mb_data['parent_idx']?>",
<?
    }
?>
                mb_job      : sel_dream
            },
            beforeSend: function(response){
				$("#upload_page").fadeOut('fast', function(){
					$("body").addClass("bg_sub_page bg_loading");
					$("#loading_div").fadeIn('fast');
				});
            },
            success: function(res){
                // console.log(res);
                //mb_image    = res;

                var rs_ch = res.split("||");
                mb_rs = rs_ch[1];
                //$("#loading_div").hide();
                //$("#contents_div").show();
                if (rs_ch[0] == "Y")
                {
                    $("#matching_child_pic").attr("src","<?=$ch_data['ch_top_img_url']?>");
					setTimeout(function(){
	                $("#loading_div").fadeOut('fast',function(){
<?
	if ($ch_data['ch_choice'] == "Y")
	{
?>
						$("#no_matching_page").fadeIn("fast");
<?
	}else{
?>
						$("body").removeClass("bg_loading");

						$("#matching_share_page").fadeIn("fast");
<?
	}
?>
					});
					},1500);
                }else if (rs_ch[0] == "N"){
					setTimeout(function(){
	                $("#loading_div").fadeOut('fast',function(){
						$("#no_matching_page").fadeIn("fast");
					});
					},1500);
                }else {
                    alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
                    location.reload();
                }
            }
        });
}

    function Ins_share_cnt(serial, ugu,parent_idx)
    {
        $.ajax({
            type:"POST",
            data:{
                "exec"			: "insert_share_cnt",
                "serial"			: serial,
                "parent_idx"	: parent_idx,
                "ugu"				: ugu
            },
            url: "../main_exec.php",
            success: function(res){
                // console.log(res);
            }
        });
    }

</script>
