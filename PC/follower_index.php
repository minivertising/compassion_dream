<?
    include_once "./header.php";

	// MOBILE에서 유입시 MOBILE로 이동
	if ($gubun == "MOBILE")
		echo "<script>location.href='../MOBILE/follower_index.php?rs=".$rs."&ugu=".$ugu."';</script>";

	$ch_data    = sel_child_info($mb_data['mb_child']);
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
<div id="contents_div">
  <div id="page_div1">
    <!-- 직업 한글 변환 필요 -->
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
                	<div class="main"><span><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "아" : "야" ?> 내꿈꿔~!</div>
					<div class="sub">
                    가난으로 인해 꿈을 잃어버린 <?=$ch_data['ch_nick']?>의 후원자가 되어주세요
                    </div>
                </div>
                <div class="block_child">
                	<div class="inner_block_child clearfix">
                        <div class="child_pic"><img src="<?=$ch_data['ch_full_img_url']?>" /></div>
                        <div class="child_text">
                            <p>
                            <!-- 설명으로 변경 -->
                            <?=$ch_data['ch_desc']?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="block_btn apply">
                	<div class="inner_apply clearfix">
                		<div class="left">
                        	<div class="bt"><a href="http://www.compassion.or.kr/Sponsor/cdspDetail.aspx?ChildDetailID=<?=$ch_data['ch_detail_id']?>&ChildMasterID=<?=$ch_data['ch_id']?>&ChildID=<?=$ch_data['ch_key']?>"><img src="images/btn_sponsor.png" /></a></div>
                         	<div class="txt">1:1후원으로<br><?=$ch_data['ch_nick']?>의 꿈을<br>현실로 만들어주세요!
						</div>
                        </div>
                        <div class="right">
                            <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
                         	<div class="txt">1:1 후원이 어려울 경우<br>SNS에 어릴적 사진을 공유하고<br>함께 응원해주세요
						</div>
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
              <div class="txt">1:1후원으로 '<?=$ch_data['ch_nick']?>'의 꿈을<br> 현실로 만들어주세요!</div> <!-- 변경 필요 -->
            </div>
            <div class="right">
              <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
              <div class="txt">1:1 후원이 어려울 경우<br>SNS에 어릴적 사진을 공유하고<br>함께 응원해주세요</div>
            </div>
          </div>
        </div>
        <div class="example02">
          <img src="images/story_1.png" width="100" />
        </div>
      </div>
    </div>
  </div>

</div>

<!-- 사진 업로드 페이지 -->
    <div id="upload_page" class="wrap_sec_top_sub" style="display:none;">
    	<div class="inner">
        	<div class="logo"><a href="index.php"><img src="images/logo_sub.png" /></a></div>
            <div class="block_content upload_02">
            	<div class="title">
                	<div class="main">
                    여러분의 어린 시절의 꿈과 사진을 올려주세요<br> 
                    SNS에 사진과 함께 당신이 응원할<br>
                    ‘꿈을 잃은 어린이 <span><?=$ch_data['ch_nick']?></span>’<?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 소개됩니다 <!-- ~이 ~가 -->
                    </div>
                </div>
                <div class="block_input_dream">
                	<div class="selec_job">
                    	<span id="sel_job_txt">1. 꿈꾸던 직업 </span><a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_re_sec.png" id="sel_job_btn" /></a><!--버튼 두개입니다-->
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
                <label for="f_inputImage" title="Upload image file">
                  <span title="Import image" style="position: relative; overflow: hidden;">
                    <input type="file" id="f_inputImage" class="fileUp" name="file">
                    <img src="images/btn_select_pic.png" style="cursor:pointer;"/>
                  </span>
                </label>
                  <a href="#" onclick="open_pop('preview_popup');return false;"><img src="images/btn_preview.png" /></a>
              </form>
                            </div>
                        </div>
                        <div id="img_div" class="pic_area">
                        	<img id="f_ori_image" src="./images/picture.jpg" alt="Picture" />
                        </div>
                        <div class="btn_closeup">
                        	<a href="#" onclick="zoom_action('down');return false;"><img src="images/btn_minus.png" /></a>
                            <a href="#" onclick="zoom_action('up');return false;"><img src="images/btn_plus.png" /></a>
                        </div>
                    </div>
                </div>
                <div class="block_btn">
                	<a href="#" onclick="f_dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
                </div>
            </div>
            
        </div>
    </div>
<!-- 사진 업로드 페이지 -->

<!-- 팔로워 사진업로드 완료 공유 페이지 -->
    <div id="f_share_page" class="wrap_sec_top_sub match_child" style="display:none;">
    	<div class="inner">
        	<div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
            <div class="block_content follower">
            	<div class="title">
                <!-- 팔로워명 변경 -->
                	미니버님!<br> 
					<span><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "을" : "를" ?> 위해<br> <!-- ~을 ~를 -->
					다시 한번 참여해주셔서 감사합니다 
                </div>
                <div class="block_child">
                	<div class="inner_block_child clearfix">
                        <div class="child_pic"><img src="<?=$ch_data['ch_full_img_url']?>" /></div>
                    </div>
                </div>
                <div class="block_txt">
                	<p>아래 SNS에 당신의 어린 시절 사진과 꿈을 공유하셔서</p>
					<p><?=$ch_data['ch_nick']?><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 후원자를 만날 수 있도록 해주세요!</p> <!-- ~이 ~가 -->
                </div>
                <div class="block_btn sns">
                	<a href="#" onclick="go_share('fb','fol','f_share_page');return false;"><img src="images/sns_f.png" /></a>
                	<a href="#" onclick="go_share('ks','fol','f_share_page');return false;"><img src="images/sns_ks.png" /></a>
                </div>
                <div class="block_btn howtotag">
                	<a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
                </div>
            </div>
            
        </div>
    </div>
<!-- 팔로워 사진업로드 완료 공유 페이지 ( 결연X) -->

<!-- 팔로워 사진업로드 완료 공유 페이지 ( 결연O) -->
    <div id="f_share_no_matching_page" class="wrap_sec_top_sub match_child" style="display:none;">
    	<div class="inner">
        	<div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
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
                	<a href="#" onclick="go_share('fb','fol','f_share_no_matching_page');return false;"><img src="images/sns_f.png" /></a>
                	<a href="#" onclick="go_share('ks','fol','f_share_no_matching_page');return false;"><img src="images/sns_ks.png" /></a>
                </div>
                <div class="block_btn howtotag">
                	<a href="#" onclick="open_pop('exam_share_popup');return false;"><img src="images/btn_howto_tag.png" /></a>
                </div>
            </div>
            
        </div>
    </div>

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
      <!-- 아이 id 속성 삭제 -->
      <span id="thx_ch_name"><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 꿈을 꿀 수 있도록<br> <!-- ~이 ~가 -->
      끝까지 함께 응원해주세요
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="<?=$ch_data['ch_full_img_url']?>" id="thx_ch_img" /></div>
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

// $(function () {
//     image_crop();
// });

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

function f_preview_img()
{
/*
        사진 저장할 내용 추가
        */
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
        $('#f_ie_img_save').ajaxSubmit({
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
                //  $($ori_image).cropper('destroy');
                //  this.select();
                //  realFath = document.selection.createRangeCollection()[0].text.toString();
                //  this.blur();
                //      // var size = getImgSize(this);
                //      // console.log(size.naturalWidth);
                //  }
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

    if((agent.indexOf("msie") != -1) && (trident == null || trident[1] == "4.0")){
        cropboxDataIE = $(ori_image).cropper('getData');
        crop_image_url = $(ori_image).attr('src');
           $.ajax({
            method: 'POST',
            url: '../main_exec.php',
            data: {
                exec            : "input_follower_IE",
                crop_image_url  : crop_image_url,
                cropboxData     : cropboxDataIE,
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
                //$("#contents_div").show();
                if (rs_ch[0] == "Y")
                {
                    $("#f_matching_child_pic").attr("src","<?=$ch_data['ch_top_img_url']?>");
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
                }else if (rs_ch[0] == "N"){
	                $("#loading_div").fadeOut('fast',function(){
						$("#f_share_no_matching_page").fadeIn("fast");
					});
                }else {
                    alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
                    location.reload();
                }
            }
        });

    }else{
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
<!-- <script src="../lib/Cropper/js/main.js"></script> -->
