function open_pop(param)
{
	if (param == "job_popup")
	{
		var pop_w	= "805px";
		var pop_h	= "759px";
		var pop_oh	= "717px";
		var transition_pop	= "fade";
	}else if (param == "notice_popup"){
		var pop_w	= "806px";
		var pop_h	= "534px";
		var pop_oh	= "492px";
		var transition_pop	= "elastic";
	}else if (param == "use_popup"){
		var pop_w	= "806px";
		var pop_h	= "792px";
		var pop_oh	= "755px";
		var transition_pop	= "elastic";
	}else{
		var transition_pop	= "fade";
	}
	$.colorbox({width:pop_w, height:pop_h, inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: false, transition: transition_pop, fadeOut: 300, href:"#"+param, onComplete: function(){
		$("#cboxLoadedContent").height(pop_oh);
		$("#cboxContent").css("background","none");
	},
	onClosed: function(){
	}});
}

// 직업선택 팝업 창 여는 함수// 미사용
function view_dream_div(param)
{
	if (flag_sel_dream == 0)
	{
		if (sel_dream != null)
		{
			$("a[name='id_job']").css("font-weight","normal");
			$("#id_"+sel_dream).css("font-weight","bold");
		}
		$("#"+param+"dream_sel_link").html("꿈 선택 ▲");
		// 준우씨가 animate로 변경
		$("#"+ param +"choice_dream").show();
		flag_sel_dream	= 1;
	}else{
		$("#"+param+"dream_sel_link").html("꿈 선택 ▼");
		// 준우씨가 animate로 변경
		$("#"+ param +"choice_dream").hide();
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

	switch(param)
	{
		case '5':
			$(".storytelling").fadeOut('fast', function(){
				$("body").removeClass("story");
				$("#page_div"+param).fadeIn('fast');
			});
		break;

		case '6':
			var fade_page	= prev_param-1;
			$(".storytelling").fadeOut('fast', function(){
				$("body").removeClass("story");
				$("#page_div"+param).fadeIn('fast');
			});
		break;

		case '7':
			var fade_page	= prev_param-2;
			$(".storytelling").fadeOut('fast', function(){
				$("body").removeClass("story");
				$("#page_div"+param).fadeIn('fast');
			});
		break;

		default:
			$(".storytelling").fadeOut('fast', function(){
				$("body").removeClass("story");
				$("#page_div"+param).fadeIn('fast');
			});
		break;
	}
}
/*
function dream_next()
{
	sel_dream		= $(":input:radio[name=dream_chk]:checked").val();
	runner_serial		= $("#runner_serial").val();

	open_pop("upimage_popup");
}
*/

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

function tab_click(param)
{
	if (param == "1")
	{
		$("#s_tab1").attr("src","images/navi_fb_on.png");
		$("#s_tab2").attr("src","images/navi_ks_off.png");
		$("#s_contents").attr("src","images/img_howto_fb.png");
	}else{
		$("#s_tab1").attr("src","images/navi_fb_off.png");
		$("#s_tab2").attr("src","images/navi_ks_on.png");
		$("#s_contents").attr("src","images/img_howto_ks.png");
	}
}

// 직업 한글 변환
function job_ko_add(job)
{
	if (job == "president")
	{
		// 대통령
		var job	= "대통령";
	}else if (job == "congress"){
		// 국회의원
		var job	= "국회의원";
	}else if (job == "businessman"){
		// 기업가
		var job	= "기업가";
	}else if (job == "teacher"){
		// 교사
		var job	= "교사";
	}else if (job == "singer"){
		// 가수
		var job	= "가수";
	}else if (job == "actor"){
		// 배우
		var job	= "배우";
	}else if (job == "designer"){
		// 디자이너
		var job	= "디자이너";
	}else if (job == "model"){
		// 모델
		var job	= "모델";
	}else if (job == "sportsman"){
		// 운동선수
		var job	= "운동선수";
	}else if (job == "lawyer"){
		// 변호사
		var job	= "변호사";
	}else if (job == "doctor"){
		// 의사
		var job	= "의사";
	}else if (job == "scientist"){
		// 과학자
		var job	= "과학자";
	}else if (job == "minister"){
		// 목사
		var job	= "목사";
	}else if (job == "policeman"){
		// 경찰관
		var job	= "경찰관";
	}else if (job == "fireman"){
		// 소방관
		var job	= "소방관";
	}else if (job == "soldier"){
		// 군인
		var job	= "군인";
	}else if (job == "cook"){
		// 요리사
		var job	= "요리사";
	}

	return job;
}
// function job_ko_add(job)
// {
// 	if (job == "president")
// 	{
// 		// 대통령
// 		var job_add1	= "대통령을";
// 		var job_add2	= "대통령이";
// 	}else if (job == "congress"){
// 		// 국회의원
// 		var job_add1	= "국회의원을";
// 		var job_add2	= "국회의원이";
// 	}else if (job == "businessman"){
// 		// 기업가
// 		var job_add1	= "기업가를";
// 		var job_add2	= "기업가가";
// 	}else if (job == "teacher"){
// 		// 교사
// 		var job_add1	= "교사를";
// 		var job_add2	= "교사가";
// 	}else if (job == "singer"){
// 		// 가수
// 		var job_add1	= "가수를";
// 		var job_add2	= "가수가";
// 	}else if (job == "actor"){
// 		// 배우
// 		var job_add1	= "배우를";
// 		var job_add2	= "배우가";
// 	}else if (job == "designer"){
// 		// 디자이너
// 		var job_add1	= "디자이너를";
// 		var job_add2	= "디자이너가";
// 	}else if (job == "model"){
// 		// 모델
// 		var job_add1	= "모델을";
// 		var job_add2	= "모델이";
// 	}else if (job == "sportsman"){
// 		// 운동선수
// 		var job_add1	= "운동선수를";
// 		var job_add2	= "운동선수가";
// 	}else if (job == "lawyer"){
// 		// 변호사
// 		var job_add1	= "변호사를";
// 		var job_add2	= "변호사가";
// 	}else if (job == "doctor"){
// 		// 의사
// 		var job_add1	= "의사를";
// 		var job_add2	= "의사가";
// 	}else if (job == "scientist"){
// 		// 과학자
// 		var job_add1	= "과학자를";
// 		var job_add2	= "과학자가";
// 	}else if (job == "minister"){
// 		// 목사
// 		var job_add1	= "목사를";
// 		var job_add2	= "목사가";
// 	}else if (job == "policeman"){
// 		// 경찰관
// 		var job_add1	= "경찰관을";
// 		var job_add2	= "경찰관이";
// 	}else if (job == "fireman"){
// 		// 소방관
// 		var job_add1	= "소방관을";
// 		var job_add2	= "소방관이";
// 	}else if (job == "soldier"){
// 		// 군인
// 		var job_add1	= "군인을";
// 		var job_add2	= "군인이";
// 	}else if (job == "cook"){
// 		// 요리사
// 		var job_add1	= "요리사를";
// 		var job_add2	= "요리사가";
// 	}

// 	return job_add1 + "||" + job_add2;
// }

function show_dream_sel()
{
	$("#ytplayer").each(function(){
		this.contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*')
	});
	$(".wrap_sec_top").hide();
	$(".wrap_sec_com").hide();
	$(".wrap_sec_movie").hide();
	$(".wrap_sec_footer").hide();
	// $(".wrap_sec_top").fadeOut('slow');
	// $(".wrap_sec_com").fadeOut('slow');
	// $(".wrap_sec_movie").fadeOut('slow');
	// $(".wrap_sec_footer").fadeOut('slow');

	$("body").addClass("bg_sub_page");
	// $("#upload_page").show();
	$("#upload_page").fadeIn('slow', 'swing');
	image_crop();
}

function f_show_dream_sel()
{
	// $(".wrap_sec_top").hide();
	// $(".wrap_sec_com").hide();
	// $(".wrap_sec_movie").hide();
	// $(".wrap_sec_footer").hide();
/*
	$(".wrap_sec_top").fadeOut('slow');
	$(".wrap_sec_com").fadeOut('slow');
	$(".wrap_sec_movie").fadeOut('slow');
	$(".wrap_sec_footer").fadeOut('slow');
*/


	$("body").addClass("bg_sub_page");
	$("#contents_div").hide(); // 임시 적용 
	$("#upload_page").fadeIn('slow', 'swing');
	image_crop();
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

var obj = new Audio('sample.wav');
function playNow()
{
	obj.play();
	if(obj.currentTime > 0) // INVALID_STATE_ERR를 피하기 위한 꼼수
		obj.currentTime = 0; 
}

// 스토리텔링 모션
function talk_start()
{
	/*
	$("#talk_alarm1").delay(500).fadeIn("fast", function(){
		playNow();
		talk_scroll	= $("#talk_alarm1").height();
	});

	$("#talk_message1").delay(2500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_message2").delay(3500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_message3").delay(5500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_message4").delay(7000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_message5").delay(9000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_message6").delay(10000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_message7").delay(12000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_message8").delay(15000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_alarm2").delay(16000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_message9").delay(18000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message10").delay(21000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message11").delay(24000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message12").delay(25000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_alarm3").delay(26000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message13").delay(28000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message14").delay(29000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message15").delay(31000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_alarm4").delay(32000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message16").delay(34000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message17").delay(36000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message18").delay(38000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message19").delay(39500).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message20").delay(41000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_message21").delay(43000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500,function(){
			$("#talk_final").show();
			$("#talk_final_mask").show();
		});
	});
	*/
			$("#talk_final").show();
			$("#talk_final_mask").show();
}

function close_mask()
{
	$("#talk_final").hide();
	$("#talk_final_mask").hide();

}

function close_c_mask()
{
	$("#talk_c_final").hide();
	$("#talk_c_final_mask").hide();

}


// 스토리텔링 모션 ( 매칭된 아이가 없을 경우) 
function talk_c_start()
{
	$("#talk_c_alarm1").delay(500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_c_message1").delay(2500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_c_message2").delay(3500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_c_message3").delay(5500).fadeIn("fast", function(){
		playNow();
	});

	$("#talk_c_message4").delay(7000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_c_message5").delay(9000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_c_message6").delay(10000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_c_message7").delay(12000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_c_message8").delay(15000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_c_alarm2").delay(16000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:$('.inner_story').height()}, 500);
	});

	$("#talk_c_message9").delay(18000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message10").delay(21000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message11").delay(24000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message12").delay(25000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_alarm3").delay(26000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message13").delay(28000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message14").delay(29000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message15").delay(31000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_alarm4").delay(32000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message16").delay(34000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message17").delay(36000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message18").delay(38000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message19").delay(39500).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message20").delay(41000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500);
	});

	$("#talk_c_message21").delay(43000).fadeIn("fast", function(){
		playNow();
		$('.inner_story').animate({scrollTop:2000}, 500,function(){
			$("#talk_c_final").show();
			$("#talk_c_final_mask").show();
		});
	});


}

