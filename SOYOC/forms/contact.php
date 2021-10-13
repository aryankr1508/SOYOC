<?php
$successSent = true;
if (
    !empty($_POST["name"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["message"]) && 
    !empty($_POST["subject"])
) {
    $to = 'soyocofficial@gmail.com';
    $from = $_POST["email"];
    $user_email = $from;
    $subject = $_POST['subject'];
    // var_dump($_POST);
    // die();
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $user_email . "\r\n" .
        'Reply-To: ' . $user_email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<p style="color:#f40;">';
    $message .= $_POST["name"];
    $message .= $_POST["message"];
    $message .= '</p>';
    $message .= '</body></html>';
    //var_dump($message);
    // Sending email
    if (mail($to, $subject, $message, $headers)) {
      echo ('Message send with success');
    } else {
        die( 'Unable to load the "PHP Email Form" Library!');
    }
}
