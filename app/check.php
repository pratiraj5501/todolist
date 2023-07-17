<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id'];
    $userId = $_POST['user_id'];

    if(empty($id)){
       echo 'error';
    }else {
        $todos = $conn->prepare("SELECT * FROM active_tasks WHERE id=? AND user_id='$userId'");
        $todos->execute([$id]);

        $todo = $todos->fetch();
        $uId = $todo['id'];
        $checked = $todo['status'];
        $title = $todo['title'];
        $uChecked = $checked ? 0 : 1;

        $res = $conn->query("UPDATE `active_tasks` SET status=$uChecked WHERE id=$uId");
        $move = $conn->query("INSERT INTO `completed_task` VALUES('$userId','$title')");
        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../todo.php?mess=error");
}