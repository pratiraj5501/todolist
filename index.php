<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container{
            position: relative;
          margin: auto;
            margin-top: 7%;
            width: 80%;
            height: 70vh;
            display: flex;
        }
        .leftimg img{
            position: relative;
            margin-left: 1.5rem;
            margin-top: 2.5rem;
            width: 40%;
            height: 70%;

        }
        .rightimg img{
            float: right;
            position: relative;
            margin-right: 1.5rem;
            margin-top: 2.5rem;
            width: 40%;
            height: 70%;
        }
        .middle{
            border: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            margin: auto;
            width: 35%;
            height: 75vh; 
            justify-content: center;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; 

        }
        .middle .second p{
            font-size: 2rem;
            font-weight: 600;
            
        }
        .middle .first  img{
            width: 40%;
        }
        .middle .third p{
            font-size: 1.6rem;
        }
        .middle .forth p{
            font-size: 1.4rem;
        }
        .middle .forth{
            position: relative;
          display: flex;
          
            background: rgb(0,120,212);
            border-radius: 15px;
            width: 50%;
            height: 3.5rem;
            left: 20%;
            box-shadow: 2px 3px 2px 2px;
        
          
           
             
        }
        .forth .text {
            display: flex;
            position: relative;
            text-align: center;
            justify-content: center;
            align-items: center;
            margin-left: 2.6rem;
            margin-bottom: 0.4rem;
            text-transform: capitalize;
        }
        .middle .forth:hover{
            background: #6189c4

        }
        .middle .text a{
            text-decoration: none;
            color: white;
        }
        .middle .fifth p{
            font-size: 1.2rem;
   
        }
        .middle .fifth a {
            text-decoration: none;
            color: black;
            font-size: 1.4rem;
        }
        .middle .fifth a:hover{
            
             text-decoration: underline;
        }
        .first{
            width: 100%;
            height: 300px;
        }
        .first p img{
            /* border: 1px solid red; */
            width:100%
            /* height:400px; */
        }
        #iconimg{
            width: 70%;
        }

    </style>
    <title>Get Started</title>
</head>
<body>
    <div class="container">
        
        <div class="leftimg">
            <img src="images/welcome-left.png" alt="">
        </div>

        <div class="middle">

            <div class="first"> 
                <p ><img src="./images/homeicon.jpg" id="iconimg" alt=""></p></div>
            <div class="second"> 
                <p> PP's To-DO List</p>  </div>
            <div class="third"> 
                <p id="list">To Do gives you focus, from <br>work to play.</p></div>
            <div class="forth">
               <div class="text"> <p> <a href="loginAndSignup/login.php"> Get Started  </a></p></div>
            </div>
            <div class="fifth">
                <p><a href="#">learn more</a></p>
            </div>
        </div>

        <div class="rightimg">
            <img src="images/welcome-right.png" alt="">
        </div>

    </div>
</body>
</html>