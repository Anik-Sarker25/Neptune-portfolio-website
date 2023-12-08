<?php
session_start();
include('./config/db_connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('./src/PHPMailer.php');
include('./src/SMTP.php');
include('./src/Exception.php');

$mail = new PHPMailer(true);


if(isset($_POST['sender'])) {

    $name = $_POST['name'];
    $email_to = $_POST['email_to'];
    $message = $_POST['message'];

    $subject = "Welcome to our KUFA COMMUNITY!";
    $message_body = $message;


    if($name) {
        $_SESSION['name_value'] = $name;
    }else {
        $_SESSION['name_error'] = "Name is required!";
        header('location: ./index.php');
    }
    if($email_to) {
        $_SESSION['email_to_value'] = $email_to;
    }else {
        $_SESSION['email_to_error'] = "Email is required!";
        header('location: ./index.php');
    }
    if($message) {
        $_SESSION['message_value'] = $message;
    }else {
        $_SESSION['message_error'] = "Message is required!";
        header('location: ./index.php');
    }
    if($name && $email_to && $message) {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anikhasen25@gmail.com';                     //SMTP username
        $mail->Password   = 'rjsd rljf iszh lion';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($email_to, 'kufa community');
        $mail->addAddress('anikhasen25@gmail.com' , $name);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo($email_to, $name);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message_body.'</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();

        $insert_query = "INSERT INTO mails (name,email,message) VALUES('$name','$email_to','$message')";
        mysqli_query($db_connect, $insert_query);
        
        $_SESSION['send_success'] = "Message has been sent";
        header('location: index.php');
        

    }else {
        header('location: index.php');
    }
}


if(isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM mails WHERE id='$id'";
    mysqli_query($db_connect, $delete_query);
    header('location: ./dashboard/mail-list.php');
}


if(isset($_POST['reply'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $reply_message = $_POST['reply_message'];

    $subject = "Welcome to our KUFA COMMUNITY!";
    $message_body = $reply_message;

    if($reply_message) {
        
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'anikhasen25@gmail.com';                     //SMTP username
        $mail->Password   = 'rjsd rljf iszh lion';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($email, 'kufa community');
        $mail->addAddress($email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('anikhasen25@gmail.com');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message_body.'</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();

        // $insert_query = "INSERT INTO mails (name,email,message) VALUES('$name','$email_to','$message')";
        // mysqli_query($db_connect, $insert_query);
        
        $_SESSION['send_success'] = "Reply message has been sent";
        header('location: ./dashboard/mail-list.php');


    }else {
        $_SESSION['message_error'] = "Message is required!";
        header('location: ./dashboard/mail-reply.php');
    }
}




?>