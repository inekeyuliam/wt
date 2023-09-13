<?php

	if (substr($_SERVER['HTTP_HOST'],0,9)=='localhost') {

	    $conn = mysqli_connect('localhost','root','123');
	    mysqli_select_db($conn,'watches_trader');
	    mysqli_set_charset($conn,'utf8mb4');

	} else {

	    $conn = mysqli_connect('localhost','dbadmin','6Bg4R6TDrWxBpUCd');
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		 }
	    mysqli_select_db($conn,'watches_trader');
	    mysqli_set_charset($conn,'utf8mb4');

	}
  	date_default_timezone_set("Asia/Bangkok");

?>