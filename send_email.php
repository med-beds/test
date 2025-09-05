<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $message = htmlspecialchars($_POST['message']);
    
    // Prepare email content
    $to = "anothercreation0@gmail.com";
    $subject = "New Booking Request from $firstName $lastName";
    
    $email_body = "You have received a new booking request:\n\n";
    $email_body .= "Name: $firstName $lastName\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n";
    $email_body .= "Service: $service\n";
    $email_body .= "Preferred Date: $date\n";
    $email_body .= "Preferred Time: $time\n";
    $email_body .= "Message: $message\n";
    
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    $mail_success = mail($to, $subject, $email_body, $headers);
    
    // Redirect to thank you page
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
