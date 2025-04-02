<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['contact-name']));
    $email = htmlspecialchars(trim($_POST['contact-email']));
    $message = htmlspecialchars(trim($_POST['contact-message']));

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Set the recipient email address
    $to = "info@zenmarcsurveys.com"; // Change this to your desired email address

    // Set the email subject
    $subject = "New Contact Us Message from $name";

    // Set the email body
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Set the email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message. Please try again later.";
    }
}
?>
