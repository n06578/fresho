<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	require_once ( 'php/config.php');
	require_once ( 'php/mysql.lib.php');
	
	$link = getNewsConn();

	
	$post["idx"] = filter_input(INPUT_POST, "idx", FILTER_SANITIZE_STRING);
	$post["name"] = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $post["pw"] = filter_input(INPUT_POST, "pw", FILTER_SANITIZE_STRING);
	$post["title"] = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
	$post["content"] = filter_input(INPUT_POST, "content", FILTER_SANITIZE_STRING);
	$post["date"] = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
    $post["lock_pw"] = (int) filter_input(INPUT_POST, "lock_pw", FILTER_SANITIZE_STRING);
	
	
	
	insertQnAResult($link, $post);
?>