<!-- 사진 업로드 페이지 -->
<div id="upload_page" class="wrap_page sub upload" style="display:none;">
  <div class="inner">
    <div class="block_content">

      <div class="title">
        <span class="small">여러분의 어린 시절 꿈과 사진을 올려주세요<br>
        SNS에 사진과 함께 당신이 응원할<br>
        <span class="small" style="color:#E9DE51">'꿈을 잃은 어린이'</span>가 소개됩니다</span>
      </div>
      <div class="block_input_dream">
        <div class="selec_job clearfix">
          <div class="txt_1" id="sel_job_txt">1. 내 어린시절 꿈 선택 </div>
          <div class="txt_2"><a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_sec.png" width="60" id="sel_job_btn" /></a></div><!--버튼 두개입니다-->
        </div>
        <div class="upload_pic">
          <div class="title_pic">
          2. 사진업로드
          </div>
          <div class="desc">
            <div class="txt_pic">
            * 1개의 이미지 파일을 등록할 수 있습니다
            </div>
            <div class="btns">
              <label for="inputImage" title="Upload image file">
                <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                <span title="Import image with Blob URLs"><img src="images/btn_select_pic.png" width="80" /></span>
              </label>
              <a href="#" onclick="open_pop('preview_popup')"><img src="images/btn_preview.png" width="80"  /></a>
            </div>
          </div>
          <div id="img_div" class="pic_area">
            <img id="ori_image" src="./images/picture.jpg" alt="Picture" />
          </div>
          <div class="btn_closeup">
            <a href="#" onclick="zoom_action('down');return false;"><img src="images/btn_minus.png" width="80" /></a>
            <a href="#" onclick="zoom_action('up');return false;"><img src="images/btn_plus.png" width="80" /></a>
            <a href="#" onclick="rotate_action('+');return false;">90</a>
            <a href="#" onclick="rotate_action('-');return false;">-90</a>
          </div>
        </div>
      </div>
      <div class="block_btn upload">
        <a href="#" onclick="dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 사진 업로드 페이지 -->

<!-- 개인정보 입력 페이지 -->
<div id="input_page" class="wrap_page sub input_data" style="display:none">
  <div class="inner">
    <div class="block_content">
      <div class="title">
      참여하신 분 중 추첨을 통해<br>
      컴패션 현지 어린이센터를<br>
      방문할 수 있는기회를 드립니다
      </div>
      <div class="block_input">
        <div class="sub_title">
        참여자 정보
        </div>
        <div class="input_one clearfix">
          <div class="label">이름</div>
          <div class="input"><input type="text" id="mb_name"></div>
        </div>
        <div class="input_one clearfix">
          <div class="label">휴대폰번호</div>
          <div class="input"><input type="tel" id="mb_phone" placeholder="휴대폰번호 ('-' 없이 입력해주세요)" onkeyup="only_num(this);return false;"></div>
        </div>
        <div class="check clearfix">
          <a href="#" class="box" onclick="mb_check();return false;"><img src="images/check.png" width="20" name="mb_agree" id="mb_agree" /></a>
          <a href="#" class="txt">개인정보 수집 및 위탁에 관한 동의</a>
          <a href="#" class="bt" onclick="open_pop('agree_popup');return false;"><img src="images/btn_detail.png" width="60" /></a>
        </div>
      </div>
      <div class="sub_title add">
      추첨에 선정 되신 분께는 개별 연락 드립니다
      </div>
      <div class="block_btn">
        <a href="#" onclick="input_submit();return false;"><img src="images/btn_next.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 개인정보 입력 페이지 -->

<!-- ACTIVATOR 매칭 결과 페이지 -->
<div id="matching_share_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title">
        당신의 도움이 필요한 어린이는<br>
        '<span id="m_rs_ch_name">아비가일 마아 야아 암퐁</span>'입니다
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="images/ex_child_01.png" id="matching_child_pic" /></div>
          <div class="child_text">
            <h2>"저도 <span id="m_rs_job">선생님</span><span id="jobPP" style="color:#fff">를</span> 꿈꿀 수 있을까요?"</h2> <!-- 조사부분 컬러 검정으로 수정 -->
            <div class="bg_line">
              <p id="m_rs_desc">
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="block_txt">
        SNS에 공유하셔서<br>
        <span id="m_rs_ch_name3">기타</span>의 후원자를 찾아주세요
      </div>
      <div class="block_btn sns">
        <!-- <a href="#" onclick="sns_share('fb','act');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="sns_share('kt','act');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="sns_share('ks','act');return false;"><img src="images/sns_ks.png" /></a> -->
        <a href="#" onclick="go_share('fb','act','matching_share_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','act','matching_share_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','act','matching_share_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#"  onclick="open_pop('exam_share_popup');return false;" class="clearfix">
          <span>어린이들을 도울 수 있는 SNS별 친구 태그 방법 보기</span>
          <img src="images/btn_more.png" width="20" />
        </a>
      </div>
      <div class="block_btn ok">
        <a href="#" onclick="go_main('matching_share_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭 결과 페이지 -->

