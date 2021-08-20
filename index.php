<?php
	require 'conn.php';
	require 'navbar.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Word by Word</title>
	</head>
	<body>
		<?php
			navbar(isset($_COOKIE['user_token']));
		?>
		<div class="jumbotron text-center">
			<h1>Word by Word</h1>
			<p>A social experiment where a story is built one word at a time.</p> 
		</div>
		<?php
			if (isset($_COOKIE['user_token'])) {
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
					$sanitised_title = filter_var($story["title"], FILTER_SANITIZE_STRING);
					if ($ready_sql) {
						echo '<li class="list-group-item" style="background-color:yellow">';
					} else {
						echo '<li class="list-group-item">';
					}
					echo $sanitised_title;
					echo '</li>';
				}
				echo '</ul></div>';
			} else {
				echo '<div class="container">
						<form class="px-4 py-3" action="/signin.php" method="post">
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="userToken" placeholder="User Token" aria-label="User Token" aria-describedby="basic-addon1"><br>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>';
			}
		?>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>
