<?php

declare(strict_types=1);

namespace Framework;

class Router
{

    private array $routes = [];

    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);
        //$regexPath = preg_replace('#{[^/]+}#', '([^/]+)', $path);
        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }

    public function dispatch(string $path, string $method)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);
        
        foreach ($this->routes as $route) {

            if (preg_match("#^{$route['path']}$#", $path) || $route['method'] !== $method) {
                continue;
            }
            [$class, $function] = $route['controller'];
            $controllerInstance = new $class;
            $controllerInstance->{$function}();
            /*
            array_shift($paramValues);
      
            preg_match_all('#{([^/]+)}#', $route['path'], $paramKeys);
      
            $paramKeys = $paramKeys[1];
      
            $params = array_combine($paramKeys, $paramValues);
      
            [$class, $function] = $route['controller'];
      
            $controllerInstance = $container ?
              $container->resolve($class) :
              new $class;
      
            $action = fn () => $controllerInstance->{$function}($params);
      
            $allMiddleware = [...$route['middlewares'], ...$this->middlewares];
      
            foreach ($allMiddleware as $middleware) {
              $middlewareInstance = $container ?
                $container->resolve($middleware) :
                new $middleware;
              $action = fn () => $middlewareInstance->process($action);
            }
      
            $action();
            return;
            */
        }
    }
}
