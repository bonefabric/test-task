<?php
declare(strict_types=1);

namespace Core;

use Core\Components\Router;

class Application
{

    /**
     * @var Router
     */
    private Router $router;

    /**
     * @var string
     */
    private string $controllerClass;

    /**
     * @var string
     */
    private string $controllerMethod;

    /**
     * @var string
     */
    private string $response;

    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * Инициализация
     * @return $this
     * @throws \Exception
     */
    public function boot(): self
    {
        $routeConfig = $this->router->match(trim($_SERVER['REQUEST_URI'], '/'), strtoupper($_SERVER['REQUEST_METHOD']));
        $this->controllerClass = $routeConfig['controller'];
        $this->controllerMethod = $routeConfig['method'];
        return $this;
    }

    /**
     * Обработка запроса
     * @return $this
     */
    public function start(): self
    {
        $controller = new $this->controllerClass();
        $this->response = call_user_func([$controller, $this->controllerMethod]);
        return $this;
    }

    /**
     * Завершение работы
     * @return void
     */
    public function finish(): void
    {
        echo $this->response ?? '';
    }
}
