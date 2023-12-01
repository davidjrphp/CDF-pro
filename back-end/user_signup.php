<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the password is not empty
    if (!empty($password)) {
        $hashedPassword = md5($password);

        include("connection.php");

        $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo "true";
            } else {
                echo "false";
            }

            $stmt->close();
        } else {
            echo "false";
        }

        $conn->close();
    } else {
        echo "false";
    }
} else {
    echo "false";
}
