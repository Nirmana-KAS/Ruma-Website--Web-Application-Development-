<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Replace these variables with your Gmail account credentials and the email address you want to receive the contact form submissions.
  $recipient_email = "dularapramod@gmail.com"; // Change this to your Gmail address
  $sender_name = $_POST["name"];
  $sender_email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Create the email headers
  $headers = "From: $sender_name <$sender_email>\r\n";
  $headers .= "Reply-To: $sender_email\r\n";
  $headers .= "Content-Type: text/html\r\n";

  // Send the email
  if (mail($recipient_email, $subject, $message, $headers)) {
    // If the email is sent successfully, redirect the user back to the contact form with a success message.
    header("Location: contact.html?success=1");
    exit;
  } else {
    // If there was an error sending the email, redirect the user back to the contact form with an error message.
    header("Location: contact.html?error=1");
    exit;
  }
}
?>
