<?php
require 'config.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/collection.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">

</head>
<body>
    <script src="./js/main.js"></script>
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <div id="collection">
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
                   <l class=""><a href=""><a href="./index.html"><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
                   <l class="hideOnMobie"><a href=""><img src="./icon/Search.svg" alt="Search"></a></l>
                   <l class="hideOnMobie"><a href="./login.html"><img src="./icon/User.svg" alt="User"></a></l>
                   <l class="hideOnMobie"><a href="./collection.html"><img src="./icon/Bag.svg" alt="Bag"></a></l>
                   <l class="menu-button" onclick=showSidebar()><img id="brand_logo" src="./icon/bee_menu.svg" alt="bee_menu"></a></l>
                  </ul>
                </nav>
               </div>
        </header>
        <main>
            <!-- breadcrumb -->
            <div id="collection-content">
                <div class="content-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background-color: white;">
                          <li class="breadcrumb-item active" aria-current="page"><a href="./index.html">Home</a></li>
                          <li class="breadcrumb-item " aria-current="page" ><a href="">Vérité collection</a></li>
                        </ol>
                      </nav>
                    <div class="title-header">VÉRITÉ Featured</div>
                </div>
            </div>
            <!-- sort btn -->
            <div class="sortFilter-content">
                <button class="btn-Sort">Sort by <img src="./icon/mdi_arrow-down-drop.png" alt=""></button>
                <div class="sort-Item"><ul>
                    <li class="sort-list">new</li>
                    <li class="sort-list">best selling</li>
                   
                </ul></div>
            </div>
            <!-- product lsit -->
            <div class="container product-list" id="product-list">
                <div class="row" id="product-list-container">
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                          
                    <div class="col-md-4 mb-3 <?= $row['brand']; ?>">
                    <a href="collection_detail.php?id=<?= $row['id']; ?>" style="text-decoration: none;"> 
                        <div class="product-list-item " id="">
                      <img class="product-list-item__img" src="<?= $row['image']; ?>" alt="">
                          
                            <p class="product-list-item__name"><?= $row['name']; ?></p>
                            <p class="product-list-item__detail"><?= $row['detail']; ?></p>
                            <p class="product-list-item__price"><?= $row['price']; ?></p>
                        </div>
                        </a>
                    </div>
                    <?php 
                        }
                    } else {
                        echo "<p>No products found.</p>";
                    }
                    ?>
                </div>
                <div class="bttn-load">
                    <button class="loadmore">Load More <img src="./icon/Vector.svg" alt=""></button>
                    
                </div>
            </div>
             <!-- catalog-panel -->
          <!-- catalog-panel -->
          <div class="catalog-panel">
                <button class="panel-active">panel</button>
                <ul class="panel-list">
                    <li class="panel-list-item" data-brand="All">All</li>
                    <li class="panel-list-item" data-brand="Automatic">Automatic</li>
                    <li class="panel-list-item" data-brand="Digital">Digital</li>
                    <li class="panel-list-item" data-brand="Vintage_Insprite">Vintage Insprite</li>
                </ul>
            </div>
        <script src="./js/collection.js"></script>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.panel-list-item').forEach(function (item) {
            item.addEventListener('click', function () {
                var brand = this.getAttribute('data-brand');
                console.log(brand);
                var products = document.querySelectorAll('.col-md-4.mb-3'); // Chọn tất cả các sản phẩm
                var selectedProducts = document.querySelectorAll('.col-md-4.mb-3.' + brand); // Chọn sản phẩm có nhãn tương ứng

                // Ẩn tất cả sản phẩm
              
                products.forEach(function (product) {
                    product.style.display = 'none';
                });

                // Hiển thị các sản phẩm có nhãn tương ứng
                if(brand==="All"){
                    products.forEach(function(product){
                        product.style.display = 'block';
                    })
                }else{
                    selectedProducts.forEach(function (product) {
                    product.style.display = 'block';
                });
                }
              
            });
        });
    });
            </script>
        </main>
        <footer class="footer relative" >
    <div class="row"> <div class="footer__top">
      <div class="footer__logo relative">
        <button style="border-radius: 50px;"><img src="./icon/Group 4.svg" alt=""></button>
      </div>
    </div>
    <div class="footer__body">
      <div class="footer__embed">
       <div class="footer__embed-letter ">
        <p>SUBSCRIBE TO OUR NEWLETTER AND DISCOUNT</p>
       </div>
       <div class="input__btn">
        <input id="email__input" class="form-control" type="text" name="" id="" placeholder="email">
        <button  id="email__btn" class="btn-sub" onclick="EmailSent()">Subscribe</button>
       </div>
       <div class="notifi__display">
        <p class="p_error error absolute none_display">This field is required</p>
        <p class="p_success success absolute none_display">email sent successfully</p>
        <p class="p_condition">By submitting your email address you are agreeing to the <br> <span style="text-decoration: underline;">Privacy Policy</span>  and <span style="text-decoration: underline;">Terms & Conditions.</span> </p>
        
      </div>
      </div>
      <div class="footer__top-menu">
      
        <button class="btn-accordion">Discover <span class="menu-icon"><img src="./icon/bxs_down-arrow.svg" alt=""></span></button>
        <ul class="menu-content-footer">
          <li class="menu-content-item">Shop</li>
          <li class="menu-content-item">Pham Manh Chien</li>
          <li class="menu-content-item">Do Viet Hoang</li>
          <li class="menu-content-item"></li>
          <li class="menu-content-item"></li>
        </ul>
        <hr>
        <button class="btn-accordion">About<span class="menu-icon"><img src="./icon/bxs_down-arrow.svg" alt=""></span></button>
        <ul class="menu-content-footer">
          <li class="menu-content-item">Dang Anh Van</li>
          <li class="menu-content-item">Pham Manh Chien</li>
          <li class="menu-content-item">Do Viet Hoang</li>
          <li class="menu-content-item"></li>
          <li class="menu-content-item"></li>
        </ul>
        <hr>
        <button class="btn-accordion">Support<span class="menu-icon"><img src="./icon/bxs_down-arrow.svg" alt=""></span></button>
        <ul class="menu-content-footer">
          <li class="menu-content-item">+8416028848</li>
          <li class="menu-content-item">Pham Manh Chien</li>
          <li class="menu-content-item">Do Viet Hoang</li>
          <li class="menu-content-item"></li>
          <li class="menu-content-item"></li>
        </ul>
        <hr>
      </div>
      <div class="footer__contact"></div>
      <div class="contact__content"><img src="./icon/Facebook_-_Negative 1.svg" alt=""><h3>FaceBook</h3></div>
      <div class="contact__content"><img src="./icon/Instagram.svg" alt=""><h3>Instagram</h3></div>
      <div class="contact__content"><img src="./icon/Linkedin.svg" alt=""><h3>Linkedin</h3></div>
     

    </div>
    <div class="footer_bottom">
      <p class="footer__copyright">
        © 2024 ChiMinhTao.com, Inc. All Rights Reserved.
      </p>
    </div>
  </div>

    <!-- Menu__accordion-script -->
   <script>
     var acc = document.getElementsByClassName("btn-accordion");
     var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    console.log("dmm");
    this.classList.toggle("active__footer");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
   </script>
  </footer>
    </div>
</body>
</html>