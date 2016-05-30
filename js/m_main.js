function open_pop(param)
{
	// alert("op_pp");
	$.colorbox({innerWidth:"100%",innerHeight: "70%", initialWidth:"95%", initialHeight: "70%", inline:true, opacity:"0.9", scrolling:false, reposition: false,closeButton:false, overlayClose: false, open:true, speed:0, fadeOut: 300, href:"#"+param, onComplete: function(){
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
		if (param == "dream_sel_popup")
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

function dream_next()
{
	sel_dream		= $(":input:radio[name=dream_chk]:checked").val();
	runner_serial		= $("#runner_serial").val();

	open_pop("upimage_popup");
}
