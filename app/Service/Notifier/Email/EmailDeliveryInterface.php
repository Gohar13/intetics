<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Service\Notifier\Email;

use Intetics\MvcTask\Service\Notifier\NotificationDeliveryInterface;
use Intetics\MvcTask\Model\User;

interface EmailDeliveryInterface extends NotificationDeliveryInterface
{
    public function sendEmail(User $user, $message);
}