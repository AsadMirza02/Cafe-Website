<?php
include 'db_connect.php';  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Match these to the 'name' attributes in the HTML form
    $name = isset($_POST['full_name']) ? $conn->real_escape_string($_POST['full_name']) : '';
    $email = isset($_POST['email_address']) ? $conn->real_escape_string($_POST['email_address']) : '';
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';

    // Validate that none of the fields are empty
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Insert into the database
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully! <a href='index.html'>Go back</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All fields are required. <a href='index.html'>Go back</a>";
    }

    $conn->close();  // Close the database connection
}
?>
