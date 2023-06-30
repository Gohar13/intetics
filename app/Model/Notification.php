<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Model;

use Intetics\MvcTask\Service\Notifier\NotificationDeliveryInterface;

class Notification
{
    /**
     * @param UserInterface[] $users
     */
    private array $users;

    /**
     * @param NotificationDeliveryInterface[] $deliveryMethods
     */
    private array $deliveryMethods;

    public function __construct()
    {
        $this->users = [];
        $this->deliveryMethods = [];
    }

    public function addUser(User $user): void
    {
        $this->users[] = $user;
    }

    public function addDeliveryMethod( NotificationDeliveryInterface $deliveryMethod): void
    {
        $this->deliveryMethods[] = $deliveryMethod;
    }

    public function sendNotifications(string $message): void
    {
        foreach ($this->users as $user) {
            $this->sendNotificationToUser($user, $message);
        }
    }

    private function sendNotificationToUser(User $user,string $message): void
    {
        foreach ($this->deliveryMethods as $deliveryMethod) {
            $deliveryMethod->sendNotification($user, $message);
        }
    }

}