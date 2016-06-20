<?
    /******************************************************************************
     *
     * dbi.php
     *
     * Configuration file
     *
     * Created : 2014
     *
     ******************************************************************************/
	//$my_db = new mysqli("localhost", "root", "86alslqjxkdlwld@%*)", "belif_billy2");
	//$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)", "compassion_dream");
	$my_db = new mysqli("localhost", "root", "7alslqjxkdlwld@%*)1590", "compassion_dream");
    // $my_db = new mysqli("localhost", "root", "apmsetupwoo", "compassion_dream");
	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
?>
