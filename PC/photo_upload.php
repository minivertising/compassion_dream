<?php
	$data = $_POST['canvasurl'];
	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);
	$data = base64_decode($data);

	mkdir($_SERVER['DOCUMENT_ROOT'] . "/photos");

	file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/photos/".time().'.jpg', $data);
	// die;
?>