//  function createelement(){
//     let Element=document.createElement("li");
//     Element.innerHTML="welcome";
    
//     let ul=document.querySelector(".newtask");
//     ul.appendChild(Element);

//  }
 
function add_Task(){
//     let myarray=['./images/icon.jpeg','./images/pink.png','./images/red.png'];
    let list=document.querySelector('.list');
    let ul =document.querySelector('.list ul')
    console.log(ul);
    let input= document.querySelector('.popup input');
    console.log(input.innerHTML);

//     document.createElement('img');
let Element=document.createElement('li');
Element.innerText="hi there";
Element.style.color='red'
// Element.classList.add('.list ')
// console.log(Element);
// ul.appendChild(Element);

//     img.src=myarray[i];
//     ul.appendChild()



 }
//  

let c=document.getElementById("c");
function display(){
    document.querySelector('.popup').style.display='flex';
}

function close(){
    
    console.log("hi there ");
}
 function closeii(){
    console.log("okkk");
    document.querySelector('.popup').style.display='none';
 }