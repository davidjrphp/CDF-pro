<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("connection.php");

    // Get the user ID from the session
    if (isset($_SESSION['login_id'])) {
        $user_id = $_SESSION['login_id'];
    }

    // Check if the user ID is available
    if (!empty($user_id)) {
        $decision = $_POST["decision"];
        $feedback = isset($_POST["feedback"]) ? $_POST["feedback"] : '';

        // Prepare and execute the SQL query to update the application table
        $sql = "UPDATE applications SET feedback = ?, decision = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssi", $feedback, $decision, $user_id);
            if ($stmt->execute()) {
                echo "1";
            } else {
                echo "0";
            }
            $stmt->close();
        } else {
            echo "0";
        }

        $conn->close();
    } else {
        echo "0";
    }
} else {
    echo "0";
}
