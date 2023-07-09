let task=document.getElementById('task');
let description=document.getElementById('about');
// let taskvalue=task.value;
 save.addEventListener('click',(e)=>{
    e.preventDefault();
    console.log(task.value); //this is for the task  
    console.log(about.value);

   let  taskValue= task.value;
   let DetaildInfo= description.value;
    task.value=""
    about.value="";

    makeNewDiv( taskValue,DetaildInfo);

 })

 erase.addEventListener('click',()=>{
    e.preventDefault();
    task.value="";
    description.value="";
 })
function makeNewDiv(taskValue,DetaildInfo){
     console.log(taskValue);
     console.log(DetaildInfo);
   let container= document.querySelector('.task_Container');
    let div=document.createElement('div');
    // let hi=document.createElement('li');
    div.id="myDiv";
    // div.textContent="welcome to my world";
    let icon=document.createElement('img');//icon element created for icon
    var iconPath="./images/completed.png";  //path of icon
    let task=document.createElement('div'); //taks element is created
    let desc=document.createElement('div'); //desc element is created
    task.innerText=taskValue; //value of taskvalue
    desc.innerText=DetaildInfo;
    icon.src=iconPath; //icon path
    
    icon.classList.add('img');
    div.appendChild(icon); 


    icon.addEventListener('click',(e)=>{
         
        
    })
    task.classList.add('task');
    div.appendChild(task);
    
    desc.classList.add('desc');
    div.appendChild(desc);
    

    
    div.classList.add('div');
    container.appendChild(div);


}

 

 