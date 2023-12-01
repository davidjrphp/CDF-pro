<?php
session_start();

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $problems = $_POST['problems'];
    $prob_address = $_POST['prob_address'];
    $proj_identity = $_POST['proj_identity'];
    $proj_benefit = $_POST['proj_benefit'];
    $direct_jobs = $_POST['direct_jobs'];


    $query = "INSERT INTO project_identity (user_id, problems, prob_address, proj_identity, proj_benefit, direct_jobs) 
              VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die('Error preparing statement: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'issssi', $user_id, $problems, $prob_address, $proj_identity, $proj_benefit, $direct_jobs);

    if (mysqli_stmt_execute($stmt)) {
        echo 1;
    } else {
        echo 0;
    }
    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Invalid Request";
}
