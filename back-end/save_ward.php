<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $staff_id = $_POST['staff_id'];
    $decision_2 = $_POST['decision_2'];
    $reasons = $_POST['reasons'];
    $chair_name = $_POST['chair_name'];
    $sign_1 = $_POST['sign_1'];

    $stmt = $conn->prepare("INSERT INTO ward_committee (user_id, staff_id, chair_name, decision_2, reasons, sign_1) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iissss", $user_id, $staff_id, $chair_name, $decision_2, $reasons, $sign_1);

    if ($stmt === false) {
        die("Error binding parameters: " . $stmt->error);
    }

    if ($stmt->execute()) {
        echo "1";
    } else {
        echo "0";
    }

    $stmt->close();
    $conn->close();
}
