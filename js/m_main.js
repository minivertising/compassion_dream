function open_pop(param)
{
	// $('.preview > img').css('width', 'max-width');
	$.colorbox({innerWidth:"100%",innerHeight: "95%", initialWidth:"95%", initialHeight: "95%", inline:true, opacity:"0.9", scrolling:true, reposition: false, closeButton:false, overlayClose: false, open:true, speed:20, transition: "fade", fadeOut: 300, href:"#"+param, onComplete: function(){
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
		// if (param == "dream_sel_popup")
		// {
		// 	image_crop();
		// }

	},
	onClosed: function(){
		//del_info();
		$("#cboxContent").css("background","#fff");
		// $(".sec_main_img").show();
		$(".sec_main_img").fadeIn('slow');
		if (param == "gift_popup2" || param == "notice_popup2")
		{
			// $(".sec_top").show();
			$(".sec_top").fadeIn('slow');
		}
	}});
}

// 직업선택 팝업 창 여는 함수
function view_dream_div()
{
	if (flag_sel_dream == 0)
	{
		if (sel_dream != null)
		{
			$("a[name='id_job']").css("font-weight","normal");
			$("#id_"+sel_dream).css("font-weight","bold");
		}
		$("#dream_sel_link").html("꿈 선택 ▲");
		// 준우씨가 animate로 변경
		// $("#choice_dream").show();
		$("#choice_dream").fadeIn('slow');
		flag_sel_dream	= 1;
	}else{
		$("#dream_sel_link").html("꿈 선택 ▼");
		// 준우씨가 animate로 변경
		// $("#choice_dream").hide();
		$("#choice_dream").fadeOut('slow');
		flag_sel_dream	= 0;
	}
}

// 직업선택 시 변수 저장 함수
function checked_dream(param, param2, param3)
{
	sel_dream	= param;
	$.colorbox.close();
	$("#sel_job_btn").attr("src","images/btn_re_sec.png");
	$("#sel_job_txt").html(param3);
	flag_sel_dream	= 0;

}

function next_page(param)
{
	var prev_param	= param - 1;
	// $("#page_div"+prev_param).hide();
	// $("#page_div"+param).show();
	$("#page_div"+prev_param).fadeOut('slow');
	$("#page_div"+param).fadeIn('slow');
}

function only_num(obj)
{
	var inText = obj.value;
	var outText = "";
	var flag = true;
	var ret;
	for(var i = 0; i < inText.length; i++)
	{
		ret = inText.charCodeAt(i);
		if((ret < 48) || (ret > 57))
		{
			flag = false;
		}
		else
		{
			outText += inText.charAt(i);
		}
	}
 
	if(flag == false)
	{
		alert("전화번호는 숫자입력만 가능합니다.");
		obj.value = outText;
		obj.focus();
		return false;
	} 
	return true;
}

function show_dream_sel()
{
	$("#ytplayer").each(function(){
		this.contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*')
	});
	/*
	$(".wrap_sec_top").hide();
	$(".wrap_sec_com").hide();
	$(".wrap_sec_movie").hide();
	$(".wrap_sec_footer").hide();
	*/
	// $("#contents_div").hide();
	$("#contents_div").fadeOut('slow', function(){
		$("body").addClass("bg_sub_page");
		// $("#upload_page").show();
		$("#upload_page").fadeIn('slow', 'swing');
		image_crop();
	});
}

function mb_check()
{
	if (chk_mb_flag == 0)
	{
		$("#mb_agree").attr("src","images/checked.png");
		chk_mb_flag = 1;
	}else{
		$("#mb_agree").attr("src","images/check.png");
		chk_mb_flag = 0;
	}
}


function sns_share(media, flag)
{
	alert(mb_rs);
	if (media == "fb")
	{
		//https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer
		//var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.belif-play.com/PC/index.php'),'sharer','toolbar=0,status=0,width=600,height=325');
		var newWindow = window.open('https://www.facebook.com/dialog/share?app_id=649187078561789&display=popup&href=' + encodeURIComponent('http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu='+flag),'sharer','toolbar=0,status=0,width=600,height=325');
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
				"mb_gubun" : flag,
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
					url: 'http://mydream.compassion.or.kr/follower_index.php?rs='+mb_rs+'&ugu='+flag // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
			url: 'http://mydream.compassion.or.kr/follower_index.php?rs='+mb_rs+'&ugu='+flag,
			text: '#블루바톤챌린지'
		});
		$.ajax({
			type   : "POST",
			async  : false,
			url    : "../main_exec.php",
			data:{
				"exec" : "insert_share_info",
				"sns_media" : media,
				"mb_gubun" : flag,
				"mb_serial"  : mb_rs
			}
		});
	}
}