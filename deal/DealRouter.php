<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/Router.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/autoshop/deal/DealService.php';
class DealRouter extends Router
{
    private DealService $service;

    public function __construct(DealService $service)
    {
        $this->service = $service;
    }

    public function handle(string $route = null): mixed
    {
        if (null == $route)
        {
            $route = $this->route();
        }
        return match($route)
        {
            'index' => $this->service->deals(),
            'create' => $this->service->create(),
            'edit' => $this->service->edit(),
            'delete' => $this->service->delete(),
            'change-picture' => $this->service->changePicture(),
            default => 'not found',
        };
    }
}