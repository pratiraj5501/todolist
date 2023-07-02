//  function createelement(){
//     let Element=document.createElement("li");
//     Element.innerHTML="welcome";
    
//     let ul=document.querySelector(".newtask");
//     ul.appendChild(Element);

//  }
//  function takeinput(){
//     let lm=document.getElementById('inputs');
//     console.log(lm);

//  }
 
function add_Task(){
    //  let myarray=['./images/icon.jpeg','./images/pink.png','./images/red.png'];
    let list=document.querySelector('.list');
    let ul =document.querySelector('.list ul')
    let Element=document.createElement('li');
    
    // let input= document.querySelector('.popup input');
    let input="checkme";
    Element.innerHTML=input;
 
// Element.appendChild('input') ;
 }
   
 
function display(){
    document.querySelector('.popup').style.display='flex';
}

 
 function closeii(){
    document.querySelector('.popup').style.display='none';
 }
 
  function removoe(){
     
     let inputs= document.getElementById('inputs');
     console.log(inputs.value);
     add_Task();
     ( document.querySelector('.popup').style.display='none');

 }
  