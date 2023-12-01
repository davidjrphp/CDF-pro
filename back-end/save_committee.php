<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $staff_id = $_POST['staff_id'];
    $decision_1 = $_POST['decision_1'];
    $reasons_1 = $_POST['reasons_1'];
    $chair_name = $_POST['chair_name'];
    $sign_2 = $_POST['sign_2'];

    $stmt = $conn->prepare("INSERT INTO cdf_committee (user_id, staff_id, chair_name, decision_1, reasons_1, sign_2) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iissss", $user_id, $staff_id, $chair_name, $decision_1, $reasons_1, $sign_2);

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
