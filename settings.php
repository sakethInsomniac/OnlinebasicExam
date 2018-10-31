<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Creating Web application"/>
<meta name="keywords" content="PHP, MySql"/>
<title> Retrieving records to HTML</title>
</head>

<body>

	<?php


	$host= "feenix-mariadb.swin.edu.au";
	$user="";
	$pwd="";
	$sql_db="";

	$conn = @mysqli_connect($host,
			$user,
			$pwd,
			$sql_db
		);

	
	?>