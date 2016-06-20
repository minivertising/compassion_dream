<?
	include_once "./header.php";

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
<div id="loading_div" style="display:none">
Loading.... 꿈이 필요한 아이와 매칭중
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
<?
	if ($ch_data)
	{
?>
    <a href="#" onclick="next_page('5');return false;">어린이 만나기</a>
<?
	}else{
?>
    <a href="#" onclick="next_page('6');return false;">어린이 만나기</a>
<?
	}
?>
  </div>
  <div id="page_div5" style="display:none">
    <h2>저와 함께 꿈꾸는 행복을 <?=$ch_data['ch_ko_name']?>에게 전해주실래요?</h2>
    <div>
      <img src="<?=$ch_data['ch_top_img_url']?>" style="width:100%">
    </div>
    <a href="#">1:1 결연</a>
    <a href="#" onclick="open_pop('f_dream_sel_popup');return false;">사진 공유</a>
  </div>
  <div id="page_div6" style="display:none">
    <h2>"얘들아 내 꿈꿔~!" 내용</h2>
    <a href="#">1:1 결연</a>
    <a href="#" onclick="open_pop('f_dream_sel_popup');return false;">사진 공유</a>
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

		Ins_share_cnt('<?=$rs?>','<?=$ugu?>','');
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
				}else if(input.value){ // 조건 수정 ?
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
					inputImageCheck = "Y";
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
				exec			: "input_follower",
				canvasurl	: canvasImageURL,
				mb_child	: "<?=$mb_data['mb_child']?>",
<?
	if ($ugu == "act")
	{
?>
				parent_idx	: "<?=$mb_data['idx']?>",
<?
	}else{
?>
				parent_idx	: "<?=$mb_data['parent_idx']?>",
<?
	}
?>
				mb_job		: "<?=$mb_data['mb_job']?>"
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
				mb_rs = rs_ch[1];
				$("#loading_div").hide();
				$("#contents_div").show();
				if (rs_ch[0] == "Y")
				{
					$("#f_matching_child_pic").attr("src","<?=$ch_data['ch_top_img_url']?>");
					open_pop('f_share_popup');
				}else if (rs_ch[0] == "N"){
					open_pop('f_share_no_matching_popup');
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
				"exec"				: "insert_share_cnt",
				"serial"				: serial,
				"ugu"					: ugu
			},
			url: "../main_exec.php",
			success: function(res){
				console.log(res);
			}
		});
	}

</script>
<!-- <script src="../lib/Cropper/js/main.js"></script> -->
