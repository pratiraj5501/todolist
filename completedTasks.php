<?php
session_start();
// require_once 'db_scripts/connection.php';
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
    .username{
        margin-top: 1%;
        margin-right: -63%;
        margin-bottom: 0px;
        color:black;
        color: black;
        font-size: 18px;
        font-style: italic;
        color: black;
    }
</style>

<body>
    <div class="main_Container">

        <div class="header">
            <div class="img_Container">
                <img src="./images/todo.png" alt="">
            </div>
            <div class="username">
                <p>
                    <?php echo $_SESSION['user']; ?>
                </p>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Options</button>
                <div class="dropdown-content">
                    <!-- <a href="#">Link 1</a> -->
                    <a href="todo.php">Home</a>
                    <a href="./loginAndSignup/login.php?state=logout">Logout</a>
                </div>

            </div>

        </div>
        <div id="title">
        <h1 style="text-align:center;color:white;text-decoration:underline;margin-top:20px;">Completed Tasks</h1>
        </div>

        <div class="main-section">
        <?php
            $todos = $conn->query("SELECT * FROM active_tasks WHERE user_id='$userId' and status=1 ORDER BY end_date ASC;");
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
                        <?php if ($todo['status']) { ?>
                            <h2 class="check-box">
                                <?php echo $todo['title']; ?>
                            </h2>
                        <?php } else { ?>
                                <?php echo $todo['title']; ?>
                            </h2>
                        <?php } ?>
                        <br>
                        <small>Created:
                            <?php echo $todo['date_time']; ?>
                        </small>
                        <small style="color:blue;">Completed:
                        </small>
                    </div>
                <?php } ?>
            </div>
        </div>

</body>

</html>