<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/UserRouter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/UserService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/user/UserRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/SingletonConnection.php';

$service = new UserService(
    new UserRepository(SingletonConnection::connection())
);
$router = new UserRouter($service);
$current = $service->current();
$router->handle();