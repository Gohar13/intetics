<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Service\Notifier\Email;

use Intetics\MvcTask\Model\User;

class EmailDelivery implements EmailDeliveryInterface
{
    public function sendNotification(User $user, $message)
    {
        $this->sendEmail($user, $message);
    }

    public function sendEmail(User $user, $message)
    {
        $email = $user->getEmail();
        echo "<div class='alert alert-success' role='alert'>Sending e-mail notification to $email: $message</div>";
    }
}