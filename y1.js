let myarray=['./images/icon.jpeg','./images/pink.png','./images/red.png'];
let ul=document.querySelector('body')
li=document.createElement('li');
 
 
 

for(i=0;i<myarray.length;i++)
{
    const img=document.createElement('img');
    img.src=myarray[i];
    ul.appendChild(img)
}