<!-- ACTIVATOR 매칭 결과 페이지 (이미참여 결연X)-->
<div id="re_matching_share_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title">
        <span id="act_name">000</span>님!<br>
        <span id="re_ch_name">'아비가일 마아 야아 암퐁'</span><span id="namePP" style="color:#fff">를</span> 위해<br> <!-- ~을 ~를 -->
        다시 한번 참여해주셔서 감사합니다 
      </div>
      <div class="block_child re">
        <div class="inner_block_child clearfix">
          <div class="child_pic re"><img src="images/ex_child.png" id="re_matching_child_pic" /></div>
        </div>
      </div>
      <div class="block_txt">
        아래 SNS에 당신의 어린 시절 사진과 꿈을 공유하셔서<br>
        <span id="re_ch_name2">'아비가일 마아 야아 암퐁'</span><span id="name2PP" style="color:#000000">가</span><br> <!-- ~이 ~가 -->
        후원자를 만날 수 있도록 해주세요!
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','act','re_matching_share_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','act','re_matching_share_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','act','re_matching_share_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;" class="clearfix">
          <span>어린이들을 도울 수 있는 SNS별 친구 태그 방법 보기</span>
          <img src="images/btn_more.png" width="20" />
        </a>
      </div>
      <div class="block_btn ok">
        <a href="#" onclick="go_main('re_matching_share_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭 결과 페이지 (이미참여 결연X)-->

<!-- ACTIVATOR 매칭 결과 페이지 (컴페션 소개 링크)-->
<div  id="no_matching_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title compassion">
      컴패션에서는<br>
      당신의 어린 시절처럼<br>
      꿈 많고 귀여운 어린이들이 있습니다
      </div>
      <div class="sub_txt">
      컴패션 소개와 함께 어린 시절 사진을 sns에 공유하면<br>
      꿈을 잃어버린 어린이들을 도와줄 수 있습니다
      </div>
      <div class="img_com">
        <div class="img_child">
          <div class="inner_img_child clearfix">
            <div class="one"><img src="images/ex_child_01.png" /></div>
            <div class="one"><img src="images/ex_child_02.png" /></div>
            <div class="one"><img src="images/ex_child_03.png" /></div>
          </div>
        </div>
        <img src="images/bg_share_com.png" class="bg" />
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','act','no_matching_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','act','no_matching_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','act','no_matching_page');return false;"><img src="images/sns_ks.png" /></a>
      </div>
      <div class="block_btn howtotag">
        <a href="#" onclick="open_pop('exam_share_popup');return false;" class="clearfix">
          <span>어린이들을 도울 수 있는 SNS별 친구 태그 방법 보기</span>
          <img src="images/btn_more.png" width="20" />
        </a>
      </div>
      <div class="block_btn ok">
        <a href="#" onclick="go_main('no_matching_page');return false;"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- ACTIVATOR 매칭 결과 페이지 (컴페션 소개 링크)-->

<!-- 공유버튼 클릭시 나오는 예시 페이지 -->
<div id="sns_exam_page" class="wrap_page sns_exam" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="img"> 
        <img src="images/sns_share.jpg" class="bg">
      </div>
      <div class="btn_block">
        <a href="#" id="go_share_func"><img src="images/btn_keepgoing.png"></a>
      </div>
    </div>
  </div>
</div>
<!-- 공유버튼 클릭시 나오는 예시 페이지 -->

<!-- 공유 완료 페이지 -->
<div id="thanks_page" class="wrap_page share_match_child" style="display:none">
  <div class="inner">
    <div class="block_content">
      <div class="title">
        참여해주셔서 감사합니다<br>
        <span id="thx_ch_name">'아비가일 마아 야아 암퐁'</span><span id="thxNamePP" style="color:#fff">가</span><br> <!-- 이 가 -->
        꿈을 꿀 수 있도록 끝까지 함께 응원해주세요
      </div>
      <div class="block_child re">
        <div class="inner_block_child clearfix">
          <div class="child_pic re"><img src="images/ex_child.png" id="thx_ch_img" /></div>
        </div>
      </div>
      <div class="block_btn ok">
        <a href="#" onclick="location.reload();"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 공유 완료 페이지 -->
