<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Controller;

use Intetics\MvcTask\Model\Notification;
use Intetics\MvcTask\Model\Post;
use Intetics\MvcTask\Model\User;
use Intetics\MvcTask\Service\Notifier\Email\EmailDelivery;
use Intetics\MvcTask\Service\Notifier\Sms\SmsDelivery;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $title = 'Home page';
        $_SESSION['token'] = md5(uniqid((string)mt_rand(), true));

        $this->render->view('home', compact('title'));
    }

    /**
     * @throws \Exception
     */
    public function formSubmit($request)
    {
        $textArea = $request['textarea'] ?? '';
        $token = $request['token'] ?? '';

        if (!$token || $token !== $_SESSION['token']) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
            exit;
        } else {
            $text = htmlspecialchars($textArea);
            $post = new Post($text);

            $post = $post->save();

            $user = new User(1, "user@example.com", "+374987654321");

            $notification = new Notification();

            $notification->addUser($user);

            $notification->addDeliveryMethod(new EmailDelivery());
            $notification->addDeliveryMethod(new SmsDelivery());

            $notification->sendNotifications($post->getText());

            $this->render->view('home', compact('post'));
        }
    }
}