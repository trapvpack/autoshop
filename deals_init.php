<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealRouter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealService.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/SingletonConnection.php';

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