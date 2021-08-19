# word-by-word
To start create a file in the folder with the following text.
```
conn.php
```
```
<?php
	$servername = getenv("mysql_app_password");
	$username = getenv("mysql_app_password");
	$password = getenv("mysql_app_password");
	$db = "";
    $mysqli=new mysqli($host,$user,$password,$db);
    if($mysqli->connect_error)
        die('Connect Error');
?>
```
