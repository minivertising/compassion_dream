<?
  include_once "./header.php";
  // ins_share_cnt($rs);
  // PC에서 유입시 PC로 이동
  if ($gubun == "PC")
    echo "<script>location.href='../PC/follower_index.php?rs=".$rs."&ugu=".$ugu."';</script>";
  $ch_data  = sel_child_info($mb_data['mb_child']);
  $convert_job = job_ko_add($mb_data['mb_job']);
  if ($mb_data['mb_name'] == "")
	$mb_data['mb_name'] = "컴패션의 친구";

?>
<body class="bg_sub_page storytelling">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '649187078561789',
      xfbml      : true,
      version    : 'v2.6'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs); 
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="loading_div" class="wrap_page loading" style="display:none">
  <div class="inner">
    <div class="block_content">
      <div class="img_load">
        <img src="images/img_loading.png" />
      </div>
      <div class="txt_load">
      꿈이 필요한 어린이 '<?=$ch_data['ch_nick']?>'<?= has_batchim($ch_data['ch_nick']) > 0 ? "을" : "를" ?> 응원중입니다<br>
      잠시만 기다려 주세요 
      </div>
    </div>
  </div>
</div>
<div id="contents_div">
<?
  if ($mb_data['mb_child'] == "")
  {
?>
  <div class="wrap_page storytelling storytelling_m">
    <div class="inner">
      <div class="frame_top clearfix">
        <div class="left"><img src="images/frame_top_left.png" width="35" /></div>
        <div class="right"><img src="images/frame_top_right.png" width="48" /></div>
      </div>
      <div class="block_content inner_story">

        <div id="talk_c_alarm1" class="chat_title" style="display:none;">
        [<?=$mb_data['mb_name']?>]님이 당신과 컴패션 어린이들을 초대했습니다.
        </div>

        <!--왼쪽대화 아이콘+이미지-->
        <div id="talk_c_message1" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_children.png" width="" />
            </div>
            <div class="content">
              <div class="name"><?=$ch_data['ch_nick']?></div>
              <div class="img">
                <img src="images/img_children.jpg" width="120" />
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화 only chat-->
        <div id="talk_c_message2" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon no_icon">
              <img src="images/ex_child.png" width="" />
            </div>
            <div class="content">
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">저희에요</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--오른쪽 대화 이름+이미지-->
        <div id="talk_c_message3" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="name"><?=$mb_data['mb_name']?>님</div>
            <div class="img">
              <img src="<?=$mb_data['mb_image']?>" width="180" />
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--오른쪽 대화 only chat-->
        <div id="talk_c_message4" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              내 어린 시절이야<br>
              우린 참 많이 닮은 것 같아
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--왼쪽대화 아이콘+chat-->
        <div id="talk_c_message5" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_children.png" width="" />
            </div>
            <div class="content">
              <div class="name">어린이들</div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">네?</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--오른쪽 대화-->
        <div id="talk_c_message6" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="name"><?=$mb_data['mb_name']?>님</div>
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              ^^
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--오른쪽 대화 only chat-->
        <div id="talk_c_message7" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              우리는 꿈 많은 어린 시절이 닮았어<br>
              나는 <?=$convert_job?><?= has_batchim($convert_job) > 0 ? "이" : "가" ?> 꿈이었는데 넌? <!-- 공유한 사람의 직업 출력 -->
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--왼쪽대화 아이콘_chat-->
        <div id="talk_c_message8" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_children.png" width="" />
            </div>
            <div class="content">
              <div class="name">어린이들</div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">...</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <div id="talk_c_alarm2" class="chat_title" style="display:none;">
        가난이 채팅에 참여했습니다.
        </div>

        <!--왼쪽대화(가난)-->
        <div id="talk_c_message9" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_ganan.jpg" width="" />
            </div>
            <div class="content">
              <div class="name">가난</div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">아니 둘은 달라</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화(가난)-->
        <div id="talk_c_message10" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon no_icon">
              <img src="images/icon_ganan.jpg" width="" />
            </div>
            <div class="content">
              <div class="img">
                <img src="images/ex_ganan.jpg" width="120" />
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화(가난)-->
        <div id="talk_c_message11" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon no_icon">
              <img src="images/icon_ganan.jpg" width="" />
            </div>
            <div class="content">
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">
                <?=$mb_data['mb_name']?>는 자유롭게 <br>
                꿈꾸는 행복을 누렸지만,<br>
                너희들은<br>
                나로 인해 계속<br>
                꿈을 꿀 수 없을테니까
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화 어린이 아이콘+chat-->
        <div id="talk_c_message12" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_children.png" width="" />
            </div>
            <div class="content">
              <div class="name">어린이들</div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">ㅠㅠ</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <div id="talk_c_alarm3" class="chat_title" style="display:none;">
        <?=$mb_data['mb_name']?>님이 가난을 강퇴시켰습니다.
        </div> 

        <!--오른쪽 대화-->
        <div id="talk_c_message13" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="name"><?=$mb_data['mb_name']?>님</div>
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              가난이 오늘도 너에게 거짓말을 하는구나!<br>
              가난해도 꿈꿀 수 있어
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--오른쪽 대화-->
        <div id="talk_c_message14" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt center">
                <img src="images/angry.png" width="40" />
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--왼쪽대화-->
        <div id="talk_c_message15" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_children.png" width="" />
            </div>
            <div class="content">
              <div class="name">어린이들</div>
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                  <div class="txt">
                  정말 그럴까요? ㅠㅠ... <br>
                  전 일하러 갈게요...
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end 왼쪽대화-->

          <div id="talk_c_alarm4" class="chat_title" style="display:none;">
          어린이들이 퇴장하였습니다.
          </div>

          <!--오른쪽 대화 마지막 대화1-->
          <div id="talk_c_message16" class="one_chat right" style="display:none;">
            <div class="content">
              <div class="name"><?=$mb_data['mb_name']?>님</div>
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  우리 둘만 남았네요…
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화2-->
            <div id="talk_c_message17" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  당신도 어린 시절 꾸었던 꿈이 있나요?
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화3-->
            <div id="talk_c_message18" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  그렇다면 저와 함께 <br>
                  어린이의<br>
                  손을 잡아주세요 <br>
                  그리고 희망을 말해주세요.
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화4-->
            <div id="talk_c_message19" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  “얘들아 너는 꿈을 꿀 자격이 있어.” 
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화5-->
            <div id="talk_c_message20" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  “자, 여기 내꿈꿔.”
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막대화-->
            <div id="talk_c_message21" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix ending">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="here"><img src="images/icon_here.png" width="100" /></div>
                  <div class="txt end">
                    어린이들을 다시 초대하기<br>
                    <a href="#" onclick="next_page('7');return false;">mydream.compassion.or.kr</a>
                    <a href="#" onclick="next_page('7');return false;"><img src="images/img_link.png" width="130" /></a>
                  </div>
                  <div class="cnt v6"><img src="images/icon_out.png" width="25" /></div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->
          </div>
          <div id="talk_c_final_send" class="frame_bottom" style="display:none;">
            <img src="images/img_send.png" width="35" />
          </div>

          <!--오른쪽 대화 마지막대화-->
          <div id="talk_c_final" class="one_chat right ending_chat" style="display:none;">
            <div class="content">
              <div class="talk clearfix ending">
                <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                <div class="here"><img src="images/icon_here.png" width="100" /></div>
                <div class="txt end">
                  어린이들을 다시 초대하기<br>
                  <a href="#" onclick="next_page('7');return false;">mydream.compassion.or.kr</a>
                  <a href="#" onclick="next_page('7');return false;"><img src="images/img_link.png" width="130" /></a>
                </div>
                <div class="cnt v6"><img src="images/icon_out.png" width="25" /></div>
              </div>
            </div>
          </div>
          <!--end 오른쪽 대화-->
        </div>
      </div>
      <div id="talk_c_final_mask" class="mask_ending" onclick="close_c_mask();return false;" style="display:none;"></div>
<?
  }else{
?>
  <div class="wrap_page storytelling storytelling_m">
    <div class="inner">
      <div class="frame_top clearfix">
        <div class="left"><img src="images/frame_top_left.png" width="35" /></div>
        <div class="right"><img src="images/frame_top_right.png" width="48" /></div>
      </div>
      <div class="block_content inner_story">

        <div id="talk_alarm1" class="chat_title" style="display:none;">
        [<?=$mb_data['mb_name']?>]님이 당신과 [<?=$ch_data['ch_nick']?>]를 초대했습니다.
        </div>

        <!--왼쪽대화 아이콘+이미지-->
        <div id="talk_message1" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="<?=$ch_data['ch_full_img_url']?>" width="" />
            </div>
            <div class="content">
              <div class="name"><?=$ch_data['ch_nick']?></div>
              <div class="img">
                <img src="<?=$ch_data['ch_full_img_url']?>" width="120" />
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화 only chat-->
        <div id="talk_message2" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon no_icon">
              <img src="<?=$ch_data['ch_full_img_url']?>" width="" />
            </div>
            <div class="content">
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">저에요</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--오른쪽 대화 이름+이미지-->
        <div id="talk_message3" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="name"><?=$mb_data['mb_name']?>님</div>
            <div class="img">
              <img src="<?=$mb_data['mb_image']?>" width="180" />
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--오른쪽 대화 only chat-->
        <div id="talk_message4" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              내 어린 시절이야<br>
              우린 참 많이 닮은 것 같아
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--왼쪽대화 아이콘+chat-->
        <div id="talk_message5" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="<?=$ch_data['ch_full_img_url']?>" width="" />
            </div>
            <div class="content">
              <div class="name"><?=$ch_data['ch_nick']?></div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">네?</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--오른쪽 대화-->
        <div id="talk_message6" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="name"><?=$mb_data['mb_name']?>님</div>
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              ^^
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--오른쪽 대화 only chat-->
        <div id="talk_message7" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              우리는 꿈 많은 어린 시절이 닮았어<br>
              나는 <?=$convert_job?><?= has_batchim($convert_job) > 0 ? "이" : "가" ?> 꿈이었는데 넌?
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--왼쪽대화 아이콘_chat-->
        <div id="talk_message8" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="<?=$ch_data['ch_full_img_url']?>" width="" />
            </div>
            <div class="content">
              <div class="name"><?=$ch_data['ch_nick']?></div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">...</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <div id="talk_alarm2" class="chat_title" style="display:none;">
        가난이 채팅에 참여했습니다.
        </div>

        <!--왼쪽대화(가난)-->
        <div id="talk_message9" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="images/icon_ganan.jpg" width="" />
            </div>
            <div class="content">
              <div class="name">가난</div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">아니 둘은 달라</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화(가난)-->
        <div id="talk_message10" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon no_icon">
              <img src="images/icon_ganan.jpg" width="" />
            </div>
            <div class="content">
              <div class="img">
                <img src="images/ex_ganan.jpg" width="120" />
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화(가난)-->
        <div id="talk_message11" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon no_icon">
              <img src="images/icon_ganan.jpg" width="" />
            </div>
            <div class="content">
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">
                <?=$mb_data['mb_name']?><?= has_batchim($mb_data['mb_name']) > 0 ? "은" : "는" ?> 자유롭게 <br>
                꿈꾸는 행복을 누렸지만,<br>
                <?=$ch_data['ch_nick']?><?= has_batchim($ch_data['ch_nick']) > 0 ? "은" : "는" ?><br>
                나로 인해 계속<br>
                꿈을 꿀 수 없을테니까
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <!--왼쪽대화 어린이 아이콘+chat-->
        <div id="talk_message12" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="<?=$ch_data['ch_full_img_url']?>" width="" />
            </div>
            <div class="content">
              <div class="name"><?=$ch_data['ch_nick']?></div>
              <div class="talk clearfix">
                <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                <div class="txt">ㅠㅠ</div>
              </div>
            </div>
          </div>
        </div>
        <!--end 왼쪽대화-->

        <div id="talk_alarm3" class="chat_title" style="display:none;">
        <?=$mb_data['mb_name']?>님이 가난을 강퇴시켰습니다.
        </div> 

        <!--오른쪽 대화-->
        <div id="talk_message13" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="name"><?=$mb_data['mb_name']?>님</div>
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt">
              가난이 오늘도 너에게 거짓말을 하는구나!<br>
              가난해도 꿈꿀 수 있어
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--오른쪽 대화-->
        <div id="talk_message14" class="one_chat right" style="display:none;">
          <div class="content">
            <div class="talk clearfix">
              <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
              <div class="txt center">
                <img src="images/angry.png" width="40" />
              </div>
            </div>
          </div>
        </div>
        <!--end 오른쪽 대화-->

        <!--왼쪽대화-->
        <div id="talk_message15" class="one_chat left" style="display:none;">
          <div class="inner_one_chat clearfix">
            <div class="icon">
              <img src="<?=$ch_data['ch_full_img_url']?>" width="" />
            </div>
            <div class="content">
              <div class="name"><?=$ch_data['ch_nick']?></div>
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_white.png" width="15" /></div>
                  <div class="txt">
                  정말 그럴까요? ㅠㅠ... <br>
                  전 일하러 갈게요...
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end 왼쪽대화-->

          <div id="talk_alarm4" class="chat_title" style="display:none;">
          [<?=$ch_data['ch_nick']?>]<?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 퇴장하였습니다.
          </div>

          <!--오른쪽 대화 마지막 대화1-->
          <div id="talk_message16" class="one_chat right" style="display:none;">
            <div class="content">
              <div class="name"><?=$mb_data['mb_name']?>님</div>
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  우리 둘만 남았네요…
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화2-->
            <div id="talk_message17" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  당신도 어린 시절 꾸었던 꿈이 있나요?
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화3-->
            <div id="talk_message18" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  그렇다면 저와 함께 <br>
                  [<?=$ch_data['ch_nick']?>]의<br>
                  손을 잡아주세요 <br>
                  그리고 희망을 말해주세요.
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화4-->
            <div id="talk_message19" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  “[<?=$ch_data['ch_nick']?>]<br>
                  너는 꿈을 꿀 자격이 있어.” 
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막 대화5-->
            <div id="talk_message20" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="txt">
                  “자, 여기 내꿈꿔.”
                  </div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->

            <!--오른쪽 대화 마지막대화-->
            <div id="talk_message21" class="one_chat right" style="display:none;">
              <div class="content">
                <div class="talk clearfix ending">
                  <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                  <div class="here"><img src="images/icon_here.png" width="100" /></div>
                  <div class="txt end">
                    <?=$ch_data['ch_nick']?><?= has_batchim($ch_data['ch_nick']) > 0 ? "을" : "를" ?> 다시 초대하기<br>
<?
  if ($ch_data['ch_choice'] == "Y")
  {
?>
                    <a href="#" onclick="next_page('6');return false;">mydream.compassion.or.kr</a>
                    <a href="#" onclick="next_page('6');return false;"><img src="images/img_link.png" width="130" /></a>
<?
  }else{
?>
                    <a href="#" onclick="next_page('5');return false;">mydream.compassion.or.kr</a>
                    <a href="#" onclick="next_page('5');return false;"><img src="images/img_link.png" width="130" /></a>
<?
  }
?>
                  </div>
                  <div class="cnt v6"><img src="images/icon_out.png" width="25" /></div>
                </div>
              </div>
            </div>
            <!--end 오른쪽 대화-->
          </div>
          <div id="talk_final_send" class="frame_bottom" style="display:none;">
            <img src="images/img_send.png" width="35" />
          </div>

          <!--오른쪽 대화 마지막대화-->
          <div id="talk_final" class="one_chat right ending_chat" style="display:none;">
            <div class="content">
              <div class="talk clearfix ending">
                <div class="deco"><img src="images/talk_yellow.png" width="15" /></div>
                <div class="here"><img src="images/icon_here.png" width="100" /></div>
                <div class="txt end">
                  <?=$ch_data['ch_nick']?><?= has_batchim($ch_data['ch_nick']) > 0 ? "을" : "를" ?> 다시 초대하기<br>
<?
  if ($ch_data['ch_choice'] == "Y")
  {
?>
                    <a href="#" onclick="next_page('6');return false;">mydream.compassion.or.kr</a>
                    <a href="#" onclick="next_page('6');return false;"><img src="images/img_link.png" width="130" /></a>
<?
  }else{
?>
                    <a href="#" onclick="next_page('5');return false;">mydream.compassion.or.kr</a>
                    <a href="#" onclick="next_page('5');return false;"><img src="images/img_link.png" width="130" /></a>
<?
  }
?>
                </div>
                <div class="cnt v6"><img src="images/icon_out.png" width="25" /></div>
              </div>
            </div>
          </div>
          <!--end 오른쪽 대화-->
        </div>
      </div>
      <div id="talk_final_mask" class="mask_ending" onclick="close_mask();return false;" style="display:none;"></div>
<?
  }
