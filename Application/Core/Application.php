<?php

namespace MVC\Core;

use Exception;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR     = $rootPath;
        self::$app          = $this;
        $this->request      = new Request();
        $this->response     = new Response();
        $this->router       = new Router($this->request, $this->response);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        }catch (Exception $e){
            $this->response->setStatusCode($e->getCode());
            echo $e->getMessage();
        }
    }
}