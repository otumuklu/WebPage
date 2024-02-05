<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // File upload handling
    $file_name = $_FILES['attachment']['name'];
    $file_tmp = $_FILES['attachment']['tmp_name'];
    $file_type = $_FILES['attachment']['type'];
    
    // Move uploaded file to a permanent location
    move_uploaded_file($file_tmp, "uploads/" . $file_name);
    
    // Prepare email content
    $to = "ozgur_tumuklu@hotmail.com";
    $subject = "New Message from Contact Form";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n";
    
    // Set headers for email
    $headers = "From: $email\r\nReply-To: $email";
    
    // Attach the file to the email
    $file = "uploads/" . $file_name;
    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));
    $attachment = "Content-Type: application/octet-stream; name=\"$file_name\"\r\n";
    $attachment .= "Content-Disposition: attachment;\r\n\r\n";
    $attachment .= $content . "\r\n";
    
    // Send the email
    if (mail($to, $subject, $email_content, "$headers\r\n$attachment")) {
        echo "Your message has been sent successfully.";
    } else {
        echo "There was a problem sending your message.";
    }
}
?>