?>
  <div id="page_div5" class="wrap_page share_match_child" style="display:none;">
    <div class="inner">
      <div class="block_content">
        <div class="title compassion">
          "<span style="color:#E9DE51"><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "아" : "야" ?><br>
          내꿈꿔!"<br>
        </div>
        <div class="sub_txt">
        가난으로 인해 꿈을 잃어버린 <br>
        '<?=$ch_data['ch_nick']?>'의 후원자가 되어주세요
        </div>
        <div class="img_com">
          <div class="img_child story_result">
            <img src="<?=$ch_data['ch_full_img_url']?>" />
          </div>
          <div class="txt_child story_result">  
            <div class="inner" style="margin-top:30px;height:110px">
              <p style="text-align:center;"><?=$ch_data['ch_nick']." / ".$ch_data['ch_id']." / ".$ch_data['ch_nation_name']." / ".$ch_data['ch_gender']?></p>
              <p><?=$ch_data['ch_desc']?></p>
            </div>
          </div>
          <img src="images/bg_story_result.jpg" class="bg" />
        </div>
        <div class="block_btn spon">
<?
  if ($iphone_banner_gubun == "Y")
  {
?>
          <div class="bt"><a href="#" onclick="open_fb_ks_page('5');return false;"><img src="images/btn_spon.png" /></a></div>
<?
  }else{
?>
          <div class="bt"><a href="http://www.compassion.or.kr/Mobile/cdspDetail3.aspx?ChildMasterID=<?=$ch_data['ch_id']?>&ChildID=<?=$ch_data['ch_key']?>" target="_blank"><img src="images/btn_spon.png" /></a></div>
<?
  }
