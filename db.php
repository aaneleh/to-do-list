<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");
	define("BASE", "todo");
	$link = mysqli_connect(HOST, USER, PASS) or die(mysqli_error($link));
	mysqli_select_db($link, BASE) or die(mysqli_error($link));
?>