<?php
session_start(); // Bắt đầu session
require 'config.php';
$id;
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $conn = new mysqli('localhost', 'root', '', 'project_ecommerce');
    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // User is authenticated, display user information or dashboard
       
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    
    // Truy vấn thông tin sản phẩm từ bảng products
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result= $conn->query($sql);
    
    if($result->num_rows > 0){
        // Nếu sản phẩm tồn tại, lấy thông tin sản phẩm
        $product = $result->fetch_assoc();
        
        // Truy vấn và cập nhật cột cart_products JSON của người dùng
        $cart_query = mysqli_query($conn, "SELECT cart_products FROM users WHERE id = '$id'");//goi cart_products
        $cart_row = mysqli_fetch_assoc($cart_query);//lay du lieu tu cart
        $cart_json = json_decode($cart_row['cart_products'], true); // tạo array $cart_json =[];
        
        // Kiểm tra xem giỏ hàng có tồn tại không và không rỗng
        if (!is_null($cart_json) && is_array($cart_json)) {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            if (!in_array($product_id, $cart_json)) {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm vào mảng cart_products JSON
                $cart_json[] = $product_id;// đưa vào cuối mảng
                
                // Cập nhật cột cart_products JSON trong bảng users
                $cart_json_encoded = json_encode($cart_json);//đưa vể dạng array [id,id];
                $update_cart_query = "UPDATE users SET cart_products = '$cart_json_encoded' WHERE id = '$id'";
                mysqli_query($conn, $update_cart_query);// thực hiện update
            } else {
                // Xử lý nếu sản phẩm đã tồn tại trong giỏ hàng
            }
        } else {
            // Xử lý trường hợp giỏ hàng trống
           
        }
    } else {
        echo 'Invalid product ID';
    }
} else {
   
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="./css/user.css">
        <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    </head>
<body>
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
    <header>
        <div id="navbar">
            <nav>
             <ul class="sidebar"> 
              <l onclick=hideSidebar() ><a href="./index.html"><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
              <l><a href=""><img src="./icon/Search.svg" alt="Search"></a></l>
              <l><a href="./login.html"><img src="./icon/User.svg" alt="User"></a></l>
              <l><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
              <l><a href=""><img src="./icon/Frame 1.png" alt=""></a></l>
             </ul>
             <ul >
               <l class=""><a href=""><a href="./index.php"><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
             
               <l class="hideOnMobie"><a href="<?=$link?>"><img src="./icon/User.svg" alt="User"></a></l>
               <l class="hideOnMobie"><a href="./collection.php"><img src="./icon/Bag.svg" alt="Bag"></a></l>
               <l class="menu-button" onclick=showSidebar()><img id="brand_logo" src="./icon/bee_menu.svg" alt="bee_menu"></a></l>
              </ul>
            </nav>
           </div>
    </header>
    <main>
        <div class="content"  style="background-image: url('./img/Rectangle\ 51.png');">
                <div class="user-detail">
                    <div class="avatar"><img src="./img/Group 10.png" alt=""></div>
                    <div class="namebox">                  
                    <div class="tag">USER NAME</div>
                    <p class="name infor"><?=$row['username']?></p>
                    </div>      
                       <div class="namebox"> 
                        <div class="tag">Address</div> 
                        <p class="address infor"><?=$row['email']?></p>
                       </div>
                    
                    
                    <a href="./logout.php"><button class="Loggout">Loggout</button></a>
                    
                </div>
                <div class="shoppcart">
                        <h3>Shopping cart</h3>
                <?php
$conn = new mysqli('localhost', 'root', '', 'project_ecommerce');
$sql = "SELECT cart_products FROM users WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cart_json = json_decode($row['cart_products'], true);
        
        // Lặp qua mỗi ID sản phẩm trong giỏ hàng và truy vấn thông tin sản phẩm từ bảng products
        if(is_array($cart_json)){

        foreach ($cart_json as $product_id) {
            $product_sql = "SELECT * FROM products WHERE id='$product_id'";
            $product_result = $conn->query($product_sql);
            
            if ($product_result->num_rows > 0) {
                while ($product = $product_result->fetch_assoc()) {
                    // Hiển thị thông tin chi tiết của sản phẩm
                    ?>
                  
                        <div class="item">
                            <img src="<?php echo $product['image']; ?>" alt="">
                            <div class="item_infor">
                                <p class="item_name"><?php echo $product['name']; ?></p>
                                <p class="item_price"><?php echo $product['price']; ?></p>
                                <select class="quantity" name="quantity" id="">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                   
                    <?php
                }
            }else{
                echo '';
            }
        } }else{
            echo  'please buy our products';
        }
    }
}
?>
     <button class="buy">BUY NOW</button>

 </div>

                       
                        </div>
                    
            
        
           


        </div>



    </main>
    <footer></footer>



</body>
</html>