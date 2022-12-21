<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/Router.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/UserService.php';
class UserRouter extends Router{

    private UserService $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function handle(string $route = null): mixed {
        if (null == $route) {
            $route = $this->route();
        }
        return match($route) {
            'auth' => $this->service->auth(),
            'registration' => $this->service->registration(),
            'logout' => $this->service->logout(),
            'current' => $this->service->current(),
            default => 'not found.',
        };
    }

}