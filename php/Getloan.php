<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// if ($_SERVER["REQUEST_METHOD"] == "POST")
//     {
//           function test_input($data) {
//                 $data = trim($data);
//                 $data = stripslashes($data);
//                 $data = htmlspecialchars($data);
//                 return $data;
//               }
//       }
      
//       $yummy = json_decode($repositoryparams);

//         echo $yummy->email; //donut
      
// 	  $repository_name = test_input($_POST["repository_name"]);
// 	  $repository_description = test_input($_POST["repository_description"]);
// 	  $visibility = test_input($_POST["visibility"]);


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



$sql = "SELECT * FROM loan where loan_status='Ongoing'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $stuff=array();
        
    for ($x = 0; $x < $result->num_rows ; $x++) {
        $stuff[$x]=$result->fetch_array(MYSQL_ASSOC);
    }
    
//      echo $result->num_rows;
//       while($row = $result->fetch_array(MYSQL_NUM)) {
//         foreach
//   }
    
    
    
    // output data of each row
//     echo count($result->fetch_array());
   
  $myJSON = json_encode($stuff);
  echo $myJSON;

 
} else {
    echo "0 $result->fetch_array(MYSQLI_ASSOC)results";
}
$conn->close();
?>              