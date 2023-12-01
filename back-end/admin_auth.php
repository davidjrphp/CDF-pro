<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        include("connection.php");

        $hashedPassword = md5($password);

        $sql = "SELECT id, firstname, lastname, email, avatar FROM employee_list WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $email, $hashedPassword);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {

                session_start();

                // Fetch user information from the database
                $user = $result->fetch_assoc();

                // Store user information in the session
                $_SESSION['login_id'] = $user['id'];
                $_SESSION['login_firstname'] = $user['firstname'];
                $_SESSION['login_lastname'] = $user['lastname'];
                $_SESSION['login_email'] = $user['email'];
                $_SESSION['login_avatar'] = $user['avatar'];

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
