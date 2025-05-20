<?php
include 'db.php';

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $username = htmlspecialchars($row['username']);
        $email = htmlspecialchars($row['email']);
        echo "<tr>
            <td>$id</td>
            <td>$username</td>
            <td>$email</td>
            <td>
                <button onclick='editUser($id)'>Edit</button>
                <button onclick='deleteUser($id)'>Delete</button>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No users found.</td></tr>";
}

$conn->close();
?>
