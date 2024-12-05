<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form method="POST" action="">
        <label>Name:</label><input type="text" name="name" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Phone:</label><input type="text" name="phone"><br>
        <label>Course:</label><input type="text" name="course"><br>
        <button type="submit">Add Student</button>
    </form>
</body>
</html>