?>
          <div class="txt">1:1후원으로 <?=$ch_data['ch_nick']?>의 꿈을 현실로 만들어주세요!</div>
        </div>
        <div class="block_btn cheer">
          <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
          <div class="txt">1:1 후원이 어려울 경우<br> SNS에 어릴적 사진을 공유하고 함께 응원해주세요</div>
        </div>
        <div class="friends_pic">
          <div class="inner_friends_pic clearfix">
            <div class="img"><img src="<?=$mb_data['mb_image']?>" /></div>
            <div class="txt">어린 시절  꿈과 사진을 등록하고<br> SNS공유하면 응원 완료!</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="page_div6" class="wrap_page share_match_child" style="display:none;">
    <div class="inner">
      <div class="block_content">
        <div class="title end">
          감사합니다!<br>
          당신과 같이 꿈을 응원해주시는 분들 덕분에
          <span><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?>
          후원자를 만나 꿈을 꿀 수 있게 됐어요
          <!-- "<span><?=$ch_data['ch_nick']?></span>아<br>
          내꿈꿔!"  -->
        </div>
        <div class="block_child re">
          <div class="inner_block_child clearfix">
            <div class="child_pic re"><img src="<?=$ch_data['ch_full_img_url']?>" /></div>
          </div>
        </div>
        <div class="more_child_list">
          <div class="inner_more_child_list clearfix">
            <div class="one"><img src="images/ex_child_01.png" /></div>
            <div class="one"><img src="images/ex_child_02.png" /></div>
            <div class="one"><img src="images/ex_child_03.png" /></div>
            <div class="one"><img src="images/ex_child_04.png" /></div>
          </div>
          <div class="txt">
          컴패션에는 꿈이 필요한 어린이들이 많이 있어요<br>
          당신의 어린 시절 꿈과 사진을 공유하셔서<br> 
          어린이의 꿈을 응원해주세요
          </div>
        </div>
        <div class="block_btn re">
          <a href="index.php"><img src="images/btn_apply_re.png" /></a>
        </div>
      </div>
    </div>
  </div>

  <div id="page_div7" class="wrap_page share_match_child" style="display:none;">
    <div class="inner">
      <div class="block_content">
        <div class="title compassion">
        "얘들아, 내꿈꿔~!"
        </div>
        <div class="sub_txt">
        컴패션 소개와 함께 어린 시절 사진을 sns에 공유하면<br>
        꿈을 잃어버린 어린이들을 도와줄 수 있습니다
        </div>
        <div class="img_com">
          <div class="img_child">
            <div class="inner_img_child clearfix">
              <div class="one"><img src="images/ex_child_05.jpg" /></div>
              <div class="one"><img src="images/ex_child_06.jpg" /></div>
              <div class="one"><img src="images/ex_child_07.jpg" /></div>
            </div>
          </div>
          <img src="images/bg_share_com.png" class="bg" />
        </div>
        <div class="block_btn spon">
