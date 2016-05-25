<?
	include_once "./header.php";
?>
<body>
  <input type="hidden" id="runner_serial" value="<?=$_REQUEST['rs'];?>">
  <a href="#" onclick="open_pop('dream_sel_popup');">지금 참여하기</a>
<?
	include_once   "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
var sel_dream		= null;
var runner_serial	= null;
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

</script>