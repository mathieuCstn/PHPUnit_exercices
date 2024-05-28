<?php

namespace App;

class Mailer {
    public function sendEmail($email) {
        // Ici, vous pourriez utiliser une bibliothèque comme PHPMailer ou SwiftMailer
        // pour envoyer un email. Pour cet exemple, nous allons simplement simuler
        // l'envoi d'un email.
        echo "Email sent to $email";
    }
}