<?
  if ($iphone_banner_gubun == "Y")
  {
?>
          <div class="bt"><a href="#" onclick="open_fb_ks_page('7');return false;"><img src="images/btn_spon.png" /></a></div>
<?
  }else{
?>
          <div class="bt"><a href="http://www.compassion.or.kr/Mobile/cdspDetail3.aspx?ChildMasterID=<?=$ch_data['ch_id']?>&ChildID=<?=$ch_data['ch_key']?>" target="_blank"><img src="images/btn_spon.png" /></a></div>
<?
  }
?>
          <div class="txt">1:1후원으로 아이의 꿈을 현실로 만들어주세요!</div>
        </div>
        <div class="block_btn cheer">
          <div class="bt"><a href="#" onclick="f_show_dream_sel();return false;"><img src="images/btn_cheer.png" /></a></div>
          <div class="txt">1:1 후원이 어려울 경우<br> SNS에 어릴적 사진을 공유하고 함께 응원해주세요</div>
        </div>
        <div class="friends_pic">
          <div class="inner_friends_pic clearfix">
            <div class="img"><img src="<?=$mb_data['mb_image']?>" /></div>
            <div class="txt">어린 시절  꿈과 사진을 등록하고<br> SNS공유하면 응원 완료!</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<div id="upload_page" class="wrap_page sub upload" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title follower">
