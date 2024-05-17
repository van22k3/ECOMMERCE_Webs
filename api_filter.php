<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'];
    
    // Khai báo câu truy vấn SQL cơ bản
    $sql = "SELECT * FROM products";

    // Kiểm tra và chỉnh sửa câu truy vấn nếu brand được chọn
    if (!empty($brand) && ($brand === 'Automatic' || $brand === 'Digital' || $brand === 'Vintage Insprite')) {
        $sql = "SELECT * FROM products WHERE brand = ?";
    }

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);

    // Nếu brand được chọn là 'Automatic', 'Digital' hoặc 'Vintage Insprite', bind giá trị cho placeholder
    if (!empty($brand) && ($brand === 'Automatic' || $brand === 'Digital' || $brand === 'Vintage Insprite')) {
        $stmt->bind_param('s', $brand);
    }

    // Thực thi câu truy vấn
    $stmt->execute();
    $result = $stmt->get_result();

    // Lặp qua các dòng kết quả và đưa vào mảng products
    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Trả về dữ liệu JSON
    echo json_encode($products);
}
?>
