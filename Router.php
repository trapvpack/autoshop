<?php

abstract class Router {
    public abstract function handle(string $route = null): mixed;

    protected function route(): string {

        $request = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
        return trim($request, '/');
        echo $request;
    }

}