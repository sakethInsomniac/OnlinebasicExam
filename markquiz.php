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
<!-- Start Banner--> 
<div class="bancontain">
		<div id="ban" class="pw">
				<ul><li><img src="images/result.jpg" alt="Server flow Image" /></li></ul>
		</div>
</div>

<section id="container">
		<div class="pw">
		<h2> Quiz Result:</h2> <br/>
		
		<?php
	//Using setting page for database credentials 
	require_once("settings.php");
  
  //initializing value
    $datetime = date("y-m-d h:i:s");
	$points = 0;
  
  	//Sanitizing input function	
	function sanitise_input($data) {
	$data =trim($data);
	$data =stripslashes($data);
	$data =htmlspecialchars($data);
	return $data;
	}
		//sanitize first name
	if(isset($_POST["familyname"])){
      $familyname = $_POST["familyname"];
	  $familyname = sanitise_input($familyname);
	} else {
	  echo "<p><em>Error: Please Rectify in the <a href=\"quiz.php\">form</a></em></p>";
	}
    	//sanitize last name
	if(isset($_POST["givenname"])){
      $givenname = $_POST["givenname"];
	  $givenname = sanitise_input($givenname); 	
	} else {
      echo "<p><em>Error:Please Rectify in the <a href=\"quiz.php\">form</a></em></p>";
	}
		//sanitize student id
	if(isset($_POST["studentid"])){
      $studentid = $_POST["studentid"];
	  $studentid = sanitise_input($studentid); 	
	} else {
      echo "<p><em>Error: Please Rectify in the <a href=\"quiz.php\">form</a></em></p>";
	}
	
	//Validation of first, last and student id
	$errMsg = "";
	if(($familyname||$givenname) == ""){
		$errMsg .= "<p>you must enter your name</p>";
	}
	else if ((!preg_match("/^[a-zA-Z]*$/",$familyname))||(!preg_match("/^[a-zA-Z]*$/",$givenname))){
	$errMsg .= "<p>Please type only alphabets eg: Lakshmi</p>";
	}
  
	if($studentid == ""){
		$errMsg .= "<p>Please type the student ID</p>";
	}
	else if (!preg_match("/\d[0-9]{7,10}/",$studentid)){
	$errMsg .= "<p>Enter ID between 7-10 numbers eg:101734216</p>";
	}
	
	if($errMsg != ""){
		echo"<p>$errMsg</p>";
		exit;
	}
  
	//function for marking quiz
	function calculatepoints($points){
		//Defining variables
		$answer1 = "";
		$answer2 = "";
		$answer3 = "";
		$answer4 = "";
		$answer5 = "";
		//creating array of correct solution for comparing
		$solution = array("true","Onreadystatechange","readyState","ResponseXml","UniformResourceLocator",200);
		$Msg = "";
		//Question 1 answer check
		if(isset($_POST["ques1"])&& !empty($_POST["ques1"])) {
			$answer1 = $_POST["ques1"];
		} else {
			$Msg .= "<p>Select answer for the Question1</p>";
		}
		echo $answer1;
		if ($answer1 == $solution[0]){
		$points += 2; 
		}
		
		//Question 2 answer check
		$checkedValue = "";
		if(isset($_POST["category"])&&!empty($_POST["category"]))
		{
			foreach($_POST['category'] as $selected)
			{
				$checkedValue .= $selected.",";
				
			}
			$arrayList = explode(",",$checkedValue);
			$len = count($arrayList) - 1;
			if(!($len > 2 )){
				if($arrayList[0] == $solution[1] && $arrayList[1] == $solution[2]){
					echo $arrayList[0];
					echo $arrayList[1];
					$points += 2;
				}
			}
		} else {
			$Msg .= "<p>Please Select the Answer for the Question 2</p>";
		}
		
		//Question 3 answer check
		if(isset($_POST["ques4"]) && !empty($_POST["ques4"])){
			$answer3 = $_POST["ques4"];
			$answer3 = sanitise_input($_POST["ques4"]);
		} else {
			$Msg .= "<p>Please select the answer for Question number 3</p>";
		}
		echo $answer3;
		if($answer3 == $solution[4]){
			
		$points += 2; 
		}
		
		//Question 4 answer check
		if(isset($_POST["ques3"])&& !empty($_POST["ques3"])) {
			$answer4 = $_POST["ques3"];
			$answer4 = sanitise_input($_POST["ques3"]);
		} else {
			$Msg .= "<p>Please select the answer for Question number 3</p>";
		}
		echo $answer4;
		if($answer4 == $solution[3]){
			
		$points += 2; 
		}
		
		//Question 5 answer check
		if(isset($_POST["floatingpoint"])&& !empty($_POST["floatingpoint"])) {
			$answer5 = $_POST["floatingpoint"];
			$answer5 = sanitise_input($_POST["floatingpoint"]);
		} else {
			$Msg .= "<p>Please enter the question 5</p>";
		}
		echo $answer5;
		if($answer5 == $solution[5]){
		$points += 2; 
		}
		
		if($Msg != ""){
			echo"<p>$Msg</p>";
			exit;
		}
		
		if($points == 0){
			echo"<p>Your Score is Zero please try again </p>";
			exit;
		}
		
		return $points;
	}
  
  
  //connecting database
  $conn = @mysqli_connect($host,
	$user,
	$pwd,
	$sql_db
	);

  if(!$conn) {
		echo"<p>Database connection failure</p>";
	} else { 
	
	//Verifying and creating table
	$tableCreateQuery = "create TABLE IF NOT EXISTS QuizAttempt(
   AttemptID INT NOT NUll AUTO_INCREMENT PRIMARY KEY
   ,DT DATETIME
   ,FirstName VARCHAR(25) NOT NULL
   ,LastName VARCHAR(25) NOT NULL
   ,StudentID INT NOT NULL
   ,Attempt INT NOT NULL
   ,Score INT NOT NULL
	)";
	
	if (mysqli_query($conn, $tableCreateQuery)) {
	} 
	
	else {
		echo "Creation Failed due to: " . mysqli_error($conn);
	}
	
	$sql_table = "QuizAttempt";
	
	//checking if attempt is less than 3

		$validateAttempt = mysqli_query($conn,"select count(*) as count from QuizAttempt where StudentID=$studentid");
		$attemptcheck = "";
		$row = mysqli_fetch_assoc($validateAttempt);
		$attemptcheck = $row['count'];
		echo $attemptcheck;
	if($attemptcheck >= 3)
	{
		echo "<p>You already have done 3 attempts</p>";
		exit;
	}
	else {
		//function to calculate marks
		$points = calculatepoints($points);
		//calculating the attempt value
		$validateAttempt = mysqli_query($conn,"select count(*) as count from QuizAttempt where StudentID=$studentid");
		$attemptcheck2 = "";
		$row = mysqli_fetch_assoc($validateAttempt);
		$attemptcheck2 = $row['count'];
		echo $attemptcheck2;
		$attemptcheck2 = $attemptcheck2 + 1;
		//inserting to database
		$insertQuery = "insert into $sql_table(DT, FirstName, LastName, StudentID,Attempt,Score) values('$datetime','$familyname','$givenname',$studentid,$attemptcheck2,$points)";
		$result = mysqli_query($conn,$insertQuery);
		if(!$result) 
		{
		echo"<p>Insert query failed please try again ", $insertQuery, "</p>";
		} else {
		echo "<table border=\"1\">\n";
		echo "<tr>\n "
		."<th scope=\"col\">Student Id</th>\n "
		."<th scope=\"col\">First Name</th>\n "
		."<th scope=\"col\">Last Name</th>\n "
		."<th scope=\"col\">points</th>\n "
		."<th scope=\"col\">Number of Attempt</th>\n "
		."</tr>\n ";
		echo "<tr>\n ";
		echo "<td>",$studentid,"</td>\n ";
		echo "<td>",$familyname,"</td>\n ";
		echo "<td>",$givenname,"</td>\n ";
		echo "<td>",$points,"</td>\n ";
		echo "<td>",$attemptcheck2,"</td>\n ";
		echo "</tr>\n ";
		echo "</table>\n\n\n";
		
		if($attemptcheck2 >= 3){
			echo"<a href='quiz.php' style='display:none'>Re-Attempt</a>";
		}
		else {
			echo"<a href='quiz.php' style='display:inline'>Re-Attempt</a>";
		}
		} 
		
	}
	
	mysqli_close($conn);
  }

?>
 
 </div>
 </section>
 

<!-- Start Footer-->
<?php include_once 'Footer.inc'?>
<!-- End footer--> 
<!-- End Container-->
</body>
</html>