<?php


namespace langenoir1878;

session_start();
if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit;
}

require_once 'IMG.php';
//require_once 'FileIMGRepository.php';
require_once 'SqliteIMGRepository.php';

//instantiate teh repository to get all the existing imgs
$imgRepo = new \langenoir1878\SqliteIMGRepository();
$imgList = $imgRepo->getAllIMGs();

//html section
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1459px 121px;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 0px;
}
.left_side {
	margin-left: 10px;
	width: 98%;
    border:1px solid #00FF00;
}
.dragon_image{
	position:fixed;
	margin-top:30px;
	margin-left:870px;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<title>DASHBOARD</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
<div class = "lay_content" align = "center">
<font color = "#FFFFFF"><h1> </h1></font>
<br>
<br>
<div style="text-align:right">
	<font color = "pink"><?php echo 'Hi, '. $_SESSION['user'] . ' !'; ?></font>
	&nbsp;&nbsp;&nbsp;<font color = "pink">
	<a href="login.php?logout=yes">logout</a></font>
	&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
<div style="text-align:left;">
<a href="Index.php" class="btn btn-primary btn-lg active" role="button">
	 HOME </a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="profile.php" class="btn btn-primary btn-lg active" role="button">
	 DESIGNER PROFILE </a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="create.php" class="btn btn-primary btn-lg active" role="button">
	 NEW IMAGE TEST </a>
</div>
</div>
</head>

<body>
	
<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
<br>
<div class = "left_side">
	
	<p><font color ="blue" size = "2"> &nbsp; IMGS HISTORY : </font></p>

	<br>
<ul>
	
	<?php
	//display the list of imgs
	foreach($imgList as $img){
		print '<li><a href="view.php?id=' . $img->getId(). '">' . $img->getU() .  
		'<font color= "#00FFFF"> &nbsp; -By: &nbsp;' . $img->getAuthor_name() . '</font><font color="grey"></a></li><br>';
	}
	/*
	foreach ($imgList as $img ) {
		print_r($imgList);
		//testing the array
	}
	*/
	//previous: <li><a> IMG X </a></li>
	?>
	
</ul>

<br>
</div>

</body>
</html>