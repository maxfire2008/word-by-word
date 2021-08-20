<?php

require 'conn.php';
require 'navbar.php';
require 'htmlredirect.php';

if (isset($_POST['userToken']) or isset($_GET['userToken'])) {
	if (isset($_COOKIE['user_token'])) {
		if (isset($_POST["redirect_url"])) {
			htmlRedirect(rawurldecode($_POST["redirect_url"]));
		} else if (isset($_GET["redirect_url"])) {
			htmlRedirect(rawurldecode($_GET["redirect_url"]));
		} else {
			htmlRedirect("/");
		}
	} else {
		if (isset($_POST['userToken'])) {
			$user_token = mysqli_real_escape_string($mysqli,$_POST['userToken']);
		} else {
			$user_token = mysqli_real_escape_string($mysqli,$_GET['userToken']);
		}
		$sql = "SELECT `user_token` FROM `users` WHERE `user_token` = '".$user_token."';";
		$result = $mysqli->query($sql);
		$rowcount = $result->num_rows;
		if ($rowcount) {
			setcookie("user_token",$user_token);
			if (isset($_POST["redirect_url"])) {
				htmlRedirect(rawurldecode($_POST["redirect_url"]));
			} else if (isset($_GET["redirect_url"])) {
				htmlRedirect(rawurldecode($_GET["redirect_url"]));
			} else {
				htmlRedirect("/");
			}
		} else {
			if (isset($_POST["redirect_url"])) {
				htmlRedirect("/signin.php?failure=yes&redirect_url=".$_POST["redirect_url"]);
			} else if (isset($_GET["redirect_url"])) {
				htmlRedirect("/signin.php?failure=yes&redirect_url=".$_GET["redirect_url"]);
			} else {
				htmlRedirect("/signin.php?failure=yes");
			}
		}
	}
} else if (isset($_GET['failure'])) {
	if (isset($_COOKIE['user_token'])) {
		if (isset($_POST["redirect_url"])) {
			htmlRedirect(rawurldecode($_POST["redirect_url"]));
		} else if (isset($_GET["redirect_url"])) {
			htmlRedirect(rawurldecode($_GET["redirect_url"]));
		} else {
			htmlRedirect("/");
		}
	} else {
	echo '<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Sign-in</title>
	</head>
	<body>
		';
		navbar();
		echo '
		<div class="jumbotron text-center">
			<h1>Sign-in</h1>
			<p>Sign-in failed try again.</p> 
		</div>
		<div class="container">
						<form class="px-4 py-3" action="/signin.php" method="post">';
	if (isset($_GET["redirect_url"])) {
		echo '<input type="text" name="redirect_url" style="display:none;" value="'.rawurlencode($_GET['redirect_url']).'">';
	}
	echo '				<div class="input-group mb-3">
								<input type="text" class="form-control" name="userToken" placeholder="User Token" aria-label="User Token" aria-describedby="basic-addon1"><br>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>';
	}
} else {
	if (isset($_COOKIE['user_token'])) {
		if (isset($_POST["redirect_url"])) {
			htmlRedirect(rawurldecode($_POST["redirect_url"]));
		} else if (isset($_GET["redirect_url"])) {
			htmlRedirect(rawurldecode($_GET["redirect_url"]));
		} else {
			htmlRedirect("/");
		}
	} else {
	echo '<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Sign-in</title>
	</head>
	<body>';
		navbar();
		echo '
		<div class="jumbotron text-center">
			<h1>Sign-in</h1>
						<form class="px-4 py-3" action="/signin.php" method="post">';
	if (isset($_GET["redirect_url"])) {
		echo '<input type="text" name="redirect_url" style="display:none;" value="'.rawurlencode($_GET['redirect_url']).'">';
	}
	echo '
							<div class="input-group mb-3">
								<input type="text" class="form-control" name="userToken" placeholder="User Token" aria-label="User Token" aria-describedby="basic-addon1"><br>
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>';
}
}
?>
