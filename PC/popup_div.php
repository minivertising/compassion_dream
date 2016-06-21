<div style="display:none;">

  <!--꿈 선택 팝업-->
  <div id="dream_sel_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>DREAM RUNNER되기 1단계</h2>
    <h3>당신의 어린시절 꿈을 선택해주세요</h3>
    <a href="#" onclick="view_dream_div('');return false;" id="dream_sel_link">꿈 선택 ▼</a>
    <div  id="choice_dream" style="position:absolute;z-index:9;background:skyblue;display:none">
      <a href="#" onclick="checked_dream('cook','');return false;" name="id_job" id="id_cook">요리사</a>
      <a href="#" onclick="checked_dream('doctor','');return false;" name="id_job" id="id_doctor">의사</a>
      <a href="#" onclick="checked_dream('teacher','');return false;" name="id_job" id="id_teacher">선생님</a>
    </div>
    <!-- <select name="mb_job" id="mb_job">
      <option value="">선택하세요</option>
      <option value="cook">요리사</option>
      <option value="doctor">의사</option>
      <option value="teacher">선생님</option>
    </select> --><br />
    <div id="img_div" style="width:80%; ">
      <img id="ori_image" src="./images/picture.jpg" alt="Picture">
    </div>
    <div>
      <label for="inputImage" title="Upload image file">
        <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
        <span title="Import image with Blob URLs">Upload</span>
      </label>

      <a href="#" onclick="dream_next();return false;">업로드 완료
      </a>
      <a href="#" onclick="preview_img();return false;">미리보기</a>
    </div>
    <br/>
    <input type="button" id="zoomUp" value="확대+" onclick="zoom_action('up');return false;">&nbsp;
    <input type="button" id="zoomDown" value="축소-" onclick="zoom_action('down');return false;">
  </div>
  <!-- </div> -->
  <!--END : 꿈 선택 팝업-->

  <!--팔로워용 꿈 선택 팝업-->
  <div id="f_dream_sel_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <h2>DREAM RUNNER되기 1단계</h2>
    <h3>당신의 어린시절 꿈을 선택해주세요</h3>
    <a href="#" onclick="view_dream_div('f_');return false;" id="f_dream_sel_link">꿈 선택 ▼</a>
    <div  id="f_choice_dream" style="position:absolute;z-index:9;background:skyblue;display:none">
      <a href="#" onclick="checked_dream('cook','f_');return false;" name="id_job" id="id_cook">요리사</a>
      <a href="#" onclick="checked_dream('doctor','f_');return false;" name="id_job" id="id_doctor">의사</a>
      <a href="#" onclick="checked_dream('teacher','f_');return false;" name="id_job" id="id_teacher">선생님</a>
    </div>
    <!-- <select name="mb_job" id="mb_job">
      <option value="">선택하세요</option>
      <option value="cook">요리사</option>
      <option value="doctor">의사</option>
      <option value="teacher">선생님</option>
    </select> --><br />
    <div id="f_img_div" style="width:100%; height:100%;">
      <img id="f_ori_image" src="./images/picture.jpg" alt="Picture">
    </div>
    <div>
      <label for="f_inputImage" title="Upload image file">
        <input type="file" class="sr-only" id="f_inputImage" name="file" accept="image/*">
        <span title="Import image with Blob URLs">Upload</span>
      </label>

      <a href="#" onclick="f_dream_next();return false;">업로드 완료
      </a>
      <a href="#" onclick="f_preview_img();return false;">미리보기</a>
      <br/>
      <input type="button" id="zoomUp" value="확대+" onclick="zoom_action('up');return false;">&nbsp;
      <input type="button" id="zoomDown" value="축소-" onclick="zoom_action('down');return false;">
    </div>
  </div>
  <!-- </div> -->
  <!--END : 팔로워용 꿈 선택 팝업-->

  <!--사진 미리보기 팝업-->
  <div id="preview_popup" class="popup_wrap" style="background:white; width:100%; height:100%;">
    <a href="#" onclick="open_pop('dream_sel_popup');return false;">닫기</a>
    <h2>사진 미리보기</h2>
    <div class="preview">
    </div>
    <a href="#" onclick="dream_next();return false;">확인</a>
  </div>
  <!--END : 사진 미리보기 팝업-->

  <!--팔로워용 사진 미리보기 팝업-->
  <div id="f_preview_popup" class="popup_wrap" style="background:white; width:100%; height:100%;">
    <a href="#" onclick="open_pop('f_dream_sel_popup');return false;">닫기</a>
    <h2>사진 미리보기</h2>
    <div class="preview">
    </div>
    <a href="#" onclick="f_dream_next();return false;">확인</a>
  </div>
  <!--END : 팔로워용 사진 미리보기 팝업-->

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
    <div>
      <img src="#" style="width:100%" id="matching_child_pic">
    </div>
    <a href="#" onclick="open_pop('input_popup');return false;">닫기</a>
    <a href="#" onclick="sns_share('fb','act');">페이스북</a>
    <a href="#" onclick="sns_share('kt','act');">카톡</a>
    <a href="#" onclick="sns_share('ks','act');">카스</a>
  </div>
  <!--END : 매칭결과 확인 & 공유 팝업-->

  <!-- 팔로워용 매칭결과 확인 & 공유 팝업-->
  <div id="f_share_popup" class="popup_wrap" style="background:white;">
    <div>
      <img src="#" style="width:100%" id="f_matching_child_pic">
    </div>
    <a href="#" onclick="open_pop('input_popup');return false;">닫기</a>
    <a href="#" onclick="sns_share('fb','fol');">페이스북</a>
    <a href="#" onclick="sns_share('kt','fol');">카톡</a>
    <a href="#" onclick="sns_share('ks','fol');">카스</a>
  </div>
  <!--END : 팔로워용 매칭결과 확인 & 공유 팝업-->

  <!-- 매칭된 아이가 없을때 결과 확인 & 공유 팝업-->
  <div id="no_matching_popup" class="popup_wrap" style="background:white;">
    <h2>컴페션 소개 링크 공유 팝업</h2>
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <a href="#" onclick="sns_share('fb','act');">페이스북</a>
    <a href="#" onclick="sns_share('kt','act');">카톡</a>
    <a href="#" onclick="sns_share('ks','act');">카스</a>
  </div>
  <!--END : 매칭된 아이가 없을때 결과 확인 & 공유 팝업-->

  <!-- 팔로워용 매칭된 아이가 없을때 확인 & 공유 팝업-->
  <div id="f_share_no_matching_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <a href="#" onclick="sns_share('fb','fol');">페이스북</a>
    <a href="#" onclick="sns_share('kt','fol');">카톡</a>
    <a href="#" onclick="sns_share('ks','fol');">카스</a>
  </div>
  <!--END : 팔로워용 매칭된 아이가 없을때 확인 & 공유 팝업-->


  <!-- 약관 팝업-->
  <div id="agree_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="open_pop('input_popup');return false;">닫기</a>
    약관 내용
  </div>
  <!--END : 약관 팝업-->

  <!-- 유의사항 팝업-->
  <div id="notice_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <a href="#" onclick="open_pop('use_popup');return false;">참여방법</a>
    <a href="#" onclick="open_pop('notice_popup');return false;">유의사항</a>
    유의사항 내용
  </div>
  <!--END : 유의사항 팝업-->

  <!-- 참여방법 팝업-->
  <div id="use_popup" class="popup_wrap" style="background:white;">
    <a href="#" onclick="$.colorbox.close();return false;">닫기</a>
    <a href="#" onclick="open_pop('use_popup');return false;">참여방법</a>
    <a href="#" onclick="open_pop('notice_popup');return false;">유의사항</a>
    참여방법 내용
  </div>
  <!--END : 참여방법 팝업-->

</div>