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

   <body>
     <?php include_once 'Header.inc'?>

	<div id="banquiz" class="pw">
			<ul><li><img src="images/quiz.jpg" alt="quizImage" /></li></ul>
	</div>
		
	<form method="post" id="quizForm" name="Test"  action="markquiz.php" novalidate="novalidate">
		<section id="container">
		<div class="pw">
		<fieldset>
			<legend>Student Details</legend>
			<p><label for="studentid">Student ID</label> 
			<input type="text" name= "studentid" id="studentid"   /> </p>
			<p><label for="givenname">Given Name</label> 
			<input type="text" name= "givenname" id="givenname"  maxlength="25"   /></p>		
		
			<p><label for="familyname">Family Name</label> 
			<input type="text" name= "familyname" id="familyname"  maxlength="25" /> </p>
			
				
		</fieldset>
		
		
		<h2> Quiz on XMLHttpRequest:</h2> <br/>
		<fieldset>
			<legend>1.XMLHttpRequest object is the Keystone of Ajax</legend>
			<p> <input type="radio" id="true" name="ques1" value="true"/>
			<label for="true">True</label> 
				<input type="radio" id="false" name="ques1" value="false" /><label for="false">False</label> 
			</p>
		</fieldset>
		<br/>
		<fieldset>
			<legend>2.Select three important properties of the XmlHttpRequest</legend>
			<p><label for="onreadystatechange">Onreadystatechange</label> 
				<input type="checkbox" id="onreadystatechange" name="category[]" value="Onreadystatechange" />
				<label for="readyState">readyState</label> 
				<input type="checkbox" id="readyState" name="category[]" value="readyState" />
				<label for="Status">Status</label> 
				<input type="checkbox" id="Status" name="category[]" value="Status"/>
				<label for="reload">Reload</label> 
				<input type="checkbox" id="reload" name="category[]" value="reload" />
				<label for="WebPage">WebPage</label> 
				<input type="checkbox" id="WebPage" name="category[]" value="WebPage" /> </p> 
		</fieldset>
		<br/>
		<fieldset>
			<legend>3.We get the XML data using this property.</legend>
			
			<p><label for="ques3">Your Answer</label> 
			<select name="ques3" id="ques3" required="required">
				<option value="">Select Answer</option>			
				<option value="ResponseXml">ResponseXml</option>
				<option value="ResponseMessage">ResponseMessage</option>
				<option value="RightCommunication">RightCommunication</option>
				<option value="other">Other</option>
			</select>
		</p>
		</fieldset>
		<br/>
		
		<fieldset>
			<legend>4.What is the URL used for ?</legend>
			
			<p><label for="ques4">Your Answer:</label> <textarea id="ques4" name="ques4" rows="4" cols="40"  PLACEHOLDER="WRITE YOUR ANSWER HERE......!"></textarea></p>
		
		</fieldset>
<br/>
<fieldset>
<legend>5.What is the value of "OK" status web response ?</legend>
		<label for="ques5">Your Answer</label>
		<input id="ques5" name="floatingpoint" min="190" max="200" type="number" />
	</fieldset>
	<br/>
	<input type= "submit" value="Submit Answers" onclick="FormValidate();" /> 
	<input type= "reset" value="Reset Quiz"/>
	
	</form>
	</div>
	
</section>

	
	

<!-- Start Footer-->
<?php include_once 'Footer.inc'?>
<!-- End footer--> 
<!-- End Container-->
</body>
</html>