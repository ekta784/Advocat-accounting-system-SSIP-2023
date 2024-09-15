<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $text = $_POST["remark"];

    $to_email = $email;
    $subject = "Simple Email Test via PHP";
    $body = $text;
    $headers = "From: yashshah28072004@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}
}
?>