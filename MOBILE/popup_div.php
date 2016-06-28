<div style="display:none;">
  <!--직업선택팝업--> 
  <div id="job_popup" class="wrap_pop p_select_job">
    <div class="btn_close"><a href="#"><img src="images/popup/btn_close.png" /></a></div>
    <div class="inner_p_select_job clearfix">
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','국회의원');return false;"><img src="images/popup/job_1.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','국회의원');return false;">국회의원</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','기업가');return false;"><img src="images/popup/job_2.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','기업가');return false;">기업가</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','교사');return false;"><img src="images/popup/job_3.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','교사');return false;">교사</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','가수');return false;"><img src="images/popup/job_4.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','가수');return false;">가수</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','과학자');return false;"><img src="images/popup/job_5.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','과학자');return false;">과학자</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','경찰관');return false;"><img src="images/popup/job_6.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','경찰관');return false;">경찰관</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','군인');return false;"><img src="images/popup/job_7.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','군인');return false;">군인</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','디자이너');return false;"><img src="images/popup/job_8.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','디자이너');return false;">디자이너</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','대통령');return false;"><img src="images/popup/job_9.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','대통령');return false;">대통령</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','목사');return false;"><img src="images/popup/job_10.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','목사');return false;">목사</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','모델');return false;"><img src="images/popup/job_11.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','모델');return false;">모델</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','변호사');return false;"><img src="images/popup/job_12.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','변호사');return false;">변호사</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','배우');return false;"><img src="images/popup/job_13.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','배우');return false;">배우</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','소방관');return false;"><img src="images/popup/job_14.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','소방관');return false;">소방관</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','의사');return false;"><img src="images/popup/job_15.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','의사');return false;">의사</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','요리사');return false;"><img src="images/popup/job_16.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','요리사');return false;">요리사</a></div>
      </div>
      <div class="one_job">
        <div class="img"><a href="#" onclick="checked_dream('congress','','운동선수');return false;"><img src="images/popup/job_17.png" /></a></div>
        <div class="text"><a href="#" onclick="checked_dream('congress','','운동선수');return false;">운동선수</a></div>
      </div>
  </div> 
  <!--직업선택팝업--> 



  <!--사진 미리보기 팝업-->
  <div id="preview_popup" class="popup_wrap" style="background:white; width:100%; height:100%;">
    <a href="#" onclick="open_pop('dream_sel_popup');return false;">닫기</a>
    <h2>사진 미리보기</h2>
    <div class="preview">
    </div>
    <a href="#" onclick="dream_next();return false;">확인</a>
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
    <div>
	  <img src="#" style="width:100%" id="matching_child_pic">
	</div>
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