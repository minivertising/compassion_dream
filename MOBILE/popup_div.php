<div style="display:none;">
  <!--꿈 선택 팝업-->
  <div id="dream_sel_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>DREAM RUNNER되기 1단계</h2>
    <h3>당신의 어린시절 꿈을 선택해주세요</h3>
    <input type="radio" name="dream_chk" value="1">요리사
    <input type="radio" name="dream_chk" value="2">의사
    <input type="radio" name="dream_chk" value="3">선생님<br />
    <a href="#" onclick="dream_next();return false;">꿈 선택 완료</a>
  </div>
  <!--END : 꿈 선택 팝업-->

  <!--사진 업로드 팝업-->
  <div id="upimage_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>DREAM RUNNER되기 2단계</h2>
    <h3>당신의 어린시절, 꿈꾸던 어린이의 사진을 올려주세요</h3>
    <form id="upimage_frm" method="post" enctype="multipart/form-data" action="./upload.php">
      <img id="uploadImg" src="../images/no_detail_img.gif" width="100" height="100">
      <input type="file" name="upload_file" onchange="readURL(this);"> 
      <a href="#" onclick="img_submit();return false;">확인</a>
    </form>
  </div>
  <!--END : 사진 업로드 팝업-->
</div>