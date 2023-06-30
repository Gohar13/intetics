<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Service\Notifier\Sms;

use Intetics\MvcTask\Model\User;
use Intetics\MvcTask\Service\Notifier\NotificationDeliveryInterface;

interface SmsDeliveryInterface extends NotificationDeliveryInterface
{
    public function sendSms(User $user, $message);
}