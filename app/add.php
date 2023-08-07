<?php

if (isset($_POST['title'])) {
    require '../db_conn.php';

    $title = $_POST['title'];
    $expDate = $_POST['expDate'];
    $userId = $_POST['user_id'];
    $isDated = $expDate==null ? 0:1;


    if (empty($title)) {
        header("Location: ../todo.php?mess=error");
    } else if ($expDate == null) {
        $stmt = $conn->prepare("INSERT INTO active_tasks(user_id,title) VALUE(?,?)");
        $res = $stmt->execute([$userId,$title]);
        header("Location: ../todo.php?mess=success");
        $conn = null;
        exit();

    } else {
        $stmt = $conn->prepare("INSERT INTO active_tasks(user_id,title,is_dated,end_date) VALUE(?,?,?,?)");
        $res = $stmt->execute([$userId,$title,$isDated,$expDate]);


        header("Location: ../todo.php?mess=success");
        $conn = null;
        exit();
    }
}