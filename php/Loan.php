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
      
      $yummy = json_decode($loanparams);

        
      
	  $asset_location = test_input($_POST["asset_location"]);
	  $asset_purpose = test_input($_POST["asset_purpose"]);
	  $asset_borrower = test_input($_POST["asset_borrower"]);
	  $asset_tsrSetup = test_input($_POST["asset_tsrSetup"]);
	

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



$sql = "INSERT INTO loan (loan_purpose ,loan_location,loan_borrower, loan_tsr_setup,loan_status)
VALUES ( '$asset_purpose','$asset_location','$asset_borrower','$asset_tsrSetup','Ongoing')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $sql1 = "UPDATE room SET room_status ='Occupied' WHERE room_name='$asset_location'";

            if ($conn->query($sql1) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>              
              
              
              
              
              
              