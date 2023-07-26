<?php

if (isset($_POST['id'])) {
    require_once '../db_conn.php';

    $id = $_POST['id'];

    if (empty($id)) {
        echo 0;
    } else {
        $stmt = $conn->prepare("DELETE FROM active_tasks WHERE id=?");
        $res = $stmt->execute([$id]);

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
        $conn = null;
        exit();
    }
} else {
    header("Location: ../todo.php?mess=error");
}