<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "voli_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $position = $_POST['position'];

    // Insert data into the database
    $sql = "INSERT INTO pendaftar (name, email, phone, gender, date_of_birth, position) 
            VALUES ('$name', '$email', '$phone', '$gender', '$date_of_birth', '$position')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the main page after success
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>Tambah Pendaftar</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Tambah Data Pendaftar</h2>
            <form method="POST" action="create.php">
                <label for="name">Nama:</label>
                <input type="text" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br>

                <label for="phone">Telepon:</label>
                <input type="text" name="phone" required><br>

                <label for="position">Posisi di Tim:</label>
                <select name="position" required>
                    <option value="Setter">Setter</option>
                    <option value="Libero">Libero</option>
                    <option value="Outside hitter">Outside hitter</option>
                    <option value="Opposite hitter">Opposite hitter</option>
                    <option value="Middle blocker">Middle blocker</option>
                </select><br>

                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select><br>

                <label for="date_of_birth">Tanggal Lahir:</label>
                <input type="date" name="date_of_birth" required><br>

                <button type="submit">Tambah</button>
                <a href="index.php" class="btn-cancel">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
