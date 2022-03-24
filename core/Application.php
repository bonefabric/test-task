<?php
declare(strict_types=1);

namespace Core;

class Application
{

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
