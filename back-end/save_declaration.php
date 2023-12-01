<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $start_date = $_POST['start_date'];
    $day = $_POST['day'];
    $month_year = $_POST['month_year'];
    $app_name = $_POST['app_name'];
    $phy_address = $_POST['phy_address'];
    $phone = $_POST['phone'];
    $app_nrc = $_POST['app_nrc'];
    $sign = $_POST['sign'];

    // Prepare and bind the statement
    $stmt = $conn->prepare("INSERT INTO declaration (user_id, app_name, phy_address, phone, app_nrc, start_date, day, month_year, sign) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssss", $user_id, $app_name, $phy_address, $phone, $app_nrc, $start_date, $day, $month_year, $sign);

    // Execute the statement
    if ($stmt->execute()) {
        echo 1; // Success
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid Request";
}
