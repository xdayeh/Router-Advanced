<?php

namespace MVC\Core;

use Exception;

class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $route, $callback)
    {
        $this->routes['get'][$route] = $callback;
    }

    /**
     * @throws Exception
     */
    public function resolve()
    {
        $path       = $this->request->path();
        $method     = $this->request->method();
        $callback   = $this->routes[$method][$path] ?? false;

        if (!$callback){
            throw new Exception("Page Not Found", 404);
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}