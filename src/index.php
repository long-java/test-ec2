<?php

echo 1000;


/* Địa chỉ SQL Server */
$serverName = "database-1.c6vf61rj3op3.us-east-1.rds.amazonaws.com,1433";
/* Tài khoản kết nối */
$uid = 'sa';
$pwd = 'JWF1BDjEhaEY1laxYcLD';
$database = 'rdsadmin';

// Tạo kết nối
try {  
    // Chú ý thông tin kết nối bắt đầu bởi sqlsrv: cho biết PDO dùng driver PDO_SQLSRV
    $conn = new PDO( "sqlsrv:server=$serverName;Database = $database", $uid, $pwd);   
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );   
 }  

 catch( PDOException $e ) {  
    die( "Lỗi kết nối MS SQL Server: " . $e->getMessage());   
 }   

/* Thực hiện truy vấn dữ liệu, lấy 5 dòng đầu tiên của bảng Sanpham */
$number_row = 5;
/* Viết câu truy vấn, có tham số :number_row */
$tsql = "SELECT TOP(:number_row) TenSanpham, Gia FROM Sanpham";
$stmt = $conn->prepare($tsql);
/* Truyền tham số */
$stmt->bindParam(':number_row', $number_row, PDO::PARAM_INT);
/* Chạy câu truy vấn, trả về  PDOStatement */
$stmt->execute();
/* Đọc các dòng thông tin. */
$rows = [];
while($row = $stmt->fetch(SQLSRV_FETCH_ASSOC))
{
    $rows[] = $row;
}
print_r($rows);

$stmt = null;       // Giải phóng tài nguyên câu truy vấn
$conn = null;      // Giải phóng, ngắt kết nối SQL Server


die;

// $servername = "mysql_db";
// $username = "root";
// $password = "root";

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
// echo "<br>";

// $sql = "SELECT * FROM docker1.invoice";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Number: " . $row["number"] . "<br>";
//   }
// } else {
//   echo "<br>" . "0 results";
// }
// $conn->close();

// // the message
// $msg = "First line of text\nSecond line of text";

// // use wordwrap() if lines are longer than 70 characters
// $msg = wordwrap($msg,70);

// // send email
// var_dump(mail("someone@example.com","My subject",$msg));





?>