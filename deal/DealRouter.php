<?php

class ItemRouter extends DealRouter
{

    private ItemService $service;

    public function __construct(ItemService $service)
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