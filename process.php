<?php
// 1. Connection details
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "patient_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 2. Collect data from your HTML form 
$user = $_POST['userID'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // 
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$ssn = $_POST['ssn'];

// 3. Prepare the SQL statement to insert the data
$sql = "INSERT INTO patients (userID, password, firstName, lastName, email, ssn)
VALUES ('$user', '$pass', '$fname', '$lname', '$email', '$ssn')";

if ($conn->query($sql) === TRUE) {
  // If successful, send them to your Thank You page
  header("Location: homework4thankyou.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
