<?php

namespace App;

class UserManager {
    private $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function notify(User $user) {
        $this->mailer->sendEmail($user->getEmail());
    }
}