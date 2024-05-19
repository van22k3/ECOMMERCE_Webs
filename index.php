<?php
 require 'config.php';
session_start();
$link="";

if(!empty($_SESSION['id'])){
    $link = 'user.php';
}else{
    $link = 'login.php';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style_main.css">
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <title>Viété</title>
</head>
<body>
  <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/main.js"></script>
  <div id="main">
    <div id="header">
      <!--navbar reponsive-->
      <header>
        <div id="navbar">
          <nav>
           <ul class="sidebar">
            <l onclick=hideSidebar() ><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
            <l><a href=""><img src="./icon/Search.svg" alt="Search"></a></l>
            <l><a href=""><img src="./icon/User.svg" alt="User"></a></l>
            <l><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
            <l><a href=""><img src="./icon/Frame 1.png" alt=""></a></l>
           </ul>
           <ul >
             <l class=""><a href=""><img src="./icon/Vérité.svg" alt="Brand_name"></a></l>
           
             <l class="hideOnMobie"><a href="<?=$link?>"><img src="./icon/User.svg" alt="User"></a></l>
             <l class="hideOnMobie"><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
             <l class="menu-button" onclick=showSidebar()><img id="brand_logo" src="./icon/bee_menu.svg" alt="bee_menu"></a></l>
            </ul>
          </nav>
         </div>
      </header>
    </div>
    <!-- content -->
    <div id="content">
      <!-- frame1 -->
      <div class="frame1" style="background-image: url('./img/Watches from Timex - Digital, Analog, & Water Resistant Watches - Timex US.gif');">
        <div class="conten1">
          <div class="item1">
            <p>Elevate every moment with our exquisite collection of timepieces.</p>
          <p>-Vérité Chronograph- </p>
          <button id="btn_shoppage"><img src="./icon/ShopNowbtn.png" alt=""></button>
          </div>
          <audio  id="audio" controls  onclick="" src="./musicque/y2mate.com - Future Metro Boomin Kendrick Lamar  Like That Official Audio.mp3"></audio>
          <audio src=""></audio>
        </div>
        
      </div>
      <!-- frame2 -->
      <div id="frame2" style="background-image: url('./img/Container1.png');"></div>
      <!--carsousel header -->
      <div id="carousel-header">
        <div id="header-label">
      <h2 class="car-h2">Featured Product</h2>
      <h3 class="car-h3">Check our most popular watches</p>
        </div>
              <!--carsousel control -->
              <div class="controls-container">
                <button id="car-pre" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon-" aria-hidden="true"><img src="./icon/Frame_button.svg" alt=""></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button id="car-next" class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"><img src="./icon/Frame_button2.svg" alt=""></span>
                  <span class="visually-hidden">Next</span>
                
                </button>
              </div>
      
      </div>
  
      <!--carsousel content -->
      <div id="carouselExampleIndicators" class="carousel slide" >
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">  <!-- item1 -->
            <div id="card-cotainer">
            <img class="car-item" src="./img/TW2V88700_ea4c3ac6-bcfd-4e00-b679-4d21f7de15e4.webp" class="d-flex w-auto " alt="...">
              <div class="card-detail">
                <h2 class="card-detail-title">
                  Timex Marlin® Hand-Wound x Snoopy Tennis
                </h2>
                <div class="color">34 mm</div>
                <div class="Product-color-panel"> Color: <span class="color-panel">Stainless Steel/Silver-Tone/Silver</span> </div>
                <button class="add-btn">Add To Bag</button>
               
                <div class="price_regular">
                  <span class="price-item price-item--regular">7.977.500₫</span>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item"> <!-- item2 -->
            <div id="card-cotainer">
              <img class="car-item" src="./img/TW2W22400.webp" class="d-flex w-auto " alt="...">
                <div class="card-detail">
                  <h2 class="card-detail-title">
                    Q Timex Reissue 1971 Velocity 36mm Synthetic Rubber Strap Watch
                  </h2>
                  <div class="color">31 mm</div>
                  <div class="Product-color-panel"> Color: <span class="color-panel"> Black/Stainless Steel</span> </div>
                  <button class="add-btn">Add To Bag</button>
                  
                  <div class="price_regular">
                    <span class="price-item price-item--regular">6.239.700₫</span>
                  </div>
                </div>
              </div>
          </div>
          <div class="carousel-item"> <!-- item3 -->
            <div id="card-cotainer">
              <img class="car-item" src="./img/TW2V42600.webp" class="d-flex w-auto " alt="...">
                <div class="card-detail">
                  <h2 class="card-detail-title">
                    Q Timex Chronograph 40mm Stainless Steel Bracelet Watch
                  </h2>
                  <div class="color">40 mm</div>
                  <div class="Product-color-panel"> Color: <span class="color-panel">Stainless Steel/Stainless Steel
                  </span> </div>
                  <button class="add-btn">Add To Bag</button>
                 
                  <div class="price_regular">
                    <span class="price-item price-item--regular">7.982.600₫</span>
                  </div>
                </div>
              </div>
          </div>
        
        </div>
       
      </div>
      <!-- collection stacked -->
      <div class="collection">
        <div class="collection-title">This is Vérité</div>
        <ul class="collection-title-list">
          <li id="dmm" class="collection-list-item top-item" >
              <a href=""><span>Automatic</span> <span class="arrow"><img src="./icon/mingcute_arrow-up-fill.png" alt=""></span></a>
          </li>
          <li class="collection-list-item  second-item" onmouseover="hoverEffect()" onmouseout="normalHover()">
              <a href=""><span>Digital</span><span class="arrow"><img src="./icon/mingcute_arrow-up-fill.png" alt=""></span></a>
          </li>
          <li class="collection-list-item third-item" onmouseover="hoverLast()" onmouseout="NormalLast()">
              <a href=""><span>Vintage Inspired</span><span class="arrow"><img src="./icon/mingcute_arrow-up-fill.png" alt=""></span></a>
          </li>
      </ul>
      
       <div class="collection-image-item">
        <ul class="collcetion-image-item-stacked">
          <li class="collection-stacked-image " ><img class="top" src="./img/02582_WB23_July_feature_collection_TW2V24700_beauty.webp" alt=""></li>
          <li class="collection-stacked-image"><img class="second" src="./img/02582_WB23_July_feature_collection_TW2V74200_beauty.webp" alt=""></li>
          <li class="collection-stacked-image "><img    class="third" src="./img/02582_WB23_July_feature_collection_TW2V38000_beauty.webp" alt=""></li>
         
        </ul>
       </div>
      </div>
      <!-- frame 5 -->
        <div class="feature-block" style="background-image: url('./img/ezgif.com-video-to-gif-converter.gif');"> 
          <div class="frame5-card">
            <div class="frame5-card-img">
              <img src="./img/TW2W51400.webp" alt="">
            </div>
            <div class="frame5-card-detail">
              <span class="frame5-card-detail-title">Vétiré Chronograph 40mm leather StrapWatch</span>
              <span class="frame5-card-detail-content">40mm | 2 Colors</span>
              <span class="frame5-card-detail-price">400$usd</span>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
  
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