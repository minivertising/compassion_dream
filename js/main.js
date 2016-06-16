function open_pop(param)
{
	$('.preview').css('overflow', 'hidden');
	$('.preview').css('width', '263');
	$('.preview').css('height', '148');
	$('.preview > img').css('width', 'max-width');
	// alert("op_pp");
	$.colorbox({innerWidth:"100%",innerHeight: "70%", initialWidth:"95%", initialHeight: "70%", inline:true, opacity:"0.9", scrolling:true, reposition: false,closeButton:false, overlayClose: false, open:true, speed:0, fadeOut: 300, href:"#"+param, onComplete: function(){
		$("#cboxContent").css("background","none");
		$("#cboxContent").css("z-index","99999");
		$('#cboxWrapper').css('backgroundColor', "");
		$('#cboxWrapper').css("z-index","99999");
		$('.popup_wrap').css("z-index","99999");
		$("#colorbox").css("z-index","99999");
		$('#cboxLoadedContent').css('backgroundColor', "");
		$('#cboxLoadedContent').css("z-index","99999");
		$("#colorbox").width($("body").width());
		// $("body").height($("#"+param).height());
		$("#cboxWrapper").width($("body").width());
		//$(".sec_main_img").hide();
		if (param == "dream_sel_popup" || param == "f_dream_sel_popup")
		{
			image_crop();
		}

	},
	onClosed: function(){
		//del_info();
		$("#cboxContent").css("background","#fff");
		$(".sec_main_img").show();
		if (param == "gift_popup2" || param == "notice_popup2")
		{
			$(".sec_top").show();
		}
	}});
}

// 직업선택 팝업 창 여는 함수
function view_dream_div(param)
{
	var user_flag	= "";
	if (param == "follower")
		user_flag = "f_";

	if (flag_sel_dream == 0)
	{
		if (sel_dream != null)
		{
			$("a[name='id_job']").css("font-weight","normal");
			$("#id_"+sel_dream).css("font-weight","bold");
		}
		$("#dream_sel_link").html("꿈 선택 ▲");
		// 준우씨가 animate로 변경
		$("#"+ user_flag +"choice_dream").show();
		flag_sel_dream	= 1;
	}else{
		$("#dream_sel_link").html("꿈 선택 ▼");
		// 준우씨가 animate로 변경
		$("#"+ user_flag +"choice_dream").hide();
		flag_sel_dream	= 0;
	}
}

// 직업선택 시 변수 저장 함수
function checked_dream(param)
{
	sel_dream	= param;
	$("#choice_dream").hide();
	$("#dream_sel_link").html("꿈 선택 ▼");
	flag_sel_dream	= 0;

}

function next_page(param)
{
	var prev_param	= param - 1;
	$("#page_div"+prev_param).hide();
	$("#page_div"+param).show();
}
/*
function dream_next()
{
	sel_dream		= $(":input:radio[name=dream_chk]:checked").val();
	runner_serial		= $("#runner_serial").val();

	open_pop("upimage_popup");
}
*/

function sns_share(media)
{
	alert(mb_rs);
	if (media == "fb")
	{
		//https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer
		//var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.belif-play.com/PC/index.php'),'sharer','toolbar=0,status=0,width=600,height=325');
		var newWindow = window.open('https://www.facebook.com/dialog/share?app_id=649187078561789&display=popup&href=' + encodeURIComponent('http://www.mnv.kr/follower_index.php?rs='+mb_rs),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
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
				"mb_serial"		: mb_rs
			},
			url: "../main_exec.php",
			success: function(response){
				alert(response);
				var img_url	= response;

				Kakao.Link.sendTalkLink({
				  //container: '#kakao-link-btn',
				  label: "꿈 많았던 나의 어린시절을 소개합니다.\n\r아래의 링크로 확인해주세요.\n\r#블루바톤챌린지",
				  image: {
					src: img_url,
					width: '1200',
					height: '630'
				  },
				  webButton: {
					text: '링크 열기',
					url: 'http://www.mnv.kr/follower_index.php?rs='+mb_rs // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
				"mb_serial"  : mb_rs
			}
		});
	}else{
		Kakao.Story.share({
			url: 'http://www.mnv.kr/follower_index.php?rs='+mb_rs,
			text: '#블루바톤챌린지'
		});
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
				"mb_serial"  : mb_rs
			}
		});
	}
}