<?php

	define("HOST", "localhost");
	define("USER", "root");
	define("PASS", "");

	define("USER_BASE", "users");
	define("TASK_BASE", "tasks");

	$link = mysqli_connect(HOST, USER, USER_BASE) or die(mysqli_error($link));
	mysqli_select_db($link, BASE) or die(mysqli_error($link));

	//echo 'cheguei aqui';
	//die;
?>