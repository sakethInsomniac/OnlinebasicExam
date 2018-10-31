<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates some basic HTML content elements and CSS" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="author" content="Lakshmi Saketh"  />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Tulpen+One' rel='stylesheet' type='text/css' />
 <link rel="icon" href="images/logo.png" type="image/gif" /> 
 <title>QuizPortal</title>
  
</head>
<!-- HeadSection Closed -->
<!-- Body Section Open -->
   <body>
    
		 <?php include_once 'Header.inc'?>
<!-- Start Banner--> 
<div class="bancontain">
		<div id="ban" class="pw">
				<ul><li><img src="images/ajax.jpeg" alt="Server flow Image" /></li></ul>
		</div>
</div>
<!-- End Banner--> 
<!-- Start section1-->
<section id="container">
		
	<?php
require('settings.php');
$conn = @mysqli_connect($host,
	$user,
	$pwd,
	$sql_db
	);
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['UserName'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['UserName']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['Password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: admin.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }else{"<div class='form'>
<h3>Please type User name and password it is empty</h3>
	<br/>Click here to <a href='login.php'>Login</a></div>";}
?>			




</section>

<!-- End Section2--> 
<!-- Start Footer-->
<?php include_once 'Footer.inc'?>
<!-- End footer--> 

</body>
<!-- End Body Section-->
</html>