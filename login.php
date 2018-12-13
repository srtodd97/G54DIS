<?php
$servername = "mysql.cs.nott.ac.uk";
$username = "mbyst4_stu_db";
$password = "password";
$dbname = "mbyst4_stu_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['username']) and isset($_POST['password'])){
    $username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
    $password = hash('sha256',$_POST['password']);
}
else{
    $validation = false;
    echo "please create a username and password";
}
$sql1 = "select * from logins where username ='".$username."'and hash ='".$password."'";
$result1= $conn->query($sql1); 
if ($result1->num_rows > 0){
	$validation = true;
}
else{
    $validation = false;
}
if($validation = true){
    echo $username." you have successfully logged in";
}
else{
    echo "Please enter correct log in details";
}
$conn->close();
?> 