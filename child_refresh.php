<?
	include_once "include/global.php"; 			//변수정보
	include_once "include/function.php"; 		//함수정보
	include_once "include/dbi.php"; 			//DB 연결정보

	$query 	= "SELECT mb_child FROM ".$_gl['activator_info_table']." WHERE mb_regdate <'".date("Y-m-d",strtotime ("-3 days"))."'";
	$result 	= mysqli_query($my_db, $query);

	if ($result)
	{
		$data	= mysqli_fetch_array($result);

		$query 	= "UPDATE ".$_gl['child_info_table']." SET ch_choice='N' WHERE idx='".$data['mb_child']."'";
		$result 	= mysqli_query($my_db, $query);
	}

?>