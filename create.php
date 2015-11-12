<?php
/**
 * User: ln1878
 * Date: 11/11/2015
 * Time: 19:20:18 pm
 * @IIT.SB 112
 * Chicago
 */

namespace langenoir1878;

//check the session if logged in
		session_start();
	if(!isset($_SESSION['user']))
	{
	    header("Location: login.php");
	    exit;
	}


require_once 'IMG.php';
//require_once 'FileIMGRepository.php';
require_once 'SqliteIMGRepository.php';



//Shortend Post variable names if set
$imgUrl = isset($_POST['url']) ? $_POST['url'] : '';
$imgAuthor = isset($_POST['author_name']) ? $_POST['author_name'] : '';


//validation of required form fields
$formIsValid = true;
$subjectErr = '';
$authorErr = '';

if (empty($imgUrl)){
	$formIsValid = false;
	$subjectErr = 'Please enter the URL';
}
if (empty($imgAuthor)){
	$formIsValid = false;
	$authorErr = 'Please enter the author name';

}
?>

<!DOCTYPE html>
<html lang="en">
<style>
.lay_content {
    background-image: url("bg.png");
    background-size: 1878px 1245px;
    background-color: black;
 	font-style: oblique;
    padding: 20px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
.left_side {
	margin-left: 20px;
	width: 98%;
    border:1px solid #00FF00;
}
</style>

<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title> Add New IMG </title>
	<div style="text-align:left;">
<a href="index.php" class="btn btn-primary btn-lg active" role="button"> <h2> &nbsp;&nbsp; IMG Dashboard </h2> </a>
</div>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" title="Style">
	<div class = "lay_content" align = "center" >
		<font color = "#FFFFFF"><h1>Create Something Awesome</h1></font>
	</div>


</head>

<body background = "grey">

<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
	<?php if($formIsValid): ?>

		<?php 
//instantiate the repository and obj
//$imgRepo = new \yzhan214\as2\FileIMGRepository();
$imgRepo = new \langenoir1878\SqliteIMGRepository();

$img = new \langenoir1878\IMG();


//set vars
//$img->setId(NULL);
$img->setU($imgUrl);
$img->setAuthor_name($imgAuthor);


//print_r($img);


//save obj by calling saveIMG func
$imgRepo->saveIMG($img);

	?>
	
	<div style="text-align: center;">

		<br><br><br>
		<h1><font color="#00FF00"> - New IMG Added - </font></h1>
		<br>
		<p>******* URL: <?php print $imgUrl; ?></p><br>
		<p>Author: <?php print $imgAuthor; ?></p><br>
		
		
		<?php
    	/*
    	 * display char_count in html:
    	 * <p>Char_count <?php print $char_count; ?></p><br>
     	 */

		?>
		
		<br>
	</div>

		
		
  
	<?php else: ?>

	<div class="left_side">
		<br><br>
	<h1>&nbsp;&nbsp; Create New IMG</h1>
	<form action = "create.php" method = "post">
	<p>&nbsp;&nbsp;&nbsp;( Notice: <font color = "red">* </font> Required )</p>
	<label><font color = "red">&nbsp;&nbsp; * </font> 
		URL : <input type = "text" name = "url" style="color: blue; background-color: transparent;" value = "<?php print $imgUrl; ?>">
	&nbsp; </label><?php print $subjectErr; ?>
	<br><br>
	<label><font color = "red">&nbsp;&nbsp; * </font> 
		Author name : <input type = "text" name = "author_name" style="color: blue; background-color: transparent;" value = "<?php print $imgAuthor; ?>">
	&nbsp; </label> <?php print $authorErr; ?>
	<br>
    
	<br><br>

    &nbsp;&nbsp;&nbsp;&nbsp; <input type = "submit" value = "Save">
    <br><br>
</div>
   </form>

   <br><br><br> <br><br><br> <br><br><br>
	  <?php endif; ?>
<?php else: ?>
	<div class="left_side">
		<br><br>
	<h1>&nbsp;&nbsp; Create New IMG</h1>
	<form action="create.php" method = "POST">
	<p> &nbsp;&nbsp;&nbsp;( Notice: <font color = "red">* </font> Required )</p>
	<label><font color = "red">&nbsp;&nbsp; * </font> URL : <input type = "text" name="url" style="color: blue; background-color: transparent;"></label>
	<br><br>
	<label><font color = "red">&nbsp;&nbsp; * </font> Author name : <input type = "text" name="author_name" style="color: blue; background-color: transparent;"></label>
	<br><br>
   

    &nbsp;&nbsp;&nbsp;&nbsp; <input type = "submit" value = "Save">
    <br><br>
	</form></div>
<br><br><br>

<?php endif; ?>

</body>
</html>










