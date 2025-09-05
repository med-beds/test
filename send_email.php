<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $visitor_email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address (CHANGE THIS TO YOURS!)
    $to = "anothercreation0@gmail.com";

    // Set the email subject
    $subject = "New Contact Form Submission from $name";

    // Build the email content
    $email_body = "You have received a new message from your website contact form.\n\n".
                  "Name: $name\n".
                  "Email: $visitor_email\n".
                  "Phone: $phone\n".
                  "Message:\n$message\n";

    // Build the email headers
    $headers = "From: $visitor_email\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    // Send the email
    $mail_success = mail($to, $subject, $email_body, $headers);

    // Redirect to a thank you page
    if ($mail_success) {
        header('Location: thank_you.html');
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request, redirect to the form
    header('Location: index.html');
}
?>
