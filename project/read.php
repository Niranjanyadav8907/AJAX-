<?php
include 'db.php';

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row['id']."</td>
            <td>".htmlspecialchars($row['username'])."</td>
            <td>".htmlspecialchars($row['email'])."</td>
            <td>
                <button onclick='editUser(".$row['id'].")'>Edit</button>
                <button onclick='deleteUser(".$row['id'].")'>Delete</button>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No users found.</td></tr>";
}

$conn->close();
?>
l;''?:.l,.;/'/'.;