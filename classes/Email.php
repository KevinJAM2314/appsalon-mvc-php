<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $subject = 'Confirma tu cuenta';
        $message = 'Has creado tu cuenta en App salon, solo debes confirmarlo presionando el siguiente enlace.';
        $link = 'confirmar-cuenta';
        
        $this->correoBase($subject, $message, $link);
    }

    public function enviarInstrucciones(){
        $subject = 'Reestablecer tu password';
        $message = 'Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.';
        $link = 'recuperar';
        
        $this->correoBase($subject, $message, $link);
    }

    private function correoBase($subject, $message, $link){
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = $subject;

        // Set HTML
        $mail->isHTML();
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> " . $message . "</p>";
        $contenido .= "<p> Presiona aqui: <a href='" . $_ENV['APP_URL']. "/". $link."?token=" . $this->token ."'>Confirmar cuenta</a> </p>";
        $contenido .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje </p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar  el mail
        $mail->send();
    }
}