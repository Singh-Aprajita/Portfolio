<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = "";     // Default is empty
$dbname = "mybookstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form values
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO users (name, email, contact) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $contact);

// Execute
if ($stmt->execute()) {
  echo "Message received successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>