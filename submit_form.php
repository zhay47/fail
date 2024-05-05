<?php
// Database connection
$servername = "localhost";
$username = "username"; // Your MySQL username
$password = "password"; // Your MySQL password
$dbname = "volt_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both title and body are set and not empty
    if (isset($_POST["title"]) && isset($_POST["body"]) && !empty($_POST["title"]) && !empty($_POST["body"])) {
        // Sanitize inputs to prevent injection
        $title = $conn->real_escape_string($_POST["title"]);
        $body = $conn->real_escape_string($_POST["body"]);
        
        // Insert data into database
        $sql = "INSERT INTO form_submissions (title, body) VALUES ('$title', '$body')";
        if ($conn->query($sql) === TRUE) {
            // Redirect to a thank you page or any other desired page
            header("Location: thank_you.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // If title or body is missing or empty, redirect back to the form page
        header("Location: contact.html");
        exit();
    }
} else {
    // If form is not submitted, redirect back to the form page
    header("Location: contact.html");
    exit();
}

// Close connection
$conn->close();
?>
