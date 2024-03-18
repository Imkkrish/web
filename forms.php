<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = "MySQL123"; // Your MySQL password
$dbname = "KRISH"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

// Prepare SQL statement
$sql = "INSERT INTO your_table_name (name, city, pincode) VALUES (?, ?, ?)";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $city, $pincode);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
