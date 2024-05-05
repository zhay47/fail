<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $title = $_POST["title"];
    $message = $_POST["body"];

    // Set up email parameters
    $to = "help@voltb.org";
    $subject = "New Contact Form Submission - Volt";
    $headers = "From: contact@voltb.org";
    
    // Construct email body
    $email_body = "Title: $title\n\n";
    $email_body .= "Message:\n$message";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "<p>Your message has been sent successfully. We'll get back to you shortly.</p>";
    } else {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
} else {
    // If the request method is not POST, deny access
    echo "<p>Access denied.</p>";
}
?>
