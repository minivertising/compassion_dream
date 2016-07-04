<?
	include_once "./header.php";
?>
<body>
<div id="talk_area" style="position:absolute;width:400px;height:600px;background:skyblue;overflow-y:auto;">
  <div id="talk_1" style="position:relative;width:150px;height:100px;background:orange;left:250px;display:none;">첫번째 DIV</div>
  <div id="talk_2" style="position:relative;width:150px;height:100px;background:orange;left:250px;display:none;">두번째 DIV</div>
  <div id="talk_3" style="position:relative;width:150px;height:100px;background:orange;left:0px;display:none;">세번째 DIV</div>
  <div id="talk_4" style="position:relative;width:150px;height:100px;background:orange;left:250px;display:none;">네번째 DIV</div>
  <div id="talk_5" style="position:relative;width:150px;height:100px;background:orange;left:0px;display:none;">다섯번째 DIV</div>
  <div id="talk_6" style="position:relative;width:150px;height:100px;background:orange;left:250px;display:none;">여섯번째 DIV</div>
  <div id="talk_7" style="position:relative;width:150px;height:100px;background:orange;left:0px;display:none;">일곱번째 DIV</div>
  <div id="talk_8" style="position:relative;width:150px;height:100px;background:orange;left:250px;display:none;">여덟번째 DIV</div>
  <div id="talk_9" style="position:relative;width:150px;height:100px;background:orange;left:0px;display:none;">아홉번째 DIV</div>
  <div id="talk_10" style="position:relative;width:150px;height:100px;background:orange;left:250px;display:none;">열번째 DIV</div>
</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#talk_area").niceScroll({cursorcolor:"gray",cursorborder:"gray"});

	talk_start();

});

var obj = new Audio('sample.wav');
function playNow()
{
	obj.play();
	if(obj.currentTime > 0) // INVALID_STATE_ERR를 피하기 위한 꼼수
		obj.currentTime = 0; 
}

function talk_start()
{
	setTimeout(function(){
		$("#talk_1").fadeIn("fast", function(){
			playNow();
		});
	},500);
	setTimeout(function(){
		$("#talk_2").fadeIn("fast", function(){
			playNow();
		});
	},1000);
	setTimeout(function(){
		$("#talk_3").fadeIn("fast");
		playNow();
	},2000);
	setTimeout(function(){
		$("#talk_4").fadeIn("fast");
			playNow();
	},2500);
	setTimeout(function(){
		$("#talk_5").fadeIn("fast",function(){
			$('#talk_area').animate({scrollTop:$("#talk_5").offset().top}, 500);
			playNow();
		});
	},3500);
	setTimeout(function(){
		$("#talk_6").fadeIn("fast",function(){
			$('#talk_area').animate({scrollTop:$("#talk_6").offset().top}, 500);
			playNow();
		});
	},4500);
	setTimeout(function(){
		$("#talk_7").fadeIn("fast",function(){
			$('#talk_area').animate({scrollTop:$("#talk_7").offset().top}, 500);
			playNow();
		});
	},6000);
	setTimeout(function(){
		$("#talk_8").fadeIn("fast",function(){
			$('#talk_area').animate({scrollTop:$("#talk_8").offset().top}, 500);
			playNow();
		});
	},7500);
	setTimeout(function(){
		$("#talk_9").fadeIn("fast",function(){
			$('#talk_area').animate({scrollTop:$("#talk_9").offset().top}, 500);
			playNow();
		});
	},9000);
	setTimeout(function(){
		$("#talk_10").fadeIn("fast",function(){
			$('#talk_area').animate({scrollTop:$("#talk_10").offset().top}, 500);
			playNow();
		});
	},11000);
}
</script>