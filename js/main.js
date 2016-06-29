function open_pop(param)
{
	if (param == "job_popup")
	{
		var pop_w	= "792px";
		var pop_h	= "682px";
		var pop_oh	= "640px";
	}
	$.colorbox({width:pop_w, height:pop_h, inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: false, transition: "fade", fadeOut: 300, href:"#"+param, onComplete: function(){
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
	// $("#page_div"+prev_param).hide();
	// $("#page_div"+param).show();
	$("#page_div"+prev_param).fadeOut('fast', function(){
		$("#page_div"+param).fadeIn('fast');
	});
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
		$("#s_tab2").attr("src","images/navi_kt_off.png");
		$("#s_tab3").attr("src","images/navi_ks_off.png");
		$("#s_contents").attr("src","images/img_howto_fb.png");
	}else if (param == "2"){
		$("#s_tab1").attr("src","images/navi_fb_off.png");
		$("#s_tab2").attr("src","images/navi_kt_on.png");
		$("#s_tab3").attr("src","images/navi_ks_off.png");
		$("#s_contents").attr("src","images/img_howto_kt.png");
	}else{
		$("#s_tab1").attr("src","images/navi_fb_off.png");
		$("#s_tab2").attr("src","images/navi_kt_off.png");
		$("#s_tab3").attr("src","images/navi_ks_on.png");
		$("#s_contents").attr("src","images/img_howto_ks.png");
	}
}

// 직업 뒤에 조사 붙이기 함수
function job_ko_add(job)
{
	if (job == "president")
	{
		// 대통령
		var job_add1	= "대통령을";
		var job_add2	= "대통령이";
	}else if (job == "congress"){
		// 국회의원
		var job_add1	= "국회의원을";
		var job_add2	= "국회의원이";
	}else if (job == "businessman"){
		// 기업가
		var job_add1	= "기업가를";
		var job_add2	= "기업가가";
	}else if (job == "teacher"){
		// 교사
		var job_add1	= "교사를";
		var job_add2	= "교사가";
	}else if (job == "singer"){
		// 가수
		var job_add1	= "가수를";
		var job_add2	= "가수가";
	}else if (job == "actor"){
		// 배우
		var job_add1	= "배우를";
		var job_add2	= "배우가";
	}else if (job == "designer"){
		// 디자이너
		var job_add1	= "디자이너를";
		var job_add2	= "디자이너가";
	}else if (job == "model"){
		// 모델
		var job_add1	= "모델을";
		var job_add2	= "모델이";
	}else if (job == "sportsman"){
		// 운동선수
		var job_add1	= "운동선수를";
		var job_add2	= "운동선수가";
	}else if (job == "lawyer"){
		// 변호사
		var job_add1	= "변호사를";
		var job_add2	= "변호사가";
	}else if (job == "doctor"){
		// 의사
		var job_add1	= "의사를";
		var job_add2	= "의사가";
	}else if (job == "scientist"){
		// 과학자
		var job_add1	= "과학자를";
		var job_add2	= "과학자가";
	}else if (job == "minister"){
		// 목사
		var job_add1	= "목사를";
		var job_add2	= "목사가";
	}else if (job == "policeman"){
		// 경찰관
		var job_add1	= "경찰관을";
		var job_add2	= "경찰관이";
	}else if (job == "fireman"){
		// 소방관
		var job_add1	= "소방관을";
		var job_add2	= "소방관이";
	}else if (job == "soldier"){
		// 군인
		var job_add1	= "군인을";
		var job_add2	= "군인이";
	}else if (job == "cook"){
		// 요리사
		var job_add1	= "요리사를";
		var job_add2	= "요리사가";
	}

	return job_add1 + "||" + job_add2;
}

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

function sns_share(media, flag)
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
				"mb_gubun" : flag,
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