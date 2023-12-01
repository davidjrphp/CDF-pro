<?php
session_start();

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $district_id = $_POST['district_id'];
    $constituency_id = $_POST['constituency_id'];
    $app_type = $_POST['app_type'];
    $amount = $_POST['amount'];
    $ward = $_POST['ward'];
    $zone = $_POST['zone'];
    $phy_address = $_POST['phy_address'];
    $club_reg_date = $_POST['club_reg_date'];
    $decision = $_POST['decision'];
    $feedback = $_POST['feedback'];

    // Perform your checks and validation here

    // Insert data into the applications table using prepared statement
    $query = "INSERT INTO applications (user_id, app_type, amount, district_id, ward, zone, constituency_id, phy_address, feedback, decision, club_reg_date) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die('Error preparing statement: ' . mysqli_error($conn));
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'issississss', $user_id, $app_type, $amount, $district_id, $ward, $zone, $constituency_id, $phy_address, $feedback, $decision, $club_reg_date);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo 1; // Success
    } else {
        echo 0; // Error
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid Request";
}
