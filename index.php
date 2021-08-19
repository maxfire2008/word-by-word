<?php
	require 'conn.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Word by Word</title>
	</head>
	<body>
		<div class="jumbotron text-center">
			<h1>Word by Word</h1>
			<p>A social experiment where a story is built one word at a time.</p> 
		</div>
		<?php
			if (isset($_COOKIE['user_token'])) {
				echo '<div class="container">
						<h1>My Stories</h1>
					</div>';
			} else {
				echo '<div class="container" method="post">
						<form class="px-4 py-3">
							<div class="input-group mb-3">
								<input type="text" class="form-control" id="userToken" placeholder="User Token" aria-label="User Token" aria-describedby="basic-addon1">
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