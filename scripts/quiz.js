/**
* Author: Lakshmi Saketh
* Target:qUIZ.HTML, result.html
*Purpose: Validations
*Created: 04/20/2018
*Last updated:04/25/2018
*Credits:
*/

"use strict"; // prevents creation of global variables
//Show the Quiz Div Tag
var count;
function showQuizDiv()
{
   document.getElementById('Quiz').style.display = "block";
   
}

//Show the changeButton Text
function changeButtonText() 
{
document.getElementById("QuizButton").value="Quiz Started";
}


//validate student FirstName
function sFirstName_validation()
{
	
	var pattern = /^[A-z]+$/;
if(document.getElementById("givenname").value=="" )
{
alert("First Name is Blank");
return false;
}
else if(document.getElementById("givenname").value.match(pattern))
{
return true;
}
else
{
alert("Please enter proper name Eg:Lakshmi");
return false;
}
}

//validate student FamilyName
function sLastName_validation()
{
var result = document.getElementById("familyname").value;
var pattern = /^[A-z]+$/;
if(document.getElementById("familyname").value=="" )
{
alert("Family Name is Empty");
return false;
}
else if(document.getElementById("familyname").value.match(pattern))
{
return true;

}
else
{
alert("Enter proper Family Name eg:Saketh");
return false;
}
}


//Validate StudentID
function sID_validation()
{
	var result = document.getElementById("studentid").value;
	var pattern = /\d{7,10}/;
if(document.getElementById("studentid").value=="" )
{

alert("ID is empty");
return false;
}
else if(result.match(pattern))
{
return true;
}
else
{
	alert(result);
alert("Enter proper ID eg: 101734217");
return false;
}
}

//Test Form
function TestStudent()
{
	
if(sID_validation() && sFirstName_validation() && sLastName_validation() && check())
{

showQuizDiv();//Show Quiz Div
changeButtonText();//Change the Text
}
}
//Part1 Done

//Part2 Quiz Calculations


//Test Form
function FormValidate()
{

if(ques1() && ques2() && ques3() && ques4() && ques5())
{

alert("all are answered");
var result=Marking();//get Marking
if(result==0)
{
	//document.getElementById("quizForm").reset();
	alert("Sorry you scored Zero Please write again");
	document.Test.reset();
}
else 
{
	alert(result);
	Storage(result);
	
}
}
}


//Ques 1 Validation
function ques1()
{
   if(document.getElementById('true').checked || document.getElementById('false').checked)
   {
	   return true;
   }
   else 
   {
	   alert("please Answer Question 1")
	   return false;
   } 
}

//Ques 2 Validation
function ques2()
{
   if(document.getElementById('onreadystatechange').checked  || document.getElementById('readyState').checked || document.getElementById('Status').checked || document.getElementById('reload').checked || document.getElementById('WebPage').checked)
   {
	   return true;
   }
   else 
   {
	   alert("Please Answer Question 2");
	   return false;
   }
}

//Ques 3 Validation
function ques3()
{
	var value=document.getElementById("ques3").value;
   if(value=="")
   {
	   alert("Please Answer Question 3");
	   return false;
   }
   else 
   {
	   return true;
   } 
}

//Ques 4 Validation
function ques4()
{
	var value=document.getElementById("ques4").value;
   if(value=="")
   {
	   alert("Please Answer Question 4");
	   return false;
   }
   else 
   {
	   return true;
   } 
}

//Ques 5 Validation
function ques5()
{
	var value=document.getElementById("ques5").value;
   if(value=="")
   {
	   alert("Please Answer Question 5");
	   return false;
   }
   else if( value < 190 || value > 200)//checks the range 
   {
	   alert("please enter values between 190 and 200");
	   return false;
   } 
   else
   {
	   return true;
   }
}

//Marking Section
var Marking=function()
{
	var x=0;
	
	if(document.getElementById('true').checked)
	{
		x=x+2;//add value 2 to x if ques is correct
	}
	if(document.getElementById('onreadystatechange').checked && document.getElementById('readyState').checked)
	{
		x=x+2;
	}
	if(document.getElementById('ques3').value=="ResponseXml")
	{
		x=x+2;
	}
	
	if(document.getElementById('ques4').value=="identification of IP")
	{
		x=x+2;
	}
	if(document.getElementById('ques5').value==200)
	{
		x=x+2;
	}
	return x;
}

//Storage values
 function Storage(result)
{
	count=0;
	var SID=document.getElementById("studentid").value,
		familyName=document.getElementById("familyname").value,
		givenName=document.getElementById("givenname").value
	localStorage.setItem('SID',SID);
	localStorage.setItem('familyName',familyName);
	localStorage.setItem('givenName',givenName);
	localStorage.setItem('Score',result);
	 if (localStorage.clickcount) {
            localStorage.clickcount = Number(localStorage.clickcount)+1;
        } else {
            localStorage.clickcount = 1;
        }
		var count=localStorage.clickcount;
		localStorage.setItem(SID,count);
}


//post values to result page
function postResult()
{
	

	document.getElementById("ResultID").textContent =localStorage.SID;
	document.getElementById("ResultName").textContent = localStorage.givenName + " " + localStorage.familyName;
	document.getElementById("ResultMark").textContent = localStorage.Score;
	document.getElementById("ResultAttempt").textContent = localStorage.clickcount;
	
}
//check the values in the html and verifies the attempts
function check()
{
	 var count=localStorage.clickcount;
	if(count>=3)
	{
		alert("3 attempts completed");
		return false;
	}
	else 
	{
		
		return true;
	}
}
function init(){

	postResult();
stepProgress();
}
//visitPage
 function visitpage()
 {
        window.location.href='quiz.html';
		}
window.onload=init;

//ProgressBar
function stepProgress() {
	var progress_element = document.getElementById('progress_bar'),
	Result=localStorage.Score;
	
  progress_element.value += 1;
  if(progress_element.value <=(Result*10) ) {
    setTimeout(stepProgress, 100);
  }
};