<?
  if ($ch_data['ch_nick'] == "")
  {
?>
        여러분의 어린 시절 꿈과 사진을 올려주세요<br>
        SNS에 사진과 함께 당신이 응원할<br>
        <span class="name">'꿈을 잃은 어린이</span>가 소개됩니다<br>
<?
  }else{
?>
        여러분의 어린 시절 꿈과 사진을 올려주세요<br>
        SNS에 사진과 함께 당신이 응원할<br>
        꿈을 잃은 어린이<br>
        <!-- 이미 결연된 아이의 링크 일 경우엔 텍스트? -->
        <span class="name">‘<?=$ch_data['ch_nick']?>’</span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 소개됩니다 <!-- 이 가 -->
<?
  }
?>
      </div>
                <div class="block_input_dream">
                  <div class="selec_job clearfix">
                      <!-- <div class="txt_1" id="sel_job_txt">1. 내 어린시절 꿈 선택 </div> -->
                        <div class="txt_1"><span id="sel_job_txt">1. 내 어린시절 꿈 선택 </span> </div>
                        <div class="txt_2"><a href="#" onclick="open_pop('job_popup');return false;"><img src="images/btn_sec.png" width="90" /></a></div><!--버튼 두개입니다-->
                    </div>
                    <div class="upload_pic">
                      <div class="title_pic clearfix">
                          <div class="txt_1">2. 사진업로드</div>
                            <div class="txt_2">
                              <form id="img_save" method="post" action="./photo_upload.php" enctype="multipart/form-data">
                                <label for="f_inputImage" title="Upload image file">
                                  <input type="file" class="sr-only" id="f_inputImage" name="file" accept="image/*">
                                  <span title="Import image with Blob URLs"><img src="images/btn_select_pic.png" width="90" /></span>
                                </label>
                              </form>
                            </div>
                          <div class="txt_3"><a href="#" onclick="open_pop('preview_popup')"><img src="images/btn_preview.png" width="80"  /></a></div>
                        </div>
                        <div id="img_div" class="pic_area" style="display:none;">
                          <img id="f_ori_image" src="./images/picture.jpg" alt="Picture" />
                        </div>
                        <div class="btn_closeup" style="display:none;">
                          <a href="#" onclick="zoom_action('down');return false;"><img src="images/btn_minus.png" width="80" /></a>
                            <a href="#" onclick="zoom_action('up');return false;"><img src="images/btn_plus.png" width="80" /></a>
                        </div>
                    </div>
                </div>
                
                <div class="txt_pic">
                    * 1개의 이미지 파일을 등록할 수 있습니다
                </div>
      <div class="block_btn upload">
        <a href="#" onclick="f_dream_next();return false;"><img src="images/btn_upload_comp.png" /></a>
      </div>
    </div>
  </div>
