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
	include_once   "./popup_div.php";
?>
  </div>
</body>
</html>
<script type="text/javascript">
var sel_dream		= null;
var runner_serial	= null;
var mb_job			= null;
var mb_image		= null;
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

$(function () {
	$('#ori_image').cropper({
		viewMode: 0,
		dragMode: 'move',
		autoCropArea: 0.65,
		restore: false,
		guides: false,
		highlight: false,
		cropBoxMovable: false,
		cropBoxResizable: false,
		built: function(){
			var imageData;
			var afterCropBoxData;
			var $ori_image = $('#ori_image');
			var imageData = $($ori_image).cropper('getImageData');
			var afterCropBoxData = $($ori_image).cropper('getCropBoxData');
			console.log("naturalWidth: "+imageData.naturalWidth+",  naturalHeight: "+imageData.naturalHeight); // 오리지널 사이즈
			console.log("afterImageWidth: "+imageData.width+",  afterImageHeight: "+imageData.height);
			console.log("afterCropBoxWidth: "+afterCropBoxData.width+",  afterCropBoxHeight: "+afterCropBoxData.height);
			// $($ori_image).cropper("setCropBoxData", {left: (imageData.width/2)/2, top: (imageData.height/2)/2, width: imageData.width/2, height: imageData.height/2});
			var ratioWidth = imageData.width/imageData.naturalWidth;
			if(imageData.naturalHeight < 630) {
				var ratioHeight = 1;
			}else{
				var ratioHeight = imageData.height/imageData.naturalHeight;
			}
			//
			var destCropWidth = (1200*ratioWidth); 
			var destCropHeight = (630*ratioHeight);
			//
			var centerCropBoxWidth = (imageData.width-destCropWidth)/2;
			var centerCropBoxHeight = (imageData.height-destCropHeight)/2;
			$($ori_image).cropper("setCropBoxData", {left: centerCropBoxWidth, top: centerCropBoxHeight, width: destCropWidth, height: destCropHeight});
		}
	});
});

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
/*
	사진 저장할 내용 추가
*/

	if (mb_job == "")
	{
		alert("당신의 어린시절 꿈을 선택해 주세요.");
		return false;
	}

	open_pop('input_popup');
}

function input_submit()
{
	var mb_name	= $("#mb_name").val();
	var mb_phone	= $("#mb_phone").val();
	mb_image		= "임시 이미지 URL"; // 이미지 경로 작업 완료되면 여기에 값 추가

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
<script src="../lib/Cropper/js/main.js"></script>