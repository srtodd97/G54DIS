<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

<head>
    
    <meta charset="utf-8" />
    <link href="mainpage_stylesheet.css" rel="stylesheet"
 	  type="text/css" />
    <style>
	table, th, td {
	    border: 1px solid black;
	}
 
	    table.MsoTableGrid {
 		border: solid windowtext 1.0pt;
 		font-size: 11.0pt;
 		font-family: "Calibri",sans-serif;
 	    }
 	p.MsoNormal {
 	    margin-top: 0cm;
	    margin-right: 0cm;
 	    margin-bottom: 8.0pt;
 	    margin-left: 0cm;
 	    line-height: 107%;
 	    font-size: 11.0pt;
 	    font-family: "Calibri",sans-serif;
 	}
	.auto-style1 {
 	    width: 406px;
 	}
    </style>
    
    <title>My Modules</title>
</head>
<body>

<?php
$servername = "mysql.cs.nott.ac.uk";
$username = "mbyst4_stu_db";
$password = "password";
$dbname = "mbyst4_stu_db";

    // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>

<div class="header">
  <div class="text">My Modules</div><div class="image"><img id="logo" src="logo_transparent.png" height="200" width="200"></div> 
</div>

<div class="topnav">
	<a class="active" href="student_homepage.php"><i class="fas fa-home"></i> Home</a>
  
	<div class="dropdown">
		<a class="dropbtn"><i class="fas fa-chalkboard"></i> My Teaching
		<i class="fas fa-caret-down"></i></a> 
		<div class="dropdown-content">
			<a href="module_info.php">My Modules</a>
			<a href="#">My Module Enrollment</a>
			<a href="#">My Lecturers</a>
			<a href"#">My Timetable</a>
		</div>
	</div>
  
	<div class="dropdown">
		<a class="dropbtn"><i class="fas fa-graduation-cap"></i> My Degree Progress
		<i class="fas fa-caret-down"></i></a>
		<div class="dropdown-content">
			<a href="#">My Grades</a>
			<a href="#">My Degree Award</a>
			<a href="#">My Assessments</a> 
		</div>
	</div>

	<button id="logout">Log Out</button>
</div>


<div class="topnav">
  <button class="openbtn" onclick="openNav()">☰ Useful Links</button> 
    <div class id="SidePanel" class="sidepanel">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="https://email.nottingham.ac.uk/">University email</a>
      <a href="https://nusearch.nottingham.ac.uk/">NUSearch</a>
      <a href="https://www.nottingham.ac.uk/contact/useful-contacts.aspx">Useful Contacts</a>
      <a href="https://www.nottingham.ac.uk/academicservices/staffinformation/curriculum-management/catalogue-links.aspx">Module Catalogues</a>
    </div>
</div>

 <form action="details.php" method="POST">
        <fieldset>
            <legend>Search</legend>
             Student ID:
            <input type="text" name="Student_ID"/>
            <input type="submit" value="Search"/> <br />
        </fieldset>
    </form>

    <fieldset>
        <legend>Details</legend>
<?php


$stu_id = $_POST['Student_ID'];


$sql = "SELECT * FROM Student where Student_ID ='".$stu_id."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"]. "<br>";
        echo "ID: " . $row["Student_ID"]. "<br>";
        echo "Year: " . $row["Year_of_study"]. "<br>";
        
    }
} else {
    echo "No results";
}
?>

    </fieldset>

    <fieldset>
        <legend>Current Modules</legend>


<?php 

$sql2 = "SELECT Mod_ID FROM Enrollment where Stu_ID ='".$stu_id."'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {

    while($row = $result2->fetch_assoc()) {
        $mod_id = $row["Mod_ID"];
		
    }
} else {
    echo "No results";

}
?>

<?php

$sql3 = "SELECT * FROM Module where Module_ID = '".$mod_id."'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
   
   while($row = $result3->fetch_assoc()) {
       echo "Module Name: " . $row["Module_name"]. "<br>";
	  
   }

} 
?>


	</fieldset>

<script>
function openNav() {
 document.getElementById("SidePanel").style.width = "250px";
}

function closeNav() {
 document.getElementById("SidePanel").style.width = "0";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>