<?
include_once "./header.php";
$rs	= $_REQUEST['rs'];
print_r($rs);
?>
<body>
	<div id="loading_div" style="display:none">
		Loading.... 꿈이 필요한 아이와 매칭중
	</div>
	<div id="contents_div">
		<a href="#" onclick="open_pop('dream_sel_popup');">지금 참여하기</a>
		<?
		include_once "./popup_div.php";
		?>
	</div>
</body>
</html>
<script type="text/javascript">
	var sel_dream		= null;
	var runner_serial	= null;
	var mb_job			= null;
	var mb_image		= null;
	var $ori_image = $('#ori_image');
	var $previews = $('.preview');
	var imageData;
	var afterCropBoxData;
	var ratioWidth;
	var ratioHeight;
	var destCropWidth;
	var destCropHeight;
	var centerCropBoxWidth;
	var centerCropBoxHeight;
	$(document).ready(function() {
		$("#cboxTopLeft").hide();
		$("#cboxTopRight").hide();
		$("#cboxBottomLeft").hide();
		$("#cboxBottomRight").hide();
		$("#cboxMiddleLeft").hide();
		$("#cboxMiddleRight").hide();
		$("#cboxTopCenter").hide();
		$("#cboxBottomCenter").hide();
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


// $(function () {
	

// });

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
			// minCropBoxWidth:1200,
			// minCropBoxHeight:630,
			// built: function(){
				// alert("built");
				// $($ori_image).cropper('setCanvasData', {
				// 	left:0,
				// 	top:0,
				// 	width: 300,
				// 	height: 200
				// });
				// $($ori_image).cropper('setCropBoxData', {
				// 	left:0,
				// 	top:0,
				// 	width: 200,
				// 	height: 100
				// });
			// 	imageData = $($ori_image).cropper('getImageData');
			// 	afterCropBoxData = $($ori_image).cropper('getCropBoxData');
			// 	// console.log("naturalWidth: "+imageData.naturalWidth+",  naturalHeight: "+imageData.naturalHeight); // 오리지널 사이즈
			// 	// console.log("afterImageWidth: "+imageData.width+",  afterImageHeight: "+imageData.height);
			// 	// console.log("afterCropBoxWidth: "+afterCropBoxData.width+",  afterCropBoxHeight: "+afterCropBoxData.height);
			// 	ratioWidth = imageData.width/imageData.naturalWidth;
			// 	if(imageData.naturalHeight < 630) {
			// 		ratioHeight = 1;
			// 	}else{
			// 		ratioHeight = imageData.height/imageData.naturalHeight;
			// 	}
			// 	destCropWidth = (1200*ratioWidth); 
			// 	destCropHeight = (630*ratioHeight);
			// 	centerCropBoxWidth = (imageData.width-destCropWidth)/2;
			// 	centerCropBoxHeight = (imageData.height-destCropHeight)/2;
			// 	$($ori_image).cropper("setCropBoxData", {left: centerCropBoxWidth, top: centerCropBoxHeight, width: destCropWidth, height: destCropHeight});
		// },
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

function dream_next()
{
	mb_job	= $("#mb_job").val();

	// 사진 저장할 내용 추가
	//$($ori_image).cropper("setAspectRatio", 1200/630).cropper('getCroppedCanvas', {width:1200, height:630}).toBlob(function (blob) {
	$($ori_image).cropper('getCroppedCanvas', {width:1200, height:630}).toBlob(function (blob) {
		var formData = new FormData();
	  // formData.append('croppedImage', blob);
	  formData.append('croppedImage', blob, "test.jpg");
	  $.ajax('./upload.php', {
	  	method: "POST",
	  	data: formData,
	  	processData: false,
	  	contentType: false,
	  	success: function (data) {
			mb_image	= data;
			open_pop('input_popup');
	  	}
	  });
	});
	//    
	if (mb_job == "")
	{
		alert("당신의 어린시절 꿈을 선택해 주세요.");
		return false;
	}
	

}

function input_submit()
{
	var mb_name	= $("#mb_name").val();
	var mb_phone	= $("#mb_phone").val();
	//mb_image		= "임시 이미지 URL"; // 이미지 경로 작업 완료되면 여기에 값 추가

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
			"exec"			: "insert_info",
			"mb_name"		: mb_name,
			"mb_phone"		: mb_phone,
			"mb_job"			: mb_job,
			"mb_image"		: mb_image,
			"mb_serial"		: <?=$rs?>
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
/*
function readURL(input) {
	console.log(input);
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#uploadImg').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

function img_submit()
{
	$("#upimage_frm").submit();
}
*/


</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->