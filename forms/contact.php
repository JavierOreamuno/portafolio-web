<?php

if($_POST) {
    $name= "";
    $email = "";
    $subject = "";
    $message = "";
    /* $visitor_message = ""; */
     
    if(isset($_POST['name'])) {
      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";

    $recipient = "javier.oreamuno15@gmail.com";
     
    if(mail($recipient, $name, $subject, $message, $headers)) {
        header("Location:  http://localhost/miportafolioweb/#contact");
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>