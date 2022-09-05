<?php
$name= filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
$email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$phone =filter_input(INPUT_POST,'phone',FILTER_SANITIZE_SPECIAL_CHARS);
$website = filter_input(INPUT_POST,'website',FILTER_SANITIZE_SPECIAL_CHARS);
$message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);

if(!empty($email) && !empty($message) && !empty($name)) {
    $receiver = "ibn4022@gmail.com";
    $subject = "From: $name <$email>";
    $body = "Name:$name\nEmail:$email\nPhone:$phone\nWebsite:$website\n\nMessage:$message\n\nRegards,\n$name";
    $sender = "From: $email";

    if(mail($receiver,$subject,$body,$sender)) {
        echo "message sent successfully 🥰";
    } else {
        echo "message failed to send";
    }

}else {
    echo "Email and Message field are required!";
}
?>