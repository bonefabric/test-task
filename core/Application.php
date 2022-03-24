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

    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * Инициализация
     * @return $this
     */
    public function boot(): self
    {

        return $this;
    }

    /**
     * Обработка запроса
     * @return $this
     */
    public function start(): self
    {

        return $this;
    }

    /**
     * Завершение работы
     * @return void
     */
    public function finish(): void
    {

    }
}
