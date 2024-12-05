<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Student Management System</title>
</head>
<body>
    <h1>Student Management System</h1>
    <a href="add.php" class="btn">Add New Student</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['course']}</td>
                        <td>
                            <a href='update.php?id={$row['id']}'>Edit</a> |
                            <a href='delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
