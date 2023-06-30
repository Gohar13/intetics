<?php

namespace Intetics\MvcTask\Service\Notifier;

use Intetics\MvcTask\Model\User;

interface NotificationDeliveryInterface
{
    public function sendNotification(User $user, $message);
}