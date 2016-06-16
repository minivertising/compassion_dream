<?
	include_once "./header.php";

	$total_runner_cnt		= total_runner_info();
	$total_pic_cnt			= total_pic_info();
	//$total_matching_cnt	= total_matching_info();
?>
<body>
    <div id="loading_div" style="display:none">
        Loading.... 꿈이 필요한 아이와 매칭중
    </div>
    <div id="contents_div">
	  <h1>블루 바톤 챌린지</h1>
	  <h2>어린이의 꿈을 위해 달리고 있는 블루 러너 : <?=number_format($total_runner_cnt)?>명</h2>
	  <h2>현재 공유되고 있는 어릴적 사진 수 : <?=number_format($total_pic_cnt)?>Km(1공유 1Km)</h2>
	  <h2>123명의 어린이들이 드림러너를 통해 결연이 되었습니다.</h2>
        <a href="#" onclick="open_pop('use_popup');">참여방법</a><br />
        <a href="#" onclick="open_pop('dream_sel_popup');">참여하기</a>
        <?
        include_once "./popup_div.php";
        ?>
    </div>
</body>
</html>
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
    var agent = navigator.userAgent.toLowerCase();
    var sel_dream       = null;
    var runner_serial   = null;
    var mb_job          = null;
    var mb_image        = null;
    var $ori_image = $('#ori_image');
    var $inputImage = $('#inputImage')
    var $previews = $('.preview');
    var imageData;
    var afterCropBoxData;
    var ratioWidth;
    var ratioHeight;
    var destCropWidth;
    var destCropHeight;
    var centerCropBoxWidth;
    var centerCropBoxHeight;
    var URL = window.URL || window.webkitURL;
    var realFath;
    var convertPath;
    var blobURL;
    var file;
    var files;
    var flag_sel_dream  = 0;
    var mb_rs       = null;
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
/*
$(function () {
    image_crop();
});
*/
function image_crop(){
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
// });

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
        }else if(input.value){ // 조건 수정
            //이미지 저장후에 불러와서 $ori_image src 변경
            console.log(realFath);
            $.ajax({
              method: 'POST',
              url: 'ie_photo_upload.php',
              data: {ieImageSrc: realFath},
              success: function(res){
                convertPath = res;
                // alert(res);
               console.log("저장 후:"+convertPath);
               // alert(convertPath);
               $($ori_image).attr('src', convertPath);
               image_crop();
              }
            });
			/*
            alert("1111");
            alert("1111");
            alert("1111");
            console.log("저장 후:"+convertPath);
            // alert(convertPath);
            $($ori_image).attr('src', convertPath);
            image_crop();
			*/
        }
    }
    
    $($inputImage).change(function(){
        files = this.files;
        // console.dir(this);
        if ( (navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1) || (agent.indexOf("msie") != -1) ) {
            $($ori_image).cropper('destroy');
            this.select();
            realFath = document.selection.createRangeCollection()[0].text.toString();
            this.blur();
            // var size = getImgSize(this);
            // console.log(size.naturalWidth);
        }
        readURL(this);
    });


function dream_next()
{
    if (sel_dream == null)
        {
            alert("당신의 어린시절 꿈을 선택해 주세요.");
            return false;
        }
    //mb_job    = $("#mb_job").val();

    // 사진 저장할 내용 추가
    var croppedImg = $($ori_image).cropper('getCroppedCanvas', {width:1200, height:630});
    var canvasImageURL = croppedImg.toDataURL("image/jpeg");
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
            console.log(response);
            var rs_ch	= response.split("||");
			mb_rs	= rs_ch[2];
            $("#loading_div").hide();
            $("#contents_div").show();
            if (rs_ch[0] == "Y")
            {
				$("#matching_child_pic").attr("src",rs_ch[1]);
                open_pop('share_popup');
            }else {
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
