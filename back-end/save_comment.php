<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION['login_id'])) {
        $user_id = $_SESSION['login_id'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments (user_id, comment) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $user_id, $comment);

        if ($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    } else {
        echo 0;
    }
} else {
    echo 0;
}
