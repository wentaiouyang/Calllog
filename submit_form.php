<?php 

$host = 'localhost';  
$user = 'root';  
$pass = 'root';  
$dbname = 'CallLog';  

$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  




$id = $_POST["callid"];
$date = $_POST["date"];
$itperson = $_POST["itperson"];
$username = $_POST["username"];
$subject = $_POST["subject"];
$details = $_POST["details"];
$totalhours = $_POST["totalhours"];
$totalminutes = $_POST["totalminutes"];
$status = $_POST["status"];

$sql = "INSERT INTO details (callid, date, itperson, username, subject, details, totalhours, totalminutes,status) VALUES ($id, $date, '$itperson','$username','$subject','$details',$totalhours,$totalminutes,'$status')";


if(mysqli_query($conn, $sql)){
    echo "Record insert success";
}

?>


