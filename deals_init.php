<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/autopshop/deal/DealRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autopshop/deal/DealRouter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autopshop/deal/DealService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autopshop/SingletonConnection.php';

$router = new DealRouter(
    new DealService(
        new DealRepository(
            SingletonConnection::connection()
        ),
        new CarRepository(
            SingletonConnection::connection()
        )
    )
);

if ($router->handle())
{
    header("Location: /autoshop/");
} else
{
    echo 'Something wrong';
    die();
}