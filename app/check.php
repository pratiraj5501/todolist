<?php

if (isset($_POST['id'])) {
    require '../db_conn.php';

    $id = $_POST['id'];
    $userId = $_POST['user_id'];

    if (empty($id)) {
        echo 'error';
    } else {
        $uChecked = 1;
        $todos = $conn->prepare("UPDATE active_tasks SET status=$uChecked WHERE id=?");
        $todos->execute([$id]);


        if ($todo) {
            echo 1;
        } else {
            echo 'error';
        }
        $conn = null;

        exit();
    }
} else {
    header("Location: ../todo.php?mess=error");
}