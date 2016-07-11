<?
	$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)1590", "compassion_dream");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$query 	= "SELECT * FROM child_info WHERE ch_choice='N'";
	$result 	= mysqli_query($my_db, $query);

	while ($data = mysqli_fetch_array($result))
	{
		$url = "http://www.compassion.or.kr/mydream/ReturnCommitment.aspx?ChildMasterID=".$data['ch_id'];

		$response = file_get_contents($url);
		$object = simplexml_load_string($response);

		$matchingYN = $object->ResponseInfo->CommitmentYN;

		if ($matchingYN == "Y")
		{
			$query2 	= "UPDATE child_info SET ch_choice='Y' WHERE ch_id='".$data['ch_id']."'";
			$result2 	= mysqli_query($my_db, $query2);
		}
	}
	echo "end";
?>