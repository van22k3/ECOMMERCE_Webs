//login check
var signin = document.getElementById('SignIn');


signin.addEventListener('click',function(){
    var email = document.querySelector('.menu-display #email');
    var password = document.querySelector('.menu-display #password');
    var warnmail = document.querySelector('.email-container .warn');
    var passmail = document.querySelector('.password-container .warn');
    var mailvalue = email.value;
    if(email.value.length  < 8){
        warnmail.classList.remove('none_display');
    }else{
        warnmail.classList.add('none_display');
    }

    if(email.value == "" || password.value ==""){
        passmail.classList.remove('none_display');
    }else{
        passmail.classList.add('none_display');
    }
   
})

var signup = document.getElementById('SignUp');
var inputall = document.querySelectorAll('.SignUp-container .menu-display input');
var signupwarn = document.querySelector('.re-eneterpass .warn');
var password = document.getElementById('rq-password');
var re_password = document.getElementById('re-password');
var passworderror = document.querySelector('.password-error');

signup.addEventListener('click',function(){
    inputall.forEach(element => {
       
       if(element.value==""){
        signupwarn.classList.remove('none_display');
       }else{
        signupwarn.classList.add('none_display');
       }
    });
    if(re_password.value !== password.value){
        passworderror.classList.remove('none_display');
    }else{
        passworderror.classList.add('none_display');
    }

})