</div>

<div id="matching_share_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title" style="font-size:18px">
        아래 SNS에 어린 시절 사진을 공유하여<br>
        <span style="color:#E9DE51"><?=$ch_data['ch_nick']?></span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?> 후원자를<br>
        만날 수 있도록 해주세요!
      </div>
      <div class="block_child">
        <div class="inner_block_child clearfix">
          <div class="child_pic"><img src="<?=$ch_data['ch_full_img_url']?>" id="f_matching_child_pic" /></div>
          <div class="child_text">
            <h2>"저도 <span id="m_rs_job"></span><span id="jobPP">를</span> 꿈꿀 수 있을까요?"</h2> <!-- 을 를 -->
            <div class="bg_line">
              <p>
             <?=$ch_data['ch_desc']?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="block_txt">
        SNS에 공유하셔서<br>
        <span id="m_rs_ch_name3"><?=$ch_data['ch_nick']?></span>의 후원자를 찾아주세요
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','fol','matching_share_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','fol','matching_share_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','fol','matching_share_page');return false;"><img src="images/sns_ks.png" /></a>
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

<div  id="no_matching_page" class="wrap_page share_match_child" style="display:none;">
  <div class="inner">
    <div class="block_content">
      <div class="title compassion">
      컴패션에는 당신의 어린 시절처럼<br>
      꿈 많고 귀여운 어린이들이 있습니다
      </div>
      <div class="sub_txt">
      컴패션 소개와 함께 어린 시절 사진을 sns에 공유하면<br>
      꿈을 잃어버린 어린이들을 도와줄 수 있습니다
      </div>
      <div class="img_com">
        <div class="img_child">
          <div class="inner_img_child clearfix">
            <div class="one"><img src="images/ex_child_05.jpg" /></div>
            <div class="one"><img src="images/ex_child_06.jpg" /></div>
            <div class="one"><img src="images/ex_child_07.jpg" /></div>
          </div>
        </div>
        <img src="images/bg_share_com.png" class="bg" />
      </div>
      <div class="block_btn sns">
        <a href="#" onclick="go_share('fb','fol','no_matching_page');return false;"><img src="images/sns_f.png" /></a>
        <a href="#" onclick="go_share('kt','fol','no_matching_page');return false;"><img src="images/sns_kt.png" /></a>
        <a href="#" onclick="go_share('ks','fol','no_matching_page');return false;"><img src="images/sns_ks.png" /></a>
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
      <div class="title" style="font-size:15px">
        참여해주셔서 감사합니다<br>
        <span id="thx_ch_name">'<?=$ch_data['ch_nick']?>'</span><?= has_batchim($ch_data['ch_nick']) > 0 ? "이" : "가" ?><br>
        꿈을 꿀 수 있도록 끝까지 함께 응원해주세요 <!-- 이 가 -->
      </div>
      <div class="block_child re">
        <div class="inner_block_child clearfix">
          <div class="child_pic re"><img src="<?=$ch_data['ch_full_img_url']?>" id="thx_ch_img" /></div>
        </div>
      </div>
      <div class="block_btn ok">
        <a href="index.php"><img src="images/btn_ok.png" /></a>
      </div>
    </div>
  </div>
