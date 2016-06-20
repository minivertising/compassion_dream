<?
	$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)1590", "compassion_dream");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$query 	= "SELECT mb_child FROM activator_info WHERE mb_regdate <'".date("Y-m-d",strtotime ("-3 days"))."'";
	$result 	= mysqli_query($my_db, $query);

	if ($result)
	{
		$data	= mysqli_fetch_array($result);

		$query2 	= "UPDATE child_info SET ch_choice='N' WHERE idx='".$data['mb_child']."'";
		$result2 	= mysqli_query($my_db, $query2);
	}

?>