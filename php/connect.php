<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "ict");

    if ($conn->connect_error) {
        die('Failed to connect: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM ictuser WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();

            if (password_verify($password, $data['password'])) {
                echo "<h2>Login Successful</h2>";
            } else {
                echo "<h2>Invalid Username or Password</h2>";
            }
        } else {
            echo "<h2>Invalid Username or Password</h2>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
?>