</div>
<!-- 공유 완료 페이지 -->

<!-- 페북/카스 인앱브라우저에서 결연맺기 클릭시(팔로워) 페이지 -->
<div id="fb_ks_page" class="wrap_page sub phone" style="display:none;">
  <div class="btn_close"><a href="#" onclick="return_home();return false;"><img src="images/popup/btn_close.png" /></a></div>
  <div class="inner">
    <div class="block_content">
      <div class="title">
      참여하신 분 중 추첨을 통해<br>
      컴패션 현지 어린이센터를 방문할 수 있는<br>
      기회를 드립니다
      </div>

      <div class="sub_title">
      후원자님의 어린이 양육을 돕기 위해 <br>
      전화연결을 진행하고 있습니다
      </div>
<?
  if ($mb_data['mb_child'] != "")
  {
?>
      <div class="sub_title3">
        후원자님이 양육하실 어린이 이름과 아이디는<br>
        <span><?=$ch_data['ch_nick']?>(<?=$ch_data['ch_id']?>)</span> 입니다.<br>
      </div>
      <div class="sub_title2">
      (전화 연결 전 어린이 이름과 아이디를 다시 한번 확인해주세요)
      </div>
<?
  }
?>
      <div class="block_btn">
        <a href="tel:02-740-1000"><img src="images/btn_phone.png" /></a>
      </div>
      <div class="txt_desc">
      지금 바로 연결을 원하시면 위의 버튼을 눌러주세요<br>
      한국컴패션으로 연결됩니다.<br>
      (오전 9시 – 저녁 6시에 전화 연결 가능)
      </div>

      <div class="block_btn second">
        <a href="#"><img src="images/btn_phone_num.png" /></a>
      </div>
      <div class="txt_desc">
      저녁 6시 이후에는 상담이 어려운 관계로<br>
      연락처를 남겨주시면 한국컴패션에서 전화를 드립니다.
      </div>
    </div>
  </div>
</div>
<!-- 페북/카스 인앱브라우저에서 결연맺기 클릭시(팔로워) 페이지 -->

<?
        include_once "./popup_div.php";
?>
</body>
</html>
<script type="text/javascript">
var agent = navigator.userAgent.toLowerCase();
var sel_dream       = null;
var runner_serial   = null;
var mb_job          = null;
var mb_image        = null;
var $ori_image = $('#f_ori_image');
var $inputImage = $('#f_inputImage');
var URL = window.URL || window.webkitURL;
var realFath;
var convertPath;
var blobURL;
var file;
var files;
var flag_sel_dream  = 0;
var mb_rs       = null;
var inputImageCheck;
var share_cnt     = 0;
var s_ugu = null;
var scroll_end  = 0;
var ios_prev_page	= null;
$(window).load(function() {
  Kakao.init('59df63251be6d99256b63b98f4948e89');
  $("#cboxTopLeft").hide();
  $("#cboxTopRight").hide();
  $("#cboxBottomLeft").hide();
  $("#cboxBottomRight").hide();
  $("#cboxMiddleLeft").hide();
  $("#cboxMiddleRight").hide();
  $("#cboxTopCenter").hide();
  $("#cboxBottomCenter").hide();

<?
  if ($mb_data['mb_child'] == "")
  {
?>
    talk_c_start();

	$(".inner_story").scroll(function(){
		if ($("#talk_c_message21").css("display") == "block" && $(".inner_story").scrollTop() == scroll_end){
			$("#talk_c_final").show();
			$("#talk_c_final_send").show();
			$("#talk_c_final_mask").height($(window).height());
			$("#talk_c_final_mask").show();
		}
	});
<?
  }else{
?>
    talk_start();

	$(".inner_story").scroll(function(){
		if ($("#talk_message21").css("display") == "block" && $(".inner_story").scrollTop() == scroll_end){
			$("#talk_final").show();
			$("#talk_final_send").show();
			$("#talk_final_mask").height($(document).height());
			$("#talk_final_mask").show();
		}
	});
<?
  }
?>

  Ins_share_cnt('<?=$rs?>','<?=$ugu?>','<?=$parent_idx?>');
  // 미리보기 제어
  $(".preview").width($(document).width()*0.9);
  s_ugu = 'fol';
});
function image_crop(){
  $($ori_image).cropper({
    viewMode: 0,
    dragMode: 'move',
    autoCropArea: 0.8,
    aspectRatio: 1200/630,
    responsive: true,
    restore: true,
    guides: false,
    highlight: true,
    background: false,
    cropBoxMovable: true,
    cropBoxResizable: true,
    preview: '.preview',
    center:true,
    zoomOnWheel:false,
    toggleDragModeOnDblclick:false
  });
}
function f_preview_img()
{
  open_pop('f_preview_popup');
}
function zoom_action(type){
  if(type=="up")
  {
    $($ori_image).cropper('zoom', 0.1);
  }else{
    $($ori_image).cropper('zoom', -0.1);
  }
}
function rotate_action(degree){
  if(degree=="+")
  {
    $($ori_image).cropper('rotate', 90);
  }else{
    $($ori_image).cropper('rotate', -90);
  }
}

    //   if (URL) {
    //     $inputImage.change(function () {
    //       inputImageCheck = "Y";
    //       $("#img_div").show();
    // $(".btn_closeup").show();
    //       var files = this.files;
    //       var file;
    //       if (!$ori_image.data('cropper')) {
    //         return;
    //       }
    //       if (files && files.length) {
    //         file = files[0];
    //         if (/^image\/\w+$/.test(file.type)) {
    //           blobURL = URL.createObjectURL(file);
    //           $ori_image.one('built.cropper', function () {
    //             // Revoke when load complete
    //             URL.revokeObjectURL(blobURL);
    //           }).cropper('reset').cropper('replace', blobURL);
    //           $inputImage.val('');
    //         } else {
    //           window.alert('Please choose an image file.');
    //         }
    //       }
    //     });
    //   } else {
    //     $inputImage.prop('disabled', true).parent().addClass('disabled');
    //   }
    $inputImage.change(function (){
        inputImageCheck = "Y";
        $("#img_div").show();
        $(".btn_closeup").show();
        $($ori_image).cropper('destroy');
        $('#img_save').ajaxSubmit({
            beforeSubmit: function (){
                $($ori_image).attr('src', './images/bx_loader.gif');
            },
            success: function (data) {
              console.log(data);
                $($ori_image).attr('src', data);
                image_crop();
            }
        })
    });

