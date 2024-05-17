
//sortpanel
var SortList = document.getElementsByClassName("btn-Sort"); //getget"Elements"ByClassName trả về mảng HMTLcollection,
//phần tử riêng lẻ mới sử lý được sự kiện

for (var i = 0; i < SortList.length; i++) {
    SortList[i].addEventListener('click', function(){
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) { //nếu panel height đang có giá trị hiển thị thì khi nhấn lại tắt nó đi
            panel.style.maxHeight = null;
        } else { // nếu ko hiển thị thì cho nó độ dài// scrollheight là nội dung thực của phần tử
            panel.style.maxHeight = panel.scrollHeight + 'px';// panel.scrollHeight trả về chuỗi, +px để chuyển giá trị thành đơn vị pixel
        }
    });
}
//catalog
var panelbtn = document.getElementsByClassName("panel-active");

for(var i=0; i<panelbtn.length;i++){
    panelbtn[i].addEventListener('click',function(){
        
        var panelList = this.nextElementSibling;
        
        panelList.classList.toggle("deactive");
    });
}


var panelItems = document.getElementsByClassName("panel-list-item");

for (let index = 0; index < panelItems.length; index++) {
   panelItems[index].onclick = function() {
      // Reset the color of all elements
      for (let j = 0; j < panelItems.length; j++) {
         panelItems[j].style.color = "gray"; 
      }
      // Set the color of the clicked element to black
      this.style.color = "black";
   };
}

//loadmore
const loadmore = document.querySelector('.bttn-load');

let currentItem = 3;

loadmore.onclick = () =>{
    
    let boxes = [...document.querySelectorAll('#product-list-container .col-md-4')];
    console.log(boxes);
    for(var i=currentItem;i<currentItem+2;i++){
        boxes[i].style.display = 'block';
    }
    currentItem +=2;
    if(currentItem>=boxes.length){
        loadmore.style.display  = 'none';
    }

}

