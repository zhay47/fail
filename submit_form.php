<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both title and body are set and not empty
    if (isset($_POST["title"]) && isset($_POST["body"]) && !empty($_POST["title"]) && !empty($_POST["body"])) {
        // Sanitize inputs to prevent injection
        $title = htmlspecialchars($_POST["title"]);
        $body = htmlspecialchars($_POST["body"]);
        
        // Here you can do further processing with the submitted data
        // For example, you can save it to a database, send it via email, etc.
        
        // Example: Saving to a file
        $file = 'messages.txt'; // File to store messages
        $current = file_get_contents($file); // Get current content of the file
        $current .= "Title: $title\nBody: $body\n\n"; // Append new message
        file_put_contents($file, $current); // Write content back to the file
        
        // Redirect to a thank you page or any other desired page
        header("Location: thank_you.html");
        exit();
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
?>
