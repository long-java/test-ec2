<?php

echo 'Thanh cong roi nhe 3'; die;

$servername = "mysql_db";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br>";

$sql = "SELECT * FROM docker1.invoice";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Number: " . $row["number"] . "<br>";
  }
} else {
  echo "<br>" . "0 results";
}
$conn->close();

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
var_dump(mail("someone@example.com","My subject",$msg));





?>