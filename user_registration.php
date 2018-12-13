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

$newuser = true;
if(isset($_POST['username']) and isset($_POST['password'])){
    $username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
    $password = hash('sha256',$_POST['password']);
}
else{
    $newuser = false;
    echo "please create password and username";
}

$sql1 = "select * from logins where username ='".$username."'";
$result1= $conn->query($sql1); 
if ($result1->num_rows > 0){
	$newuser = false;
    echo "User already exists";
}

if($newuser = true){
    $sql2 = "insert into logins (username,hash) values('".$username."','".$password."')";
    $result2 = $conn->query($sql2);

}
$conn->close();
?> 