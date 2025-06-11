<?php
// Database configuration
$host = 'localhost';
$dbname = 'webpage';
$username = 'root'; // change if needed
$password = '1234';     // change if needed (e.g., 'root' or your MySQL password)
// Connect to MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST requeste
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    

    // Validate fields
    if (empty($name) || empty($email) || empty($password) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

     // No FILTER_VALIDATE_PASSWORD exists. You can check password rules manually if needed
    if (strlen($password) < 4) {
        echo "Password must be at least 4 characters long.";
        exit;
    }



    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO form (name, email, password, message) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $name, $email,$password ,$message);

    if ($stmt->execute()) {
        echo "Thank you, $name! Your message has been saved.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
