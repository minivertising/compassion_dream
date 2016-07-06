function open_pop(param)
{
	if (param == "preview_popup")
	{

	}
	// $('.preview > img').css('width', 'max-width');
	$.colorbox({innerWidth:"100%",innerHeight: "95%", initialWidth:"95%", initialHeight: "70%", inline:true, opacity:"0.9", scrolling:true, reposition: false, closeButton:false, overlayClose: false, open:true, speed:20, transition: "fade", fadeOut: 300, href:"#"+param, onComplete: function(){
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
		$("#cboxContent").css("background","#fff");
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

// 직업 뒤에 조사 붙이기 함수
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
	/*
	$(".wrap_sec_top").hide();
	$(".wrap_sec_com").hide();
	$(".wrap_sec_movie").hide();
	$(".wrap_sec_footer").hide();
	*/
	// $("#contents_div").hide();
	$("#contents_div").fadeOut('fast', function(){
		$("body").addClass("bg_sub_page");
		// $("#upload_page").show();
		$("#upload_page").fadeIn('fast');
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

function tab_click(param)
{
	if (param == "1")
	{
		$("#s_tab1").attr("src","images/navi_fb_on.png");
		$("#s_tab2").attr("src","images/navi_kt_off.png");
		$("#s_tab3").attr("src","images/navi_ks_off.png");
		$("#s_contents").attr("src","images/img_howto_fb.jpg");
		$("#s_sns").html("페이스북");
	}else if (param == "2"){
		$("#s_tab1").attr("src","images/navi_fb_off.png");
		$("#s_tab2").attr("src","images/navi_kt_on.png");
		$("#s_tab3").attr("src","images/navi_ks_off.png");
		$("#s_contents").attr("src","images/img_howto_kt.jpg");
		$("#s_sns").html("카카오톡");
	}else{
		$("#s_tab1").attr("src","images/navi_fb_off.png");
		$("#s_tab2").attr("src","images/navi_kt_off.png");
		$("#s_tab3").attr("src","images/navi_ks_on.png");
		$("#s_contents").attr("src","images/img_howto_ks.jpg");
		$("#s_sns").html("카카오 스토리");
	}
}

function f_show_dream_sel()
{
	$("body").addClass("bg_sub_page");
	$("#contents_div").hide(); // 임시 적용 
	$("#upload_page").fadeIn('slow', 'swing');
	image_crop();
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
	}else if (share_cnt > 0 && share_cnt < 3){
		if (confirm("다른 SNS로도 공유 하시겠어요?\r\n더 많이 공유 해주실 수록 어린이들이 후원자를 찾는데 큰 힘이 됩니다."))
		{
			return false;
		}else{
			$("#"+page).fadeOut('fast', function(){
				$("#thanks_page").fadeIn('fast');
			})
		}
	}else if (share_cnt == 3){
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
		var newWindow = window.open('https://www.facebook.com/dialog/share?app_id=649187078561789&display=popup&hashtag=내꿈꿔&href=' + encodeURIComponent('http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu='+flag),'sharer','toolbar=0,status=0,width=600,height=325');
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
				"mb_serial"		: mb_rs,
				"ugu"			: s_ugu
			},
			url: "../main_exec.php",
			success: function(response){
				alert(response);
				var img_url	= response;

				Kakao.Link.sendTalkLink({
				  //container: '#kakao-link-btn',
				  label: "내꿈꿔 릴레이\n\r내 어린 시절 꿈과 사진으로 꿈이 필요한 어린이에게 후원자를 찾아주는 컴패션의 릴레이 캠페인입니다",
				  image: {
					src: img_url,
					width: '1200',
					height: '630'
				  },
				  webButton: {
					text: '링크 열기',
					url: 'http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu='+flag // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
				"mb_gubun" : flag,
				"mb_serial"  : mb_rs
			}
		});
	}else{
		Kakao.Story.share({
			url: 'http://mydream.compassion.or.kr/MOBILE/follower_index.php?rs='+mb_rs+'&ugu='+flag,
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