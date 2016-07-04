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
<div id="loading_div" class="wrap_page loading" style="display:none">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content">
      <div class="img_load">
        <img src="images/img_loading.png" />
      </div>
      <div class="txt_load">
      꿈이 필요한 어린이 '<?=$ch_data['ch_nick']?>'를 응원중입니다<br>
      잠시만 기다려 주세요 
      </div>
    </div>
  </div>
</div>
<div id="contents_div">
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
</div>

<div id="upload_page" class="wrap_page sub upload" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title">
        <span><?=$ch_data['ch_nick']?></span>에게 어떤 꿈을<br>
        이어주실건가요?
      </div>
      <div class="sub_title">
      당신의 어린 시절 꿈꾸던 직업과 사진을 올려주세요
      </div>
      <div class="block_input_dream">
        <div class="selec_job clearfix">
          <div class="txt_1" id="sel_job_txt">1. 내 어린시절 꿈 선택 </div>
          <div class="txt_2"><a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_sec.png" width="60" id="sel_job_btn"/></a></div><!--버튼 두개입니다-->
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
        <a href="#" onclick="f_dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
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
		background: true,
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
                $("#upload_page").hide();
                $("#loading_div").show();
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
                    $("#f_matching_child_pic").attr("src","<?=$ch_data['ch_top_img_url']?>");
					setTimeout(function(){
	                $("#loading_div").fadeOut('fast',function(){
<?
	if ($ch_data['ch_choice'] == "Y")
	{
?>
						$("#f_share_no_matching_page").fadeIn("fast");
<?
	}else{
?>
						$("#f_share_page").fadeIn("fast");
<?
	}
?>
					});
					},1500);
                }else if (rs_ch[0] == "N"){
					setTimeout(function(){
	                $("#loading_div").fadeOut('fast',function(){
						$("#f_share_no_matching_page").fadeIn("fast");
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
