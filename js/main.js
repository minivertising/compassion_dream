function open_pop(param)
{
	if (param == "job_popup")
	{
		var pop_w	= "792px";
		var pop_h	= "682px";
		var pop_oh	= "640px";
	}else if (param == "timeover_popup")
	{
		var pop_w	= "578px";
		var pop_h	= "526px";
		var pop_oh	= "484px";
	}else if (param == "gift_popup")
	{
		var pop_w	= "626px";
		var pop_h	= "880px";
		var pop_oh	= "838px";
	}
	$.colorbox({width:pop_w, height:pop_h, inline:true, opacity:"0.9", scrolling:false, closeButton:false, overlayClose: false, fadeOut: 300, href:"#"+param, onComplete: function(){
		$("#cboxLoadedContent").height(pop_oh);
		$("#cboxContent").css("background","none");
	},
	onClosed: function(){
	}});
}

// 직업선택 팝업 창 여는 함수
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
function checked_dream(param, param2)
{
	sel_dream	= param;
	$.colorbox.close();
	$("#sel_job_btn").attr("src","images/btn_re_sec.png");
	$("#sel_job_txt").html(param);
	//$("#"+param2+"choice_dream").hide();
	//$("#"+param2+"dream_sel_link").html("꿈 선택 ▼");
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

function sns_share(media, flag)
{
	if (media == "fb")
	{
		//https://www.facebook.com/dialog/share?app_id=145634995501895&display=popup&href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https%3A%2F%2Fdevelopers.facebook.com%2Ftools%2Fexplorer
		//var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://www.belif-play.com/PC/index.php'),'sharer','toolbar=0,status=0,width=600,height=325');
		var newWindow = window.open('https://www.facebook.com/dialog/share?app_id=649187078561789&display=popup&href=' + encodeURIComponent('http://www.mnv.kr/follower_index.php?rs='+mb_rs+'&ugu='+flag),'sharer','toolbar=0,status=0,width=600,height=325');
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
					url: 'http://www.mnv.kr/follower_index.php?rs='+mb_rs+'&ugu='+flag // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
			url: 'http://www.mnv.kr/follower_index.php?rs='+mb_rs+'&ugu='+flag,
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