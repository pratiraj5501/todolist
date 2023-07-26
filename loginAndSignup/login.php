<?php
    if (isset($_GET['state'])) {
        session_start();
        session_destroy();
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .container{
            display: flex;

        }
        .leftdiv img{
         margin-top: 50px;
            width: 500px;
            
        }
        .rightdiv img{
            margin-top: 50px;
            margin-left:370px;
            width: 650px;
    
        }
        body{
            background-image: url("./images/icon.jpeg");
            margin: 0;
            padding: 0;
            font-family: montserrat;
            /* background: linear-gradient(120deg,#2980b9,#8e44ad); */
            height: 100vh;
           overflow: hidden;
        }
        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            background: white;
            border-radius: 12px;

            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; 
            
        }
        .center h1{
            text-align: center;
            padding:0 0 20px 0;
            border-bottom: 1px solid silver;
        }
        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }
        form .txt_field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }
        .txt_field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }
        .txt_field label{
            position: absolute;
            top:50%;
            left: 5px;;
             color: #adadad;
             transform: translateY(-50%);
             font-size: 16px;
            pointer-events: none;
             transition: .5s;
        }
        .txt_field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }
        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label{
            top: -5px;
            color: #2691d9;

        }
        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before{
     
            width: 100%;

        }
        .pass{
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }
        .pass a{
            color:#a6a6a6;
            text-decoration: none;
        }
        .pass a:hover{
            color:#2691d9;
            text-decoration: underline;
            font-size: 18px;
            transition: .8s;
        }
      .center input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2691d9;
            border-radius: 28px;
            font-size: 17px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;   
        }
        .signup_link{
            margin:  30px 0;
            text-align: center;
            font-size: 17px;
            color: #666666;

        }
        .signup_link a{
            color: #2691d9;
           font-size: 18px;
            text-decoration: none;
        }
        .signup_link a:hover{
            text-decoration: underline;
        }
        body img{
            opacity: 1;
        }
    </style>
    <title>Login</title>
</head>
<body>
<div class="container"> 

    <div class="leftdiv">
        <img src="../images/trial1.jpeg" alt="">
    </div>
    
    <div class="center">
        <h1>Login</h1>
        <?php
            if (isset($_GET['state']) and $_GET['state'] == "failed") {
                echo "<h1 style='color:red;'>Login Failed, Wrong Creds</h1>";
            }
            else if(isset($_GET['state']) and $_GET['state'] == "logout"){
                require_once '../db_scripts/connection.php';
                $query = "UPDATE `login_and_page_views` SET loginCount=loginCount-1;";
                $connn->query($query);
            } 
        ?>
        <form action="../db_scripts/userLogin.php" method="post">
                <div class="txt_field"> 
                    <input type="text" required name="username">
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" required name="password">
                    <span></span>
                    <label> Password</label>
                </div>
                <div class="pass"> <a href="forgotPassword.html" style="color:steelblue;">  Forgot password ?</a></div>
                <input type="submit" value="Login">
                <div class="signup_link">
                    Not a Member ? <a href="signUp.html">SignUp</a>
                </div>
                </form>
                </div>

    <div class="rightdiv">
        <img src="../images/trial3.jpeg" alt="">
    </div>
</div>  
</body>
</html>