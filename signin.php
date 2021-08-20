<?php

require 'conn.php';

//header("HTTP/1.1 205 REFRESH CONTENT");

if (isset($_POST['userToken'])) {
	$sql = "SELECT `user_token` FROM `users` WHERE `user_token` = '".mysqli_real_escape_string($_POST['userToken'])."';";
	$result = $mysqli->query($sql);
	$rowcount = $result->num_rows;
	echo mysqli_real_escape_string($_POST['userToken']);
	echo $sql;
	echo $result;
	if ($rowcount) {
		setcookie("user_token",$_POST['userToken']);
	}
}
?>
