<?php
session_start();
  require 'config.php';
  $link="";

if(!empty($_SESSION['id'])){
    $link = 'user.php';
}else{
    $link = 'login.php';
}
  if(isset($_GET['id'])){
    $product_id =$_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result= $conn->query($sql);
    if($result->num_rows >0){
      $product = $result->fetch_assoc();

    }
  }else{
    echo 'invalid request';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/collection_detail.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <script src="./js/main.js"></script>
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <header>
        <div id="navbar">
          <nav>
           <ul class="sidebar">
            <l onclick=hideSidebar() ><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
            <l><a href=""><img src="./icon/Search.svg" alt="Search"></a></l>
            <l><a href="./login.html"><img src="./icon/User.svg" alt="User"></a></l>
            <l><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
            <l><a href=""><img src="./icon/Frame 1.png" alt=""></a></l>
           </ul>
           <ul >
             <l class=""><a href="./index.php"><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
            
             <l class="hideOnMobie"><a href="<?=$link?>"><img src="./icon/User.svg" alt="User"></a></l>
             <l class="hideOnMobie"><a href="./collection.php"><img src="./icon/Bag.svg" alt="Bag"></a></l>
             <l class="menu-button" onclick=showSidebar()><img id="brand_logo" src="./icon/bee_menu.svg" alt="bee_menu"></a></l>
            </ul>
          </nav>
         </div>
      </header>
    <main>
        <div class="content">
            <div class="content-frame1" style="background-image: url('<?=$product['bg_img']?>');">
                <div class="content-frame1_detail">
                    
          
            <div class="collection-detail-card">
                 <!-- breadcrumb -->
                <div id="collection-content">
                    <div class="content-header">
                            <ol class="breadcrumb" style="background-color: white;">
                              <li class="breadcrumb-item active" aria-current="page"><a href="./index.php">Home</a></li>
                              <li class="breadcrumb-item " aria-current="page"><a href="./collection.php">Vérité collection</a></li>
                            </ol>
                    </div>
                </div>
               
                <p class="name"><?=$product['name']?></p>
                <p class="detail"><?=$product['detail']?></p>
                <div class="color">
                    <p>Color: </p>
                    <div class="mini-image">
                        <img src="<?=$product['image']?>" alt="">
                    </div>
                </div>
                <p class="price"><?=$product['price']?></p>
                <a href="<?=$link?>?<?=$product['id']?>"><button class="btn-add">Add to Bag</button></a>
                
            </div>
                </div>
            
            </div>

        </div>
        <div class="layout">
        <div class="collection-layout">
            <div class="img1"><img src="<?=$product['img1']?>" alt="#" onerror="this.classList.add('hidden');"></div>
            <div class="img2"><img src="<?=$product['img2']?>" alt="#" onerror="this.classList.add('hidden');"></div>
            <div class="img1"><img src="<?=$product['img3']?>" alt="#"onerror="this.classList.add('hidden');"></div>
            <div class="img2"><img src="<?=$product['img4']?>" alt="#" onerror="this.classList.add('hidden');"></div>
        </div>
        <div class="img3"><img src="<?=$product['img5']?>" alt=""></div>
        </div>
        <div class="message">
            <span>Viété </span>
            <p>
            A watch brand conceived by three visionaries: Van, Chien, and Hoang. Our mission is to bring elegance and respect for time to your wrist. With Viété, time becomes a beautiful accessory. If you're looking for a sophisticated and affordable timepiece, Viété is the perfect choice. Established in 2024, we are dedicated to making every moment precious.
            </p>
        </div>
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
</body>
</html>