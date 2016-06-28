<?
	$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)1590", "compassion_dream");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$query 	= "SELECT * FROM child_info WHERE ch_choice<>'N'";
	$result 	= mysqli_query($my_db, $query);

	while ($data = mysqli_fetch_array($result))
	{
		$url = "http://www.compassion.or.kr/mydream/ReturnCommitment.aspx?ChildMasterID=".$data['ch_id'];

		$response = file_get_contents($url);
		$object = simplexml_load_string($response);

		$channel = $object->channel;

		foreach($channel->item as $value) {
			$title = $value->title;
			$description = $value->description;
			$link = $value->link;
		}
	}
?>