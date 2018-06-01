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

        
      
	  $eqp_name = test_input($_POST["eqp_name"]);
	  $quantity = test_input($_POST["quantity"]);
	  $eqpdescription = test_input($_POST["eqpdescription"]);
	  $serialnum = test_input($_POST["serialnum"]);
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



$sql = "INSERT INTO setEquip (loan_id ,eqp_name,eqp_status, eqp_quantity, eqp_serialno, eqp_description)
VALUES ( '$loan_id','$eqp_name', 'In Use','$quantity','$serialnum','$eqpdescription')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>              
              
              
              
              
              
              