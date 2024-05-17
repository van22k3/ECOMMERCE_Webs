// main.js

let ISsidebar = false;

function showSidebar() {
    const sidebar = document.querySelector('.sidebar');
    if (!ISsidebar) {
        sidebar.style.display = 'flex';
        ISsidebar = true;
    } else {
        sidebar.style.display = 'none';
        ISsidebar = false;
    }
}

function hideSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.style.display = 'none';
}

// collection-img change when hover

function hoverEffect(){
    var thirdElement = document.querySelector('.third');
    thirdElement.style.opacity = '0';
}
function normalHover(){
    var thirdElement = document.querySelector('.third');
    thirdElement.style.opacity = '1';
} 

function hoverLast(){
    var secondElement = document.querySelector('.second');
    var thirdElement = document.querySelector('.third');
    thirdElement.style.opacity = '0';
    secondElement.style.opacity = '0';
}
function NormalLast(){
    var secondElement = document.querySelector('.second');
    var thirdElement = document.querySelector('.third');
    thirdElement.style.opacity = '1';
    secondElement.style.opacity = '1';
}


//footer email sent

var btn = document.getElementById('email__btn');


function EmailSent(){
    var input = document.getElementById('email__input');
    var content = input.value;
     var p_error =  document.querySelector('.p_error');
     var p_success = document.querySelector('.p_success');
     if(content === ""){
        p_error.style.display = 'inline';
        p_success.style.display = 'none';
     }else{
        p_success.style.display = 'inline';
        p_error.style.display = 'none';
        input.value = ("");
     }
     console.log(content);
}

// accordion btn
var acc = document.getElementsByClassName("btn-accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    console.log("dmm");
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}