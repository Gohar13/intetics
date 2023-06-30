<?php

declare(strict_types=1);

namespace Intetics\MvcTask\Core;

class Route {

    /**
     * @throws \Exception
     */
    public function __construct(string $uri) {

        global $routes;

        $requestUrl = strtok($uri, '?');

        if (array_key_exists($requestUrl, $routes)) {
            $route = $routes[$requestUrl];

            $method = $_SERVER['REQUEST_METHOD'];

            if (!array_key_exists($method, $route)) {
                throw new \Exception('Method not allowed.');
            }

            [$controllerName, $methodName] = explode('@', $route[$method]);

            $controllerName = '\\Intetics\\MvcTask\\Controller\\' . $controllerName;

            if (!class_exists($controllerName)) {
                throw new \Exception(sprintf('Class %s not found.', $controllerName));
            }

            if (!method_exists($controllerName, $methodName)) {
                throw new \Exception(sprintf('Method %s not found.', $methodName));
            }

            $controller = new $controllerName();
            $controller->$methodName($_REQUEST);

        } else {

            header("HTTP/1.0 404 Not Found");
            echo '404 Not Found';
        }
    }
}