<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	require_once ( 'php/config.php');
	require_once ( 'php/mysql.lib.php');
	
	$link = getNewsConn();

	
	$post["option"] = filter_input(INPUT_POST, "option", FILTER_SANITIZE_STRING);
	$post["img"] = filter_input(INPUT_POST, "img", FILTER_SANITIZE_STRING);
	$post["comment"] = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
	$post["name"] = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
	$post["from"] = filter_input(INPUT_POST, "from", FILTER_SANITIZE_STRING);
	$post["price"] = (int) filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING);
	
	if ($_FILES["img"]["size"] != 0) {
		$updir = "list(image)";
			if(!file_exists($updir)) {
				mkdir($updir, 0777, true);
				}
				
			if (is_dir($updir)) {
				$post["img"] = "{$updir}/" . $_FILES["img"]["name"];
				
					if (!move_uploaded_file($_FILES["img"]["tmp_name"],
						$post["img"])) {
						unset($post["img"]);
			}
		}
	}
	insertCafeResult($link, $post);
?>