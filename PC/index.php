<?
include_once "./header.php";

$total_runner_cnt   = total_runner_info();
$total_pic_cnt      = total_pic_info();
//$total_matching_cnt = total_matching_info();
$total_matching_cnt = 0;
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
      <div class="logo"><a href="#"><img src="images/logo.png" /></a></div>
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
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
    <div class="block_content upload">
      <div class="title">
        <div class="main"><span>'기타'</span>에게 어떤 꿈을 이어 주실 건가요?</div>
      </div>
      <div class="block_input_dream">
        <div class="selec_job">
        1. 꿈꾸던 직업선택<span id="sel_job_txt"></span> <a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_sec.png" id="sel_job_btn" /></a><!--버튼 두개입니다-->
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
                  <span title="Import image with Blob URLs"><img src="images/btn_select_pic.png" /></span>
                  <a href="#" onclick="preview_img();return false;"><img src="images/btn_preview.png" /></a>
                </label>
              </form>
            </div>
          </div>
          <div id="img_div" class="pic_area">
            <img id="ori_image" src="./images/picture.jpg" alt="Picture">
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
<div id="input_page" class="wrap_sec_top_sub input_data">
  <div class="inner">
    <div class="logo"><a href="#"><img src="images/logo_sub.png" /></a></div>
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
          <div class="input"><input type="text" id="mb_phone" placeholder="휴대폰번호 ('-' 없이 입력해주세요)"></div>
        </div>
        <div class="check">
          <a href="#"><img src="images/check.png" /></a><a href="#">개인정보 수집 및 위탁에 관한 동의</a> <a href="#"><img src="images/btn_detail.png" /></a>
        </div>
      </div>
      <div class="block_btn">
        <a href="#" onclick="input_submit();return false;"><img src="images/btn_next.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 개인정보 입력 페이지 -->

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
    var $ori_image = $('#ori_image');
    var $inputImage = $('#inputImage')
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

		// 유튜브 영상 크기 제어
		var yt_width = $(".movie").width();
		var yt_height = (yt_width / 16) * 9;
		$("#ytplayer").width(yt_width);
		$("#ytplayer").height(yt_height);

        Ins_tracking();
    
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

function image_crop(type){
    $($ori_image).cropper({
        viewMode: 0,
        dragMode: 'move',
        autoCropArea: 0.8,
        aspectRatio: 1200/630,
        responsive: false,
        restore: false,
        guides: false,
        highlight: false,
        cropBoxMovable: false,
        cropBoxResizable: false,
        preview: '.preview',
        center:true,
        zoomOnWheel:false,
        zoomOnTouch:false,
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

function preview_img()
{
/*
        사진 저장할 내용 추가
        */
        open_pop('preview_popup');

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
        var croppedImg = $($ori_image).cropper('getCroppedCanvas', {width:1200, height:630});
        var canvasImageURL = croppedImg.toDataURL("image/jpeg");

        $.ajax({
            method: 'POST',
            url: '../main_exec.php',
            data: {
                exec        : "input_image",
                canvasurl   : canvasImageURL,
                mb_job      : sel_dream
            },
            beforeSend: function(response){
                alert(response);
                $("#loading_div").show();
                $("#contents_div").hide();
            },
            success: function(res){
                // console.log(res);
                alert(res);
                //mb_image    = res;

                var rs_ch = res.split("||");
                $("#loading_div").hide();
                $("#contents_div").show();
                if (rs_ch[0] == "Y")
                {
                    // 매칭될 아이가 있을 경우
                    mb_image    = rs_ch[1];
					$("#input_page").show();
                    //open_pop('input_popup');
                }else if (rs_ch[0] == "N"){
                    // 매칭될 아이가 없을 경우
                    mb_image    = rs_ch[1];
                    mb_rs       = rs_ch[2];
                    //$("#no_matching_child_pic").attr("src",mb_image);
                    open_pop('no_matching_popup');
                }else {
                    // 에러
                    alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
                    location.reload();
                }
            }
        });
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
            alert("전화번호를 입력해 주세요.");
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
                alert(response);
                $("#loading_div").show();
                $("#contents_div").hide();
            },
            success: function(response){
                alert(response);
                var rs_ch = response.split("||");
                mb_rs = rs_ch[2];
                $("#loading_div").hide();
                $("#contents_div").show();
                if (rs_ch[0] == "Y")
                {
                    $("#matching_child_pic").attr("src",rs_ch[1]);
                    open_pop('share_popup');
                }else if (rs_ch[0] == "C"){
                    $("#c_matching_child_pic").attr("src",rs_ch[1]);
                    open_pop('no_matching_popup');
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
		$(".wrap_sec_top").hide();
		$(".wrap_sec_com").hide();
		$(".wrap_sec_movie").hide();
		$(".wrap_sec_footer").hide();

		$("body").addClass("bg_sub_page");
		$("#upload_page").show();
	}
</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->
