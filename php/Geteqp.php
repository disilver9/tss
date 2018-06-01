<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
          function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
      }
      
      $yummy = json_decode($geteqpparams);

        
      
	  $loan_id = test_input($_POST["loan_id"]);
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tSupport";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT * FROM setEquip where loan_id='$loan_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $stuff=array();
        
    for ($x = 0; $x < $result->num_rows ; $x++) {
        $stuff[$x]=$result->fetch_array(MYSQL_ASSOC);
    }
    
   
  $myJSON = json_encode($stuff);
  echo $myJSON;

 
} else {
    echo "0 $result->fetch_array(MYSQLI_ASSOC)results";
}
$conn->close();
?>             
              
              
              
              
              
              