<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome = $_POST['nome'];
		$email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        $assunto = $_POST['assunto'];
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\OAuth;
        use PHPMailer\PHPMailer\POP3;

        $php= require_once 'PHPMailer/src/PHPMailer.php' ;
        $Smtp = require 'PHPMailer/src/SMTP.php';
        $exception= require 'PHPMailer/src/Exception.php';
        $autoload= require 'PHPMailer/src/OAuth.php';
        $pop= require 'PHPMailer/src/POP3.php';

         if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
                 $mensagem = $_POST['mensagem'];
      }
      
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Charset ="UTF-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'renata.albuquerque.alves@gmail.com';
    $mail->Password = 'albuquerque1';
    $mail->Port = 587; 

    $mail->setFrom($email, $name);
    $mail->addAddress('cabelomeu.feedback@gmail.com');
    $mail ->addReplyTo($name,$email);
    $mail->isHTML(true);

    
    $mail->Body    = nl2br("<html>Nome: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
    $mail->AltBody = nl2br(strip_tags($mensagem));
    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    } else {
         header('Location: index.php?enviado');
    }
        ?>
    </body>
</html>
