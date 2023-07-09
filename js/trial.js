 
 
function add_Task(val){
    //  let myarray=['./images/icon.jpeg','./images/pink.png','./images/red.png'];
    let list=document.querySelector('.list');
    let ul =document.querySelector('.list ul');
    let Element=document.createElement('li');
    let br=document.createElement('br'); // this is a for break the line element 
    let newimg= document.createElement('img');
    newimg.src='./images/blue.png';
    let count=document.createElement('span'); //this is for creating the number

    newimg.classList.add('list');
    newimg.classList.add('img')
    
    ul.appendChild(newimg);

     Element.innerText=val;
     Element.classList.add('li');
    //   
    // br.innerText="<br>";
  
     ul.appendChild(Element);

   count.innerHTML="5";
   count.style.display='inline-block';
   count.classList.add('nums');
   ul.appendChild(count);

   ul.appendChild(br); //it still working.....
 }
   
 
function display(){
    document.querySelector('.popup').style.display='flex';
}

 
 function closeii(){
    document.querySelector('.popup').style.display='none';
 }
 
  function removoe(){
     
     let inputs= document.getElementById('inputs');
     val=inputs.value;
     console.log(inputs.value);
     add_Task(val);
     ( document.querySelector('.popup').style.display='none');

 }
  