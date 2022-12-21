<?php

class AuthUser
{
    private string $email;
    private string $password;

    /**
     * @param array $params the POST.
     */
    public function __construct(array $params) {
        $this->email = $params['email'];
        $this->password = $params['password'];
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): array|string {
        return $this->password;
    }
}