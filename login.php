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
  <title>Admin Login Portal</title>
  
</head>
<!-- HeadSection Closed -->
<!-- Body Section Open-->
   <body>
  <!-- Start Header-->  
     
<!-- End Header--> 
<!-- Start Banner-->

<!-- End Banner--> 



<!-- Start section1-->
<section id="container">
		<div class="pw">
		<form method="post" action="enhancement1.php" novalidate="novalidate">
				<fieldset><legend>Login Admin Portal</legend>
		<p class="row">	<label for="UserName">UserName: </label>
			<input type="text" name="UserName" id="UserName" /></p>
		<p class="row">	<label for="Password">Password: </label>
			<input type="text" name="Password" id="Password" /></p>

				<p>	<input type="submit" value="Login" /></p>
	</fieldset>
				</form>
				</div>
		

	
</section>
<!-- End Section1--> 
<!-- Start Footer-->
<?php include_once 'Footer.inc'?>
<!-- End footer--> 
</body>
<!-- End Body Section-->
</html>
