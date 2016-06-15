<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link href="../lib/Cropper/css/cropper.css" rel="stylesheet">
  <script src="../js/jquery-1.11.2.min.js"></script>
  <script src="../js/jquery.form.js"></script>
  <script src="../lib/Cropper/js/cropper.js"></script>
  <script type="text/javascript" src="../js/canvas-to-blob.js"></script>
</head>
<body>
    <div id="img_div" style="width:100%; height:100%;">
      <img id="ori_image" src="./images/picture.jpg" alt="Picture">
    </div>
    <div>
        <input type="file" id="inputImage" name="file" accept="image/*">
        <a href="#" onclick="dream_next();return false;">업로드 완료</a>
        <a href="#" onclick="preview_img();return false;">미리보기</a>
    </div>
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
      // if (URL) {
      //   $inputImage.change(function () {
          
      //     if (!$ori_image.data('cropper')) {
      //       return;
      //     }

      //     if (files && files.length) {
      //       file = files[0];

      //       if (/^image\/\w+$/.test(file.type)) {
      //         blobURL = URL.createObjectURL(file);
      //         $ori_image.one('built.cropper', function () {
      //           // Revoke when load complete
      //           URL.revokeObjectURL(blobURL);
      //         }).cropper('reset').cropper('replace', blobURL);
      //         $inputImage.val('');
      //       } else {
      //         window.alert('Please choose an image file.');
      //       }
      //     }
      //   });
      // } else {
      //   $inputImage.prop('disabled', true).parent().addClass('disabled');
      // }


$(function () {
    image_crop();
});

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

// function getImgSize(file) 
// {
//   var size = { 
//     width : file.prop("width"), height : file.prop("height"), 
//     naturalWidth : 0, naturalHeight : 0 
//   };

//   if (file.prop('naturalWidth') == undefined) {
//     var $tmpImg = $('<img/>').attr('src', file.attr('src'));
//     size.naturalWidth = $tmpImg[0].width;
//     size.naturalHeight = $tmpImg[0].height;
//   } else {
//     size.naturalWidth = file.prop('naturalWidth');
//     size.naturalHeight = file.prop('naturalHeight');
//   }
//   return size;
// };


function preview_img()
{
/*
    사진 저장할 내용 추가
*/
    open_pop('preview_popup');

}

function dream_next()
{
    // if (sel_dream == null)
    //     {
    //         alert("당신의 어린시절 꿈을 선택해 주세요.");
    //         return false;
    //     }
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
        alert(res);
      }
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
            "mb_image"      : mb_image,
            "mb_serial"     : mb_rs
        },
        url: "../main_exec.php",
        beforeSend: function(response){
            $("#loading_div").show();
            $("#contents_div").hide();
        },
        success: function(response){
            alert(response);
            $("#loading_div").hide();
            $("#contents_div").show();
            if (response == "Y")
            {
                open_pop('share_popup');
            }else {
                alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
                location.reload();
            }
        }
    });
}



</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->