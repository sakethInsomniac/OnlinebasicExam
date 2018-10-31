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
		
				<h2> Introduction</h2>
<p>The XMLHTTPRequest is the advanced technology which provides key to the ajax, it is available in the internet from many years and the origin of this technology is in the year 2000.
  The XmlHttpRequest became popular in 2005 by the discovery of AJAX. It is an API, we can use it by JS, 
  Jscript and VBScript and other browser scripting languages to process the XML data that is obtained from the web servers using HTTP, 
  this helps to create an independent connection between the client and server-side. The data attained by the XmlHttpRequests are from the backend databases. 
  This usually fetch the data in the form of JSON format or in plain text. The HTTP and HTTPS request helps the XmlHttpRequest to initialize the object by accessing the Open Methods.
  This is used to validate and process the data inputs from the sources. URL and URI data is used for the initialization of the request. This can accept
  5 parameters but 2 are enough to create or initialize a request. Please find methods below:</p>
  <ul>
		<li>PUT</li>
		<li>DELETE</li>
		<li>OPTIONS</li>
		<li>GET</li>
		<li>POST</li>
		<li>HEAD</li>
		
	</ul>


				<h2> Advantages of XMLHttpRequest </h2>
<ul>
		<li>It reduces server traffic with its speed response, it reduces the time consuming on the both sides</li>
		<li>XmlHttpRequest is really fast and it helps to complete task very easily.</li>
		<li>It saves the band width, it will not reload the page completely.</li>
		<li>We can make the asynchronous call to the web server</li>
	</ul>
	





				<h2>DisAdvantages of XMLHttpRequest</h2>
<ol>
  <li> The IE5 has enabled the requests of ActiveX  </li>
  <li> The XmlHttpRequests is available only available in latest versions of the safari</li>
  <li>There is differences of implementations of the browsers</li>
</ol> 
	
	<aside>
<h2> Relative Technologies :</h2>	 <br/>
<p>The XmlHttpRequest is used to interact with the servers, here using this we can refresh the page without reloading it completely. 
This client side interactions are mostly used to done the tasks using the Ajax programming. 
Apart from the name of XmlHttpRequest it always used to extract any kind of data apart from xml format. It supports all type of protocols like HTTP,File and FTP. 
If we are using the serverside interaction then we have to use the event source interface 
this will help for the duplex communication and WebSockets may be the better choice for this </p>
</aside>
</section>

<!-- End Section1--> 

<!-- Start section1-->
<section id="container2">

	<h2> Advantages and Disadvantages of XMLHttpRequest :</h2>	 <br/>
<table id="xml">
  <tr>
    <th>Advantages</th>
    <th>Disadvantages</th>
  </tr>
  <tr>
    <td>It reduces server traffic with its speed response, it reduces the time consuming on the both sides</td>
    <td> The IE5 has enabled the requests of ActiveX</td>
    
  </tr>
  <tr>
    <td>XmlHttpRequest is really fast and it helps to complete task very easily</td>
    <td>The XmlHttpRequests is available only available in latest versions of the safari</td>
   
  </tr>
   <tr>
    <td>It saves the band width, it will not reload the page completely</td>
    <td>There is differences of implementations of the browsers</td>
   
  </tr>
  
</table>



<br/>
</section>

<!-- End Section2--> 
<!-- Start Footer-->
<?php include_once 'Footer.inc'?>
<!-- End footer--> 

</body>
<!-- End Body Section-->
</html>