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

        
      
	  $eqp_id = test_input($_POST["eqp_id"]);

	

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



$sql = "DELETE FROM setEquip WHERE id='$eqp_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>              
              
              
              
              
              
              