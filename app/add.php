<?php

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];
    $expDate = $_POST['expDate'];

    if(empty($title)){
        header("Location: ../todo.php?mess=error");
    }else {
        $stmt = $conn2->prepare("INSERT INTO todos(title,end_date) VALUE(?,?)");
        $res = $stmt->execute([$title,$expDate]);

        
            header("Location: ../todo.php?mess=success"); 
        $conn2 = null;
        exit();
    }
}