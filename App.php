<?php include 'db_connect.php'?>
<?php include 'submit_form.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="http://cdn.suoluomei.com/common/js2.0/axios/axios.min.js"></script>
</head>
<style>
  .form {
    width:100%;
  }

  .title {
    color:blue;
    width:150px;
    display:inline-block;
  }

  .button_container {
    width: 100%;
 
  }

  .button {
    margin-top:20px;
    width: 200px;
    padding:5px;
    border-radius:10px;
  }

  .detail_box {
    background:#d1d1d1;
    padding:10px;
    margin-bottom:10px;
    border-radius:10px;
  }
</style>
<script>
  function handleDelete(id){
    axios.post("./delete_item.php",{
      id:id
    }),then((data)=>{
      window.reload()
    })
    
  }
</script>
<body>
  
  <!-- Call log input area -->
  <form class="form" action="app.php" method="post">
    <label class="title">Call ID</label>
    <input type="text" name="callid"><br/>
    <label class="title">Date</label>
    <input type="text" name="date"><br/>
    <label class="title">IT Person</label>
    <input type="text" name="itperson"><br/>
    <label class="title">Username</label>
    <input type="text" name="username"><br/>
    <label class="title">Subject</label>
    <input type="text" name="subject"><br/>
    <label class="title">Details</label>
    <input type="text" name="details"><br/>
    <label class="title">Total hours</label>
    <input type="text" name="totalhours"><br/>
    <label class="title">Total minutes</label>
    <input type="text" name="totalminutes"><br/>
    <label class="title">Status</label>
    <select name="status">
      <option value="new">New</option>
      <option value="in progress">In progress</option>
      <option value="new">Completed</option>
    </select>
    <br/>
    <div class="button_container">
      <button class="button" type='submit' >submit</button>
    </div>
  </form>


  <!-- Detail area -->
  <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "CallLog";
    
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("connect error: " . $conn->connect_error);
    } 
    
    $sql = "SELECT callid, date,details,totalhours FROM Details";
    $result = $conn->query($sql);

    function format_time($t,$f=':') // t = seconds, f = separator
    {
      return sprintf("%02d%s%02d", floor($t/3600), $f, floor($t/60)%60, $f);
    }


    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "
            <div class='detail_box'>
            <p>Call id: " . $row["callid"] ."</p>
            <p>Date: " . $row["date"] ."</p>
            <p>Detail: " . $row["details"] ."</p>
            <p>Time: " .format_time($row["totalhours"]*3600) ."</p>
            <button onclick='handleDelete(".$row["callid"].")'>Delete</button>
            </div>
            
            ";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>
</body>


</html>