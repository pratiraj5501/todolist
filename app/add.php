<?php

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn2->prepare("INSERT INTO todos(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../todo.php?mess=success"); 
        }else {
            header("Location: ../todo.php");
        }
        $conn2 = null;
        exit();
    }
}else {
    header("Location: ../todo.php?mess=error");
}