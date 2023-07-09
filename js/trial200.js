let task=document.getElementById('task');
let description=document.getElementById('about');
// let taskvalue=task.value;
 save.addEventListener('click',(e)=>{
    e.preventDefault();
    let saveit=new Audio('./sound/save.mp3');
    saveit.play();
    console.log(task.value); //this is for the task  
    console.log(about.value);

   let  taskValue= task.value;
   let DetaildInfo= description.value;
    task.value=""
    about.value="";

    makeNewDiv( taskValue,DetaildInfo);

 })

 erase.addEventListener('click',(e)=>{
   let er=new Audio('./sound/erase.mp3');
   er.play();
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
    
    // chatgpt code starts
    var checkboxcontainer=document.getElementsByClassName('checkboxContainer');
    var checkboxdata=[
        {label:"option 1",value:"option 1"}
    ];
    checkboxdata.forEach(function(data){
        var checkboxLabel = document.createElement('label');
              var checkbox = document.createElement('input');
              checkbox.type = "checkbox";
              checkbox.name = data.value;
              checkbox.value = data.label;
              checkboxLabel.appendChild(checkbox);
            //   checkboxLabel.appendChild(document.createTextNode(data.label));
            checkbox.classList.add('checkbox')
              div.appendChild(checkbox);
              div.classList.add('div');
              
          
   

    let task=document.createElement('div'); //taks element is created
    let desc=document.createElement('div'); //desc element is created
    let icon=document.createElement('img');
    var iconPath="./images/trash.jpg";
    icon.src=iconPath; 
    task.innerText=taskValue; //value of taskvalue
    desc.innerText=DetaildInfo;

    task.classList.add('task');
    desc.classList.add('desc');
    icon.classList.add('img');

    div.appendChild(task);
    div.appendChild(icon);
    
    div.appendChild(desc);
    

    
    div.classList.add('div');
    container.appendChild(div);


    icon.addEventListener('click',(e)=>{
      let del=new Audio('./sound/remove.mp3');
      del.play();

      container.removeChild(div);
        
     })
     checkbox.addEventListener('click',(e)=>{
      let success=new Audio('./sound/success.mp3');
      success.play();
      task.classList.add('strike');
      

     })

      



    })

}
    // chatgpt code ends here
  

    
    // task.classList.add('task');
    // div.appendChild(task);
    
    // desc.classList.add('desc');
    // div.appendChild(desc);
    

    
    // div.classList.add('div');
    // container.appendChild(div);


// }

 

 