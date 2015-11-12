<?php

namespace langenoir1878;

session_start();
//require_once 'credentials.php';

if (isset($_GET['logout'])) {
	session_destroy();
}

if(isset($_SESSION['user']))
{
    header("Location: index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Shorten Request Variables if they are set
	$username = isset($_POST['username']) ? trim($_POST['username']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';

	$valid_user = 'Yiming';
	$valid_hash = '$2y$10$XwCIua.7devIMB8M2nWb1OGG19co13hZZUDofh4zcs6aMHb5MC.mK';

	if ($username == $valid_user && password_verify($password, $valid_hash)) {
		$_SESSION['user'] = $valid_user;
		header("Location: index.php");
    	exit;
	}
}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">

<style>

.left_align{
	margin-left: 47px;
	width: 98%;
   // border:1px solid grey;
}

</style>

<head>
	<meta charset="UTF-8">
	<title>Login</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
<div class = "lay_content" align = "center">
<font color = "#FFFFFF"><h1> </h1></font>
<br>
<br>
</div>
</head>
<body background = "wall2.png">
<div class="left_align">
	<br>
		<form action="#" method="POST">
			<h1><font color = "white"> Please sign in: </font></h1>
			<br>
			<label><font color = "white">Username: </font><input type="text" name="username" style="color: white; background-color: transparent;"></label><br>
			<br>
			<label><font color="white">Password:  </font><input type="password" name="password" style="color: white; background-color: transparent;"></label><br>
			<br><br>
			<input type="submit" value = "Login">
			<br>
		</form>
</div>

</body>
</html>