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
		<h2> Details:</h2> <br/>
		
		<?php
	require_once("settings.php");
	//sanitise input
	function sanitise_input($data) {
	$data =trim($data);
	$data =stripslashes($data);
	$data =htmlspecialchars($data);
	return $data;
	}
	//Variables set for null initialized
	$errMsg = "";
	$studentID = "";
	$deleteStudent = "";
	$updateStudent = "";
	$firstname = "";
	$lastname = "";
	$hundred = "";
	$fifty = "";
	//Database connection set
	$conn = @mysqli_connect($host,
	$user,
	$pwd,
	$sql_db
	);
	
	if(!$conn) {
		echo"<p>Failed to connect with DB</p>";
	} else {
	
	$sql_table = "QuizAttempt";

	//Query based on student ID
	if(isset($_POST["studentID"])&& !empty($_POST["studentID"])){
		$studentID = sanitise_input($_POST["studentID"]);
		
		$detailsQuery = "select StudentID,Score,Attempt from QuizAttempt where StudentID=$studentID";
		$result = mysqli_query($conn, $detailsQuery);
		if(!$result) {
		echo"<p>something is wrong ", $detailsQuery, "</p>";
		} else {
		echo "Query 1";
		echo "<table border=\"1\">\n";
		echo "<tr>\n "
		."<th scope=\"col\">studentID</th>\n "
		."<th scope=\"col\">score</th>\n "
		."<th scope=\"col\">Attempt Number</th>\n "
		."</tr>\n ";
		
		while($row = mysqli_fetch_assoc($result))
		{
		echo "<tr>\n ";
		echo "<td>",$row["StudentID"],"</td>\n ";
		echo "<td>",$row["Score"],"</td>\n ";
		echo "<td>",$row["Attempt"],"</td>\n ";
		echo "</tr>\n\n\n\n";
		}
		}
	}else {
		$errMsg .= "<p>Please provide proper student ID</p>";
	}	
		
		//Query based on name
		if((isset($_POST["firstname"])&& !empty($_POST["firstname"])) && (isset($_POST["lastname"])&& !empty($_POST["lastname"]))){
		$firstname = sanitise_input($_POST["firstname"]);
		$lastname = sanitise_input($_POST["lastname"]);
		
		$detailsQuery = "select FirstName,LastName,Score,Attempt from QuizAttempt where LastName='$lastname' AND FirstName='$firstname'";
		$result = mysqli_Query($conn, $detailsQuery);
		if(!$result) {
		echo"<p>Error Happend with this  ", $detailsQuery, "</p>";
		} else {
			echo "Query 2";
		echo "<table border=\"1\">\n";
		echo "<tr>\n "
		."<th scope=\"col\">FirstName</th>\n "
		."<th scope=\"col\">LastName</th>\n "
		."<th scope=\"col\">Score</th>\n "
		."<th scope=\"col\">Attempt Number</th>\n "
		."</tr>\n ";
		
		while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>\n ";
		echo "<td>",$row["FirstName"],"</td>\n ";
		echo "<td>",$row["LastName"],"</td>\n ";
		echo "<td>",$row["Score"],"</td>\n ";
		echo "<td>",$row["Attempt"],"</td>\n ";
		echo "</tr>\n\n\n\n";
		 }
		} 
		
		}else 
		{
		$errMsg .= "<p>Please provide the details properly</p>";
		}	
		
		//detailsQuery for all students having 100% in first attempts
		if(isset($_POST["hundred"])&& !empty($_POST["hundred"])){
		
		$detailsQuery = "select StudentID,FirstName,LastName from QuizAttempt where Score=10 AND Attempt=1";
		$result = mysqli_Query($conn, $detailsQuery);
		if(!$result) {
		echo"<p>Error Ocurred: ", $detailsQuery, "</p>";
		} else {
			echo "Query 3";
		echo "<table border=\"1\">\n";
		echo "<tr>\n "
		."<th scope=\"col\">StudentID</th>\n "
		."<th scope=\"col\">Firstname</th>\n "
		."<th scope=\"col\">Lastname</th>\n "
		."</tr>\n ";
		
		while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>\n ";
		echo "<td>",$row["StudentID"],"</td>\n ";
		echo "<td>",$row["FirstName"],"</td>\n ";
		echo "<td>",$row["LastName"],"</td>\n ";
		echo "</tr>\n\n\n\n";
		 }
		}
		}else {
			$errMsg .= "<p>Select any radio button</p>";
		}	
		
		//detailsQuery for all students having less 50% in third attempts
		if(isset($_POST["fifty"])&& !empty($_POST["fifty"])){
		
		$detailsQuery = "select StudentID,FirstName,LastName from QuizAttempt where Score<5 AND Attempt=3";
		$result = mysqli_Query($conn, $detailsQuery);
		if(!$result) {
		echo"<p>Error Occured:", $detailsQuery, "</p>";
		} else {
			echo "Query 3";
		echo "<table border=\"1\">\n";
		echo "<tr>\n "
		."<th scope=\"col\">studentID</th>\n "
		."<th scope=\"col\">firstname</th>\n "
		."<th scope=\"col\">lastname</th>\n "
		."</tr>\n ";
		
		while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>\n ";
		echo "<td>",$row["StudentID"],"</td>\n ";
		echo "<td>",$row["FirstName"],"</td>\n ";
		echo "<td>",$row["LastName"],"</td>\n ";
		echo "</tr>\n\n\n\n";
		 }
		}
		}else {
			$errMsg .= "<p>Select any radio button</p>";
		}	
		
		//Query to delete student exam data
		if(isset($_POST["deleteStudent"])&& !empty($_POST["deleteStudent"])){
		$deleteStudent = sanitise_input($_POST["deleteStudent"]);
		$detailsQuery = "delete from QuizAttempt where StudentID=$deleteStudent";
		$result = mysqli_Query($conn, $detailsQuery);
			if(!$result) {
				echo "Query 4";
			echo"<p >ErrorOccured: ", $detailsQuery, "</p>";
			} else {
			echo"<p>Deleted Successfully</p>";
			 }
		}
		else {
			$errMsg .= "<p>Please type the ID properly</p>";
		}

		//Update for attempt
		if(isset($_POST["updatestudent"])&& !empty($_POST["updatestudent"])){
		$updateStudent = sanitise_input($_POST["updatestudent"]);
		$detailsQuery = "Update QuizAttempt set Score=10 where StudentID=$updateStudent AND Attempt=1";
		$result = mysqli_Query($conn, $detailsQuery);
			if(!$result) {
				echo "Query 5";
			echo"<p>something is wrong ", $detailsQuery, "</p>";
			} else {
			echo"<p>Update Successful</p>";
			 }
		}
		else {
			$errMsg .= "<p>Enter details</p>";
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