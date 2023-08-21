<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "ecommerce_db";

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Chuyển kết quả thành mảng JSON và trả về
$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($products);
?>
