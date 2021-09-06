<?php
	function storiesList() {
		require 'conn.php';
		echo '<style>@keyframes blink { 0%{ background-color:yellow; } 50%{ background-color:white; } 100%{ background-color:yellow; } }</style>';
		echo '<div class="container">
				<h1>My Stories</h1>
				<ul class="list-group">';
		$user_token = mysqli_real_escape_string($mysqli,$_COOKIE['user_token']);
		$sql = "SELECT `story_id` FROM word_by_word.users JOIN word_by_word.user_authorisations
		ON word_by_word.users.id = word_by_word.user_authorisations.user_id WHERE `user_token` = '".$user_token."';";
		$result = $mysqli->query($sql);
		while($row = $result->fetch_assoc()) {
			$stories_sql = "SELECT * FROM `stories` WHERE id = ".$row['story_id'].";";
			$stories_result = $mysqli->query($stories_sql);
			$story = $stories_result->fetch_assoc();
			$ready_sql = "SELECT word_by_word.words.* FROM word_by_word.words JOIN word_by_word.users
ON word_by_word.users.id = word_by_word.words.user_id WHERE `user_token` = '2c87f27f3f934cda8c6682deec079bea'
AND `text` IS NULL AND `story_id` = ".$row['story_id'].";";
			$ready_result = $mysqli->query($ready_sql);
			$ready = $ready_result->fetch_assoc();
			$sanitised_title = $story["title"];
			if ($ready_sql) {
				echo '<li class="list-group-item" style="animation: blink 1s infinite;">';
			} else {
				echo '<li class="list-group-item">';
			}
			echo '<a href="/story.php?story='.$row['story_id'].'">';
			echo '<div>';
			echo $sanitised_title;
			echo '</div>';
			echo '</a>';
			echo '<form action="/storyupdate.php" method="POST" id="form'.$row['story_id'].'"><div>';
			echo 'Assignable <input type="checkbox" id="assignable'.$row['story_id'].'" onclick="form'.$row['story_id'].'.submit()" checked>';
			echo '</div><div>';
			
			echo '</div></form>';
			echo '</li>';
		}
		echo '</ul></div>';
	}
?>
