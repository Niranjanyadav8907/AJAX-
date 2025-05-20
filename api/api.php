<?php
header('Content-Type: application/json');
include 'db.php';

// GET 
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT id, username, email FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode(["status" => "success", "user" => $user]);
    } else {
        echo json_encode(["status" => "error", "message" => "User not found"]);
    }

    $conn->close();
    exit;
}

// ✅ अब POST method वाला part
$data = json_decode(file_get_contents("php://input"), true);

// अगर JSON नहीं है, तो $_POST से लो
if (!$data) {
    $data = $_POST;
}

if (isset($data['username']) && isset($data['password']) && isset($data['email'])) {
    $username = $conn->real_escape_string($data['username']);
    $password = $conn->real_escape_string($data['password']);
    $email = $conn->real_escape_string($data['email']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "User added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
}

$conn->close();
?>
