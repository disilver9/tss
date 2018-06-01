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
      
      $yummy = json_decode($eqpparams);

        
      
	  $eqp_name = test_input($_POST["item_name"]);
	  $item_type = test_input($_POST["item_type"]);
	  $item_location = test_input($_POST["item_location"]);
	  $item_user = test_input($_POST["item_user"]);

	

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



$sql = "INSERT INTO inventory (item_name,item_type,item_status,item_location,item_serialno,last_updated_by)
VALUES ( '$eqp_name','$item_type', 'Retrieved','$item_location','$item_serialno','$item_user')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>              
              
              
              
              
              
              