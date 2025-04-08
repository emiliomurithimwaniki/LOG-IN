<?php
$to = "emiliomurrithi4@gmail.com";
$subject = "Test Email";
$message = "This is a test email from PHP.";
$headers = "From: no-reply@ytravel.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
