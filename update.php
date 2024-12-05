<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Student</title>
</head>
<body>
    <h1>Update Student</h1>
    <form method="POST" action="">
        <label>Name:</label><input type="text" name="name" value="<?= $student['name']; ?>" required><br>
        <label>Email:</label><input type="email" name="email" value="<?= $student['email']; ?>" required><br>
        <label>Phone:</label><input type="text" name="phone" value="<?= $student['phone']; ?>"><br>
        <label>Course:</label><input type="text" name="course" value="<?= $student['course']; ?>"><br>
        <button type="submit">Update Student</button>
    </form>
</body>
</html>
