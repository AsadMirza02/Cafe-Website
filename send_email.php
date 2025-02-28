<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["full_name"]);
    $email = htmlspecialchars($_POST["email_address"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "dannyscafe24@gmail.com"; // Replace with your actual email
    $subject = "Danny's Cafe: New Message from $name";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $fullMessage = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Failed to send message. Please try again later.";
    }
}
?>