function f_dream_next()
{
    if (sel_dream == null)
    {
        alert("당신의 어린시절 꿈을 선택해 주세요.");
        return false;
    }
    if (inputImageCheck !== "Y")
    {
        alert("이미지를 업로드해주세요.");
        return false;
    }
        //mb_job    = $("#mb_job").val();
        // 사진 저장할 내용 추가
        var croppedImg = $($ori_image).cropper('getCroppedCanvas', {width:1200, height:630});
        var canvasImageURL = croppedImg.toDataURL("image/jpeg");
		var job_lang_kor = job_ko_add(sel_dream);

        $.ajax({
            method: 'POST',
            url: '../main_exec.php',
            data: {
                exec            : "input_follower",
                canvasurl   : canvasImageURL,
                mb_child    : "<?=$mb_data['mb_child']?>",
                rs    : "<?=$rs?>",
<?
    if ($ugu == "act")
    {
?>
                parent_idx  : "<?=$mb_data['idx']?>",
<?
    }else{
?>
                parent_idx  : "<?=$mb_data['parent_idx']?>",
<?
    }
?>
                mb_job      : sel_dream,
				mb_job_kor    : job_lang_kor
            },
            /*beforeSend: function(response){
        $("#upload_page").fadeOut('fast', function(){
          $("body").addClass("bg_sub_page bg_loading");
          $("#loading_div").fadeIn('fast');
        });
            },*/
            success: function(res){
                // console.log(res);
                //mb_image    = res;
                var rs_ch = res.split("||");
                mb_rs = rs_ch[1];

                $("#m_rs_job").html(job_lang_kor);
				if(rs_ch[2] > 0){
					//받침 O
					$("#jobPP").html("을");
				}

                if (rs_ch[0] == "Y")
                {
                    $("#matching_child_pic").attr("src","<?=$ch_data['ch_top_img_url']?>");
<?
  if ($ch_data['ch_choice'] == "Y")
  {
?>
			$("#upload_page").fadeOut('fast',function(){
				$("#no_matching_page").fadeIn("fast");
			});
<?
  }else{
?>
            $("body").removeClass("bg_loading");
			$("#upload_page").fadeOut('fast',function(){
				$("#matching_share_page").fadeIn("fast");
			});
<?
  }
?>
                }else if (rs_ch[0] == "N"){
					$("#upload_page").fadeOut('fast',function(){
						$("#no_matching_page").fadeIn("fast");
					});

                }else {
                    alert("참여자가 많아 처리가 지연되고 있습니다. 다시 참여해 주세요.");
                    location.reload();
                }
            }
        });
}
    function Ins_share_cnt(serial, ugu,parent_idx)
    {
        $.ajax({
            type:"POST",
            data:{
                "exec"      : "insert_share_cnt",
                "serial"      : serial,
                "parent_idx"  : parent_idx,
                "ugu"       : ugu
            },
            url: "../main_exec.php",
            success: function(res){
                // console.log(res);
            }
        });
    }
</script>