function go_share(media, flag, page)
{
	$("#"+page).fadeOut('fast', function(){
		$("#sns_exam_page").fadeIn('fast',function(){
			$("#go_share_func").attr("onclick","sns_share('"+media+"','"+flag+"','"+page+"');return false;");
			share_cnt = share_cnt + 1;
		});
	})
}

function go_main(page)
{
	if (share_cnt == 0)
	{
		alert("공유를 완료해 주세요.\r\nSNS에 공유 해주셔야만 어린이들의 꿈을 도울 수 있습니다");
	}else if (share_cnt == 1){
		if (confirm("다른 SNS로도 공유 하시겠어요?\r\n더 많이 공유 해주실 수록 어린이들이 후원자를 찾는데 큰 힘이 됩니다."))
		{
			return false;
		}else{
			$("#"+page).fadeOut('fast', function(){
				$("#thanks_page").fadeIn('fast');
			})
		}
	}else if (share_cnt == 2){
		$("#"+page).fadeOut('fast', function(){
			$("#thanks_page").fadeIn('fast');
		});
	}
}

function sns_share(media, flag, page)
{
	if (media == "fb")
	{
		
		//https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer
		//var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.belif-play.com/PC/index.php'),'sharer','toolbar=0,status=0,width=600,height=325');
		var newWindow = window.open('https://www.facebook.com/dialog/share?app_id=649187078561789&display=popup&href=' + encodeURIComponent('http://mydream.compassion.or.kr/PC/follower_index.php?rs='+mb_rs+'&ugu='+flag),'sharer','toolbar=0,status=0,width=600,height=325');
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
	}else{
		Kakao.Story.share({
			url: 'http://mydream.compassion.or.kr/PC/follower_index.php?rs='+mb_rs+'&ugu='+flag,
			text: '#내꿈꿔'
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

	$("#sns_exam_page").fadeOut('fast', function(){
		$("#"+page).fadeIn('fast');
	})

}