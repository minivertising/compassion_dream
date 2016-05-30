<div style="display:none;">

  <!--꿈 선택 팝업-->
  <div id="dream_sel_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>DREAM RUNNER되기 1단계</h2>
    <h3>당신의 어린시절 꿈을 선택해주세요</h3>
    <select name="mb_job" id="mb_job">
      <option value="">선택하세요</option>
      <option value="cook">요리사</option>
      <option value="doctor">의사</option>
      <option value="teacher">선생님</option>
    </select><br />
    <div id="img_div" style="width:100%; height:100%">
      <img id="ori_image" src="./images/img_home_01.jpg" alt="Picture">
    </div>
    <!-- <div class="btn-group btn-group-crop docs-buttons">
      <a class="btn btn-primary" id="download" href="javascript:void(0);" data-method="getCroppedCanvas" download="cropped.jpg">Download</a>
      <div class="btn-group"> 
        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
          <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
          <span title="Import image with Blob URLs">Upload</span>
        </label>
      </div> -->
    <!-- <div class="docs-buttons"> -->
    <div>
      <label for="inputImage" title="Upload image file">
        <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
        <span title="Import image with Blob URLs">Upload</span>
      </label>

      <a href="#" onclick="dream_next();return false;">업로드 완료
      </a>
      <a href="#" onclick="preview_img();return false;">미리보기</a>
      </div>
  </div>
  <!-- </div> -->
  <!--END : 꿈 선택 팝업-->

  <!--사진 미리보기 팝업-->
  <div id="preview_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>사진 미리보기</h2>
    <div class="preview">
    </div>
    <a href="#" onclick="img_submit();return false;">확인</a>
  </div>
  <!--END : 사진 미리보기 팝업-->

  <!--개인정보 입력(이름, 전화번호) 팝업-->
  <div id="input_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>정보를 입력해주세요.</h2>
    이름 : <input type="text" id="mb_name"><br />
    전화번호 : <input type="text" id="mb_phone" placeholder="'-' 없이 숫자만 입력해 주세요."><br />
	<input type="checkbox" name="mb_check" id="mb_check">개인정보 수집 및 위탁에 관한 동의 <a href="#" onclick="open_pop('agree_popup');return false;">자세히 보기</a><br />
	<a href="#" onclick="input_submit();return false;">확인</a>
  </div>
  <!--END : 개인정보 입력(이름, 전화번호) 팝업-->

  <!-- 매칭결과 확인 & 공유 팝업-->
  <div id="share_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="open_pop('input_popup');return false;">닫기</a>
    <a href="#" onclick="sns_share('fb');">페이스북</a>
    <a href="#" onclick="sns_share('kt');">카톡</a>
    <a href="#" onclick="sns_share('ks');">카스</a>
  </div>
  <!--END : 매칭결과 확인 & 공유 팝업-->


  <!-- 약관 팝업-->
  <div id="agree_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="open_pop('input_popup');return false;">닫기</a>
    약관 내용
  </div>
  <!--END : 약관 팝업-->

</div>