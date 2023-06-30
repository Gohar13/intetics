<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Model;

class User implements UserInterface
{
    private int $id;
    private string $email;
    private string $phoneNumber;

    public function __construct(
        int $id,
        string $email,
        string $phoneNumber
    ) {
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
}