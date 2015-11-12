<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 11/02/2015
 * Time: 17:45:12
 * @ 3001-718 Chicago
 * Navigation to a specific img item view
 */

namespace langenoir1878;

//check the session if logged in
		session_start();
	if(!isset($_SESSION['user']))
	{
	    header("Location: login.php");
	    exit;
	}

	//require_once 'FileIMGRepository.php';
	require_once 'IMG.php';
	require_once 'SqliteIMGRepository.php';

	//instantiate the repo
	//$imgRepo = new \yzhan214\as2\FileIMGRepository();
	$imgRepo = new \langenoir1878\SqliteIMGRepository();

	//temp vars like the demo6
	$imgId = isset($_GET['id'])? $_GET['id']:'';
	$img = $imgRepo->getIMGById($imgId);

?>



<?php if($img): ?>
	<!DOCTYPE html>
	<html lang="en">
	<style>
	.lay_content {
    background-image: url("bg.png");
    background-size: 1459px 1245px;
    background-color: black;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
	}
	.left_side {
	margin-left: 10px;
	width: 98%;
    border:1px solid #00FF00;
	}
	.right_side{
		margin-right: 20px
	}
	.row_form{
		display: inline-block;
		margin-left: 10px;
	}

	</style>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title><?php print $img->getU(); ?></title>

		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
		<div class = "lay_content" align = "center">
		<font color = "#FFFFFF">
			<h2><?php print $img->getU(); ?></h2>
			<p><?php print $img->getAuthor_name(); ?></p>
			
			<br>
		</div>
		<div class = "row_form" >
			<a href="Index.php" class="btn btn-primary btn-lg active" role="button">
			 HOME </a>
			&nbsp; &nbsp;
			<form action = "edit.php" method = "POST" style='display: inline-block'>
				<input type = "hidden" name = "id" value = "<?php print $img->getId();?>">
				<input type = "submit" value = "Edit">
			</form>
				<input type = "hidden" name = "id" value = "<?php print $img->getId();?>">
			&nbsp; &nbsp;
			<script type = "text/javascript">
			function button_clicked(){
				//if-else control structure
				if (confirm('Cautious: IMG will be deleted')){
					form.submit();
				}else{ // bug pranks
					alert("That was really scary! But I'm going to delete it anyway ~ 0_< Ah ha ha ha!");

				}
			}
			</script>
			<form action = "delete.php" method = "POST" style = 'display: inline-block'>
				<input type = "hidden" name = "id" value = "<?php print $img->getId();?>">
				<input type = "submit" value = "Delete" onclick = "button_clicked();">
			</form>

			<br>
			<br>
			
		</div>

	</head>
	<body background = "bg.png">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
		<br><br>
		<div class = "left_side">
		
		

		</div>
		<br>
	
	</body>
	</html>





<?php else: ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<title>Oops</title>
		<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
	</head>
	<body>
		<div style="text-align: center">
			<br><br>
		<h1>IMG Not Found!</h1>
		<img src="dino.png">
		<br><br>
		<a href = "Index.php"> Back to the IMG Dashboard </a>
		</div>
	</body>
	</html>




<?php endif; ?>

















