// action_page.php file
// dont forget to download composer here https://getcomposer.org/download/ and phpmailer here https://github.com/PHPMailer/PHPMailer

<?php
require 'vendor/autoload.php';

$mail = new PHPMailer;

if(isset($_POST['submit'])){
    $name = $_POST['Nome'];
    $email = $_POST['Email'];
    $subject = $_POST['Assunto'];
    $message = $_POST['Mensagem'];
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'postmaster@mg.colabtecsol.com.br';                 // SMTP username
    $mail->Password = 'e1f1d1ca2f688308b3989597fe671097-b892f62e-31878b83';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom( $email , $name );
    $mail->addAddress('colabtecsol@gmail.com', 'Colab Tecsol');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Mensagem do site' + $subject;
    $mail->Body    = $name<br> + <br>$email<br> + <br>$message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        header("Location: /error.html");
    } else {
        header("Location: /thankyou.html");
    }
}

?>