<?php
    session_start();
    require_once 'db_scripts/connection.php';
    require_once 'db_conn.php';
    if (!isset($_SESSION['user'])) {
        session_abort();
        Redirect('loginAndSignup/login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/14850a9668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/todos.css">
    <link rel="stylesheet" href="./css/classforjs.css">
    <link rel="stylesheet"href="./css/style.css">
    <title>TO-DO List</title>
</head>
<body>
        <div class="main_Container">

                <div class="header">
                    <div class="img_Container">
                        <img src="./images/todo.png" alt="">
                    </div>
                    <div class="username">
                        <p><?php echo $_SESSION['user'];?></p>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Options</button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="<?php session_abort(); echo 'loginAndSignup/login.html';?>">Logout</a>
                        </div>
                    </div> 
                </div>    
                <!-- followig is the task container -->
                <!-- <div class="task_Container">
                    
                    <div id="checkboxContainer"></div>
                    
                </div>

                <div class="userInput">
                    <form action="index.html" method="get">
                        
                        <input type="text" id="task" placeholder="Enter task here" name="title"> 
                        <input type="text" id="about" placeholder="enter Discription here">
                        <button id="erase">Erase</button> 
                        <button id="save" type="submit">Save</button>
    
                    </form>
                  


                </div>
        </div>
        <script src="./js/trial200.js"></script> -->
        <div class="main-section">
       <div class="add-section">
          <form action="app/add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
          $todos = $conn2->query("SELECT * FROM todos ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" width="100%" />
                        <img src="img/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">x</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.remove-to-do').click(function(){
                const id = $(this).attr('id');
                
                $.post("app/remove.php", 
                      {
                          id: id
                      },
                      (data)  => {
                         if(data){
                             $(this).parent().hide(600);
                         }
                      }
                );
            });

            $(".check-box").click(function(e){
                const id = $(this).attr('data-todo-id');
                
                $.post('app/check.php', 
                      {
                          id: id
                      },
                      (data) => {
                          if(data != 'error'){
                              const h2 = $(this).next();
                              if(data === '1'){
                                  h2.removeClass('checked');
                              }else {
                                  h2.addClass('checked');
                              }
                          }
                      }
                );
            });
        });
    </script>
</body>
</html>
