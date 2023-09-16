<?php

declare(strict_types=1);

namespace Framework;

class App
{

    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {

        //echo "Application is running";
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        echo $this->router->dispatch($path, $method);
    }

    public function get(string $path, array $controller)
    {

        $this->router->add('GET', $path, $controller);
    }
}
