<?php

require 'conn.php';

http_response_code(205);

if (isset($_POST['userToken'])) {
	$sql = "SELECT * FROM `users` WHERE '2c87f27f3f934cda8c6682deec079bea'";
	$result = $mysqli->query($sql);
	$resultArray = $result->fetch_assoc();
	foreach ($resultArray as $row) {
		if ($row[2] == $_POST['userToken']) {
			setcookie("user_token",$_POST['userToken']);
		}
	}
}

?>