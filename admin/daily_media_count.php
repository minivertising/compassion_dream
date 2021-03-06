<?php
	// 설정파일
	include_once "../config.php";
ini_set('error_reporting','E_ALL ^ E_NOTICE');
/*
	if (isset($_SESSION['ss_mb_id']) == false)
	{
		//header('Location: index.php'); 
		echo "<script>location.href='index.php'</script>"; 
		exit; 
	}
*/
	include "./head.php";

?>

  <div id="page-wrapper">
    <div class="container-fluid">
    <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">광고 채널별 캠페인 사이트 참여자 수(act)</h1>
        </div>
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="table-responsive">
            <!-- 필리핀 -->
            <div id="daily_applicant_count_div1" style="display:block">
              <table class="table table-hover">
                <thead>
                  <tr><th>날짜</th><th>유입매체</th><th>PC</th><th>Mobile</th><th>유니크</th><th>Total</th></tr>
                </thead>
                <tbody>
<?php
	$daily_date_query	= "SELECT mb_regdate FROM ".$_gl['activator_info_table']." WHERE 1 Group by substr(mb_regdate,1,10) ORDER BY mb_regdate DESC";
	$date_res			= mysqli_query($my_db, $daily_date_query);
	while($date_daily_data = mysqli_fetch_array($date_res))
	{
		$daily_date		= substr($date_daily_data['mb_regdate'],0,10);
		$media_query	= "SELECT mb_media, COUNT( mb_media ) media_cnt FROM ".$_gl['activator_info_table']." WHERE 1 AND shareYN='Y' AND mb_regdate LIKE  '%".$daily_date."%' GROUP BY mb_media";
		$media_res		= mysqli_query($my_db, $media_query);
		
		unset($media_name);
		unset($media_cnt);
		unset($pc_cnt);
		unset($mobile_cnt);
		unset($unique_cnt);
		$total_media_cnt		= 0;
		$total_mobile_cnt		= 0;
		$total_unique_cnt		= 0;
		$total_pc_cnt			= 0;
		$unique_count		= 0;
		while ($media_daily_data = mysqli_fetch_array($media_res))
		{
			$media_name[]	= $media_daily_data['mb_media'];
			$media_cnt[]	= $media_daily_data['media_cnt'];
			$pc_query		= "SELECT * FROM ".$_gl['activator_info_table']." WHERE 1 AND shareYN='Y' AND mb_regdate LIKE  '%".$daily_date."%' AND mb_media='".$media_daily_data['mb_media']."' AND mb_gubun='PC'";
			$pc_count		= mysqli_num_rows(mysqli_query($my_db, $pc_query));
			$mobile_query	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE 1 AND shareYN='Y' AND mb_regdate LIKE  '%".$daily_date."%' AND mb_media='".$media_daily_data['mb_media']."' AND mb_gubun='MOBILE'";
			$mobile_count	= mysqli_num_rows(mysqli_query($my_db, $mobile_query));
			$pc_cnt[]		= $pc_count;
			$mobile_cnt[]	= $mobile_count;

			$unique_query	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE 1 AND shareYN='Y' AND mb_regdate LIKE  '%".$daily_date."%' group by mb_phone";
			$unique_result	= mysqli_query($my_db, $unique_query);
			while ($unique_data	= mysqli_fetch_array($unique_result))
			{
				$unique_du_query	= "SELECT * FROM ".$_gl['activator_info_table']." WHERE 1 AND shareYN='Y' AND mb_regdate < '%".$daily_date."%' AND mb_phone='".$unique_data['mb_phone']."'";
				$unique_du_cnt		= mysqli_num_rows(mysqli_query($my_db, $unique_du_query));
				if ($unique_du_cnt == 0)
					$unique_count	= $unique_count + 1;
			}
			//$unique_count	= mysqli_num_rows(mysqli_query($my_db, $unique_query));
			$unique_cnt[]	= $unique_count;
		}
		$rowspan_cnt =  count($media_name);
		$i = 0;
		if ($daily_date == "2016-07-15")
		{
			$total_unique_cnt	= 19;
		}else if ($daily_date == "2016-07-16"){
			$total_unique_cnt	= 55;
		}else if ($daily_date == "2016-07-21"){
			$total_unique_cnt	= 4;
		}else if ($daily_date == "2016-07-22"){
			$total_unique_cnt	= 0;
		}else{
			if ($daily_date != "2016-07-14" && $daily_date != "2016-07-13" && $daily_date != "2016-07-17")
			{
				$total_unique_cnt	= $unique_cnt[0] - 4;
			}else{
				$total_unique_cnt	= $unique_cnt[0];
			}
		}
		foreach($media_name as $key => $val)
		{
?>
                  <tr>
<?
			if ($i == 0)
			{
?>
                    <td rowspan="<?=$rowspan_cnt?>"><?php echo $daily_date?></td>
<?
			}
?>
                    <td><?=$val?></td>
                    <td><?=number_format($pc_cnt[$i])?></td>
                    <td><?=number_format($mobile_cnt[$i])?></td>
                    <td>-</td>
                    <td><?=number_format($media_cnt[$i])?></td>
                  </tr>
<?php
			$total_media_cnt		+= $media_cnt[$i];
			$total_mobile_cnt		+= $mobile_cnt[$i];
			$total_pc_cnt			+= $pc_cnt[$i];                  
			$i++;
		}
?>
                  <tr bgcolor="skyblue">
                    <td colspan="2">합계</td>
                    <td><?php echo number_format($total_pc_cnt)?></td>
                    <td><?php echo number_format($total_mobile_cnt)?></td>
                    <td><?=number_format($total_unique_cnt)?></td>
                    <td><?php echo number_format($total_media_cnt)?></td>
                  </tr>

<?
	}
?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
</body>

</html>
