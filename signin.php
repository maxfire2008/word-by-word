<?php

require 'conn.php';
require 'htmlredirect.php';

if (isset($_POST['userToken'])) {
	$user_token = mysqli_real_escape_string($mysqli,$_POST['userToken']);
	$sql = "SELECT `user_token` FROM `users` WHERE `user_token` = '".$user_token."';";
	$result = $mysqli->query($sql);
	$rowcount = $result->num_rows;
	if ($rowcount) {
		setcookie("user_token",$_POST['userToken']);
		htmlredirect("/");
	} else {
		http_response_code(403);
	}
}
?>
