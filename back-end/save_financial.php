<?php
session_start();

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $decision = $_POST['decision'];
    $feedback = $_POST['feedback'];
    $comment = $_POST['comment'];
    $bank_id = $_POST['bank_id'];
    $branch = $_POST['branch'];
    $branch_code = $_POST['branch_code'];
    $swift_code = $_POST['swift_code'];
    $acc_number = $_POST['acc_number'];
    $tpin_number = $_POST['tpin_number'];
    $mm_wallet = $_POST['mm_wallet'];

    // Handling multiple checkboxes
    $any_training = isset($_POST['any_training']) ? implode(', ', $_POST['any_training']) : '';

    $total_members = $_POST['total_members'];
    $org_name = $_POST['org_name'];
    $training_duration = $_POST['training_duration'];


    // Insert data into the bank_details table using prepared statement
    $query = "INSERT INTO bank_details (user_id, decision, feedback, comment, bank_id, branch, branch_code, swift_code, acc_number, tpin_number, mm_wallet, any_training, total_members, org_name, training_duration) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, 'isssisssissssss', $user_id, $decision, $feedback, $comment, $bank_id, $branch, $branch_code, $swift_code, $acc_number, $tpin_number, $mm_wallet, $any_training, $total_members, $org_name, $training_duration);

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
