<?php
	/*function getuserid() {
		if (isset($_COOKIE['user_token'])) {
			$user_token = mysqli_real_escape_string($mysqli,$_COOKIE['user_token']);
			$sql = "SELECT word_by_word.words.* FROM word_by_word.words JOIN word_by_word.users
ON word_by_word.users.id = word_by_word.words.user_id WHERE `user_token` = '2c87f27f3f934cda8c6682deec079bea'
AND `text` IS NULL AND `story_id` = ".$row['story_id'].";";
			$result = $mysqli->query($ready_sql);
			$userid = $ready_result->fetch_assoc();
			$sanitised_title = filter_var($story["title"], FILTER_SANITIZE_STRING);
		}
	}*/
?>