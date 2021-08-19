<?php

require 'conn.php';

ob_start();

header("HTTP/1.1 204 NO CONTENT");

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.

ob_end_flush(); //now the headers are sent

if (isset($_POST['userToken'])) {
	$sql = "SELECT * FROM `users` WHERE '2c87f27f3f934cda8c6682deec079bea'";
	$result = $mysqli->query($sql);
	$resultArray = $result->fetch_assoc();
	setcookie("user_token",$_POST['userToken']);
	console.log(implode(" ",$resultArray));
	foreach ($resultArray as item) {
		echo $row;
	}
}

?>