<?php
session_start();
require_once 'db_conn.php';
if (!isset($_SESSION['user'])) {
    session_destroy();
    Redirect('loginAndSignup/login.php');
}
$userId = $_SESSION['user_id'];
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
    <link rel="stylesheet" href="./css/style.css">
    <title>TO-DO List</title>
</head>
<style>
    .uname p{
        margin-top: 3%;
        margin-right: 150px;
        margin-bottom: 0px;
        font-size: 20px;
        color:black;
        font-style: italic;
    }
    .dropbtn{
       
        float: right;
        margin-top: -7%;
    }
    .dropdown-content {
        margin-top: 8%;
        margin-left: 65%;
        float: right;
        color:blue

    }
    .checked{
        width: 100%;
    }

     
</style>

<body>
    <div class="main_Container">

        <div class="header">
            <div class="img_Container">
                <img src="./images/todo.png" alt="">
            </div>
            <!-- <div  class="space0" >  <h2> helo</h2> </div>
            <div class="space1" ></div>
            <div class="space1" ></div> -->
            <div class="username">
                
            </div>
            <div class="dropdown">
                <div class="uname">  
            <p>
                    <?php echo $_SESSION['user']; ?>
                </p>
                </div>
                <button class="dropbtn">Options</button>
                <div class="dropdown-content">
                    <!-- <a href="#">Link 1</a> -->
                    <a href="completedTasks.php">Completed Tasks</a>
                    <a href="./loginAndSignup/login.php?state=logout">Logout</a>
                </div>

            </div>
        </div>
        <div class="main-section">
            <div class="add-section">
                <form action="app/add.php" method="POST" autocomplete="off">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                        <input type="text" name="title" style="border-color: #ff6666"
                            placeholder="This field is required" />
                        <input type="hidden" hidden value="<?php echo $userId; ?>">
                        <input min="<?php echo date('Y-m-d'); ?>"  type="date" name="expDate">
                        <button type="submit">Add &nbsp; <span>&#43;</span></button>

                    <?php } else { ?>
                        <input type="text" name="title" placeholder="What do you need to do?" />
                        <input type="hidden" hidden name="user_id" value="<?php echo $userId; ?>">
                        <input min="<?php echo date('Y-m-d'); ?>" type="date" name="expDate">
                        <button type="submit">Add &nbsp; <span>&#43;</span></button>
                    <?php } ?>
                </form>
            </div>
            <?php
            $todos = $conn->query("SELECT * FROM active_tasks WHERE user_id='$userId' and status=0 ORDER BY end_date ASC;");
            ?>
            <div class="show-todo-section">
                <?php if ($todos->rowCount() <= 0) { ?>
                    <div class="todo-item">
                        <div class="empty">
                            <img src="img/f.png" width="100%" />
                            <img src="img/Ellipsis.gif" width="80px">
                        </div>
                    </div>
                <?php } ?>

                <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="todo-item">
                        <span id="<?php echo $todo['id']; ?>" class="remove-to-do">x</span>
                        <?php if ($todo['status']) { ?>
                            <input type="checkbox" class="check-box" data-todo-id="<?php echo $todo['id']; ?>" checked />
                            <h2 class="checked">
                                <?php echo $todo['title']; ?>
                            </h2>
                        <?php } else { ?>
                            <input type="checkbox" 
                                data-todo-id="<?php echo $todo['id']; ?>" class="check-box" />
                            <h2>
                                <?php echo $todo['title']; ?>
                            </h2>
                        <?php } ?>
                        <br>
                        <small>Created:
                            <?php echo $todo['date_time']; ?>
                        </small>
                        <?php if ($todo['end_date'] != null) { ?>
                            <small>Expires On:
                                <?php echo $todo['end_date']; ?>
                            </small>
                        <?php } ?>
                        <small>Expires:
                            <?php $endDate = $todo['end_date'];
                            $earlier = new DateTime();
                            $later = new DateTime($endDate);
                            $pos_diff = $earlier->diff($later)->format("%r%a");
                            if ($pos_diff == 0) {
                                $pos_diff = "Today"; ?>
                                <span style="color:red;">
                                    <?= $pos_diff ?>
                                </span>
                                <?php 
                            }
                             else { ?>
                                <span style="color:red;">
                                    <?= $pos_diff . ' days left' ?>
                                </span>
                            <?php } ?>
                        </small>
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
                             $(this).parent().hide(600);
                         }
                      }
                );
            });
        });
    </script>
</body>

</html>