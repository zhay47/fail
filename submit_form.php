<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $body = $_POST["body"];

    // Email address to send the form submission
    $to = "help@voltb.org";
    $subject = "New Form Submission - Volt";
    $message = "Title: $title\n\nMessage: $body";

    // Send email
    if (mail($to, $subject, $message)) {
        echo "<p>Your message has been sent successfully. We'll get back to you shortly.</p>";
    } else {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
} else {
    echo "<p>Access denied.</p>";
}
?>
