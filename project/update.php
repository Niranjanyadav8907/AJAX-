<?php
include 'db.php';

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($password)) {
    $sql = "UPDATE users SET username=?, email=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, password_hash($password, PASSWORD_DEFAULT), $id);
} else {
    $sql = "UPDATE users SET username=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $email, $id);
}

echo $stmt->execute() ? "User updated successfully." : "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>
