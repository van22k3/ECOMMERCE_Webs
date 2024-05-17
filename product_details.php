<?php
require 'config.php';

// Kiểm tra xem có tham số id được truyền không
if (isset($_GET['id'])) {
    // Lấy id của sản phẩm từ tham số URL
    $product_id = $_GET['id'];

    // Truy vấn để lấy thông tin chi tiết của sản phẩm dựa trên id
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    // Kiểm tra xem có sản phẩm được tìm thấy không
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        // Hiển thị thông tin chi tiết của sản phẩm
        echo "<h1>" . $product['name'] . "</h1>";
        echo "<p>" . $product['detail'] . "</p>";
        echo "<p>Price: $" . $product['price'] . "</p>";
        // Hiển thị hình ảnh sản phẩm
        echo "<img src='" . $product['image'] . "' alt=''>";
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}
?>
