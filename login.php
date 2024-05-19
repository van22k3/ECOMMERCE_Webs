<?php
session_start(); // Bắt đầu session
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST['acs-email']; 
    $login_password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'project_ecommerce');

    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$login_email'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($login_password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row['id'];
            header("Location: user.php");
            exit();
        } else {
            echo "<script>alert('WRONG PASSWORD')</script>";
        }
    } else {
        echo "<script>alert('EMAIL NOT FOUND')</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<script>
        document.addEventListener('DOMContentLoaded', () => {
            const signin = document.getElementById('SignIn');
            const signup = document.getElementById('SignUp');

            signin.addEventListener('click', function(event){
                const email = document.querySelector('.menu-display #email');
                const password = document.querySelector('.menu-display #password');
                const warnmail = document.querySelector('.email-container .warn');
                const passmail = document.querySelector('.password-container .warn');
                
                let valid = true;

                if(email.value.length < 8){
                    warnmail.classList.remove('none_display');
                    valid = false;
                } else {
                    warnmail.classList.add('none_display');
                }

                if(email.value === "" || password.value === ""){
                    passmail.classList.remove('none_display');
                    valid = false;
                } else {
                    passmail.classList.add('none_display');
                    
                }
                 
                if (!valid) {
                    event.preventDefault(); // Prevent form submission
                }
            });

            signup.addEventListener('click', function(event){
                const inputall = document.querySelectorAll('.SignUp-container .menu-display input');
                const signupwarn = document.querySelector('.re-eneterpass .warn');
                const password = document.getElementById('rq-password');
                const re_password = document.getElementById('re-password');
                const passworderror = document.querySelector('.password-error');
              
                let valid = true;

                inputall.forEach(element => {
                    if(element.value === ""){
                        signupwarn.classList.remove('none_display');
                        valid = false;
                    } else {
                        signupwarn.classList.add('none_display');
                    }
                });

                if(re_password.value !== password.value){
                    passworderror.classList.remove('none_display');
                    valid = false;
                } else {
                    passworderror.classList.add('none_display');
                }
                
                inputall.forEach(element => {
                    if(element.value === ""){
                        signupwarn.classList.remove('none_display');
                        valid = false;
                    } else {
                        signupwarn.classList.add('none_display');
                    }
                });
                
             


                if (!valid) {
                    event.preventDefault(); // Prevent form submission
                   
                }
                if(valid){
                  document.querySelector('.result').classList.remove('none_display');
                  }
            });
        });
    </script>
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
   
    <div id="login">
        <div id="header">
            <!--navbar reponsive-->
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
                   <l class="hideOnMobie"><a href=""><img src="./icon/Bag.svg" alt="Bag"></a></l>
                   <l class="menu-button" onclick=showSidebar()><img id="brand_logo" src="./icon/bee_menu.svg" alt="bee_menu"></a></l>
                  </ul>
                </nav>
               </div>
            </header>
            <div id="content">
           
             <div class="menu-content">
        
             <p class="result none_display "><?php if($result->num_rows>0){
                  echo 'username or email had been taken';
                
             }else{
                echo "";

             } ?></p>
        
              <div class="tab-menu">
                <div class="tab-item active">
                    <span class="menu-title">Login</span>
                </div>
                <div class="tab-item">
                  <span class="menu-title">Sign Up</span>
                </div>
                <div class="line"></div>
              </div>
              <div class="tab-content">
                <div class="tab-panel active">
                  <form action="" method="POST">
                  <div class="email-container menu-display">
                    <p>*Continue with your account</p>
                    <input type="text" name="acs-email" id="email" placeholder="Email">
                    <p class="warn none_display">please enter valid email address</p>
                  </div>
                  <div class="password-container menu-display">
                    
                    <input type="password" name="password" id="password" placeholder="Password">
                    <p class="warn none_display">Please fill all content</p>
                  </div>
                  <button type="submit" class="bttn " id="SignIn">COUNTINUE</button>
                
                  <div class="message-box">Please log in to extend your access time. <br> Receive promotions and updates on the latest products from Vérité.</div>
                </div>
                <div class="tab-panel">
                   
                  <div class="SignUp-container">
                    <div class="Username menu-display">
                     <p>*Username</p>
                      <input type="text" name="username" id="username" placeholder="Username"  value="">
                    </div>
                    <div class="email-container menu-display">
                      <p>*Email Address</p>
                    <input type="text" name="email" id="rq-email" placeholder="Email"   value="">
                    </div>
                    <div class="password-container menu-display">
                      <p>*Password</p>
                      <input type="password" name="rq-password" id="rq-password" placeholder="Password"   value="">
                    </div>
                    <div class="re-eneterpass menu-display">
                      <p>*Re-enter Password</p>
                      <input type="password" name="re-password" id="re-password" placeholder="Password"   value="">
                      <p class="password-error none_display ">Please to check the same password</p>
                      <p class="warn none_display">Please fill all content</p>
                      
                    </div>
                    
                    <button  class="bttn" id="SignUp" >SIGN UP</button>
                  </div>
                </div>

              </div>
             </div>
             </form>
                

                <div class="img-slider">
                  <img  class="img-slider-item first" src="./img/xGucci-ladies-watches_1.jpg.pagespeed.ic.LKgda_0jfD 1.png" alt="" >
                  <img  class="img-slider-item first" src="./img/men_img.png" alt="" >

                </div>


            </div>
            <script src="./js/login.js"></script>
            <script>
              const $ = document.querySelector.bind(document);
              const $$ = document.querySelectorAll.bind(document);
              const tabs = $$(".tab-item");
              const panel = $$(".tab-panel");
            
              const tabActive = $(".tab-item.active");
              const line = $(".tab-menu .line");
              line.style.left =tabActive.offsetLeft + 'px';
          line.style.width = tabActive.offsetWidth + "px";

      //sử dụng for each để gắn index của item vs panel content  
            tabs.forEach((tab , index) => { //tab: iteam aka phan tu cua mang, index so thu tu, this phan tu hien tai
              const current_panel = panel[index];
                
                 tab.onclick = function(){
                  console.log(this,index);
                  $('.tab-item.active').classList.remove("active");
                  this.classList.add("active");
                  localStorage.setItem('key',this);
                  //show current panel item[index]
                  $('.tab-panel.active').classList.remove("active");
                  current_panel.classList.add("active");
                  line.style.left = this.offsetLeft + "px";
                  line.style.width = this.offsetWidth + "px";

                 }
            });
          

            </script>
            <footer>
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
            </footer>
          </div>
    </div>
</body>
</html>