<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Service\Notifier\Sms;

use Intetics\MvcTask\Model\User;

class SmsDelivery implements SmsDeliveryInterface
{
    public function sendNotification(User $user, $message)
    {
         $this->sendSms( $user, $message);
    }

    public function sendSms(User $user, $message)
    {
        $phone = $user->getPhoneNumber();

        echo "<div class='alert alert-success' role='alert'>Sending SMS notification to $phone: $message</div>";
    }
}