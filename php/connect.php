<?php
$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli("192.168.254.108", "root", "", "ict");

if ($conn->connect_error) {
    die('Failed to connect: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT * FROM ictuser WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();

        if ($data['password'] === $password) {
            header("Location: /UR1/PrevMntnc/upd/index.html");
            exit;
        } else {
            echo "<h2>Invalid Username or Password</h2>";
        }
    } else {
        echo "<h2>Invalid Username or Password</h2>";
    }
}
?>
