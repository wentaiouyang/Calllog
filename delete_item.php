<?php

$data = json_decode(file_get_contents('php://input'));

$id=$data->id;
$host = 'localhost';  
$user = 'root';  
$pass = 'root';  
$dbname = 'CallLog';  

$conn = mysqli_connect($host, $user, $pass,$dbname);  

$sql = "delete from details where callid=$id"; 
if(mysqli_query($conn, $sql)){  
  echo "Record deleted successfully";  
 }else{  
 echo "Could not deleted record: ". mysqli_error($conn);  
 } 
 
 

?>