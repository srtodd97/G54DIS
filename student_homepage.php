
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<head>
<link rel="stylesheet" type="text/css" href="mainpage_stylesheet.css">
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
  <div class="text">My Student Homepage</div><div class="image"><img src="logo_transparent.png" height="200" width="200"></div> 
</div>

<div class="topnav">
  <a class="active" href="#"><i class="fas fa-home"></i> Home</a>
  
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
        <a href="#">My Degree Award</a>
        <a href="#">My Assessments</a> 
        <a href="#">My Surveys</a>
    </div>
  </div>
  
  <div class="dropdown">   
    <a class="dropbtn"><i class="fas fa-user"></i> My Details
      <i class="fas fa-caret-down"></i></a>
    <div class="dropdown-content">
        <form action="details.php" method="POST">
        <fieldset>
            <legend>Search</legend>
            ID:
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
    </div>
  </div>
  
  <button id="logout"><a href="logout.php">Log Out</a></button>
</div>

<div class="topnav">
  <button class="openbtn" onclick="openNav()">☰ Toggle Sidepanel</button> 
  <div id="SidePanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="https://email.nottingham.ac.uk/">University email</a>
    <a href="https://nusearch.nottingham.ac.uk/">NUSearch</a>
    <a href="https://www.nottingham.ac.uk/contact/useful-contacts.aspx">Useful Contacts</a>
    <a href="https://www.nottingham.ac.uk/academicservices/staffinformation/curriculum-management/catalogue-links.aspx">Module Catalogues</a>
  </div>
</div>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="index page elements/trent_building.jpg" style="width:100%">
  <div class="text">Trent Building</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="index page elements/sustainable_lab.jpg" style="width:100%">
  <div class="text">GSK Carbon Neutral Laboratory for Sustainable Chemistry</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="index page elements/jubilee_campus.jpg" style="width:100%">
  <div class="text">Jubilee Campus</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>



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