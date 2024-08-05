<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

    <?php
  // Set your email address here
  <?php
  // Set your email address here
  $receiving_email_address = 'ibrah23g@mtholyoke.edu';

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get form data
      $name = $_POST['name'] ?? '';
      $email = $_POST['email'] ?? '';
      $subject = $_POST['subject'] ?? '';
      $message = $_POST['message'] ?? '';

      // Prepare email content
      $email_content = "You have received a new message from your website contact form.\n\n";
      $email_content .= "Name: $name\n";
      $email_content .= "Email: $email\n";
      $email_content .= "Subject: $subject\n";
      $email_content .= "Message:\n$message\n";

      // Set email headers
      $headers = "From: $email\r\n";
      $headers .= "Reply-To: $email\r\n";
      $headers .= "X-Mailer: PHP/" . phpversion();

      // Send email
      if (mail($receiving_email_address, "New Contact Form Submission: $subject", $email_content, $headers)) {
          echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);
      } else {
          echo json_encode(['status' => 'error', 'message' => 'Unable to send email. Please try again later.']);
      }
  } else {
      echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
  }
  ?>