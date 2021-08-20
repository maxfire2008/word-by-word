<?php

require 'conn.php';

if (isset($_POST['userToken'])) {
	$user_token = mysqli_real_escape_string($mysqli,$_POST['userToken']);
	$sql = "SELECT `user_token` FROM `users` WHERE `user_token` = '".$user_token."';";
	$result = $mysqli->query($sql);
	$rowcount = $result->num_rows;
	if ($rowcount) {
		setcookie("user_token",$_POST['userToken']);
		http_response_code(205);
	} else {
		http_response_code(403);
	}
}
?>
