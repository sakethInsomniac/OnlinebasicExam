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
   
  <title>AdminPortal</title>
  
</head>
<!-- HeadSection Closed -->

   <body>
     <?php include_once 'Header.inc'?>
<!-- Start Banner--> 
<div class="bancontain">
		<div id="ban" class="pw">
				<ul><li><img src="images/admin.jpg" alt="Server flow Image" /></li></ul>
		</div>
</div>

<section id="container">
		<div class="pw">
		<h2> Admin:</h2> <br/>
		
	<form method="post" action="manage.php" novalidate="novalidate">
	<fieldset><legend>Search the Exam Portal Data</legend>
		<p class="row">	<label for="studentID">Student id: </label>
			<input type="text" name="studentID" id="studentID" /></p>
		<p class="row">	<label for="firstname">First Name: </label>
			<input type="text" name="firstname" id="firstname" /></p>
		<p class="row">	<label for="lastname">Last Name: </label>
			<input type="text" name="lastname" id="lastname" /></p>
		<p>Get records as per attempts</p>
            <p>
              <input type="radio" name= "hundred" id="hundred"  required="required"/>
              <label for="hundred">All student with 100 percent in first attempt</label>
              <input type="radio" name= "fifty" id="fifty"/>
              <label for="fifty">All students with less 50 percent in third attempt</label>
            </p>
		<p>	<input type="submit" value="Search" /></p>
	</fieldset>
	
	<fieldset><legend>Delete Student</legend>
		<p>	<label for="deleteStudent">Student id: </label>
			<input type="text" name="deleteStudent" id="deleteStudent" /></p>
		<p>	<input type="submit" value="Delete" /></p>
	</fieldset>
	
	<fieldset><legend>Update Exam Marks</legend>
		<p class="row">	<label for="updatestudent">Student id: </label>
			<input type="text" name="updatestudent" id="updatestudent" /></p>
		<p>	<input type="submit" value="updatestudent" /></p>
	</fieldset>
	</form>
 
 </div>
 </section>

<!-- Start Footer-->
<?php include_once 'Footer.inc'?>
<!-- End footer--> 
<!-- End Container-->
</body>
</html>