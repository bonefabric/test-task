<?php
declare(strict_types=1);

namespace Core\Components;

class Router
{

    /**
     * Конфигурация маршрутов
     */
    private const CONFIG_FILE = ROOT_PATH . 'config' . DIRECTORY_SEPARATOR . 'routes.php';

    /**
     * Список GET - маршрутов
     * @var array
     */
    private array $getRoutes = [];

    /**
     * Список POST - маршрутов
     * @var array
     */
    private array $postRoutes = [];

    /**
     * Список API GET - маршрутов
     * @var array
     */
    private array $apiGetRoutes = [];

    /**
     * Список API POST - маршрутов
     * @var array
     */
    private array $apiPostRoutes = [];

    public function __construct()
    {
        $this->parseConfig();
    }

    /**
     * Поиск маршрута
     * @param string $path
     * @param string $httpMethod
     * @return array
     * @throws \Exception
     */
    public function match(string $path, string $httpMethod = 'GET'): array
    {
        $group = $this->matchGroup($path, $httpMethod);
        foreach ($group as $dec => $route) {
            if (preg_match('~' . $dec . '~', $path)) return $group[$dec];
        }
        throw new \Exception('Route not found.');
    }

    /**
     * Поиск группы маршрута
     * @param string $path
     * @param string $httpMethod
     * @return array
     * @throws \Exception
     */
    private function matchGroup(string $path, string $httpMethod): array
    {
        $isApi = str_starts_with($path, 'api');
        if ($httpMethod === 'GET') {
            return $isApi ? $this->apiGetRoutes : $this->getRoutes;
        }
        if ($httpMethod === 'POST') {
            return $isApi ? $this->apiPostRoutes : $this->postRoutes;
        }
        throw new \Exception('Route not found.');
    }

    /**
     * @return void
     */
    private function parseConfig(): void
    {
        $routesConfig = include static::CONFIG_FILE;
        foreach ($routesConfig['web'] as $path => $webRoute) {
            if ($webRoute['http_method'] === 'GET') {
                $this->getRoutes[$path] = $webRoute;
            } elseif ($webRoute['http_method'] === 'POST') {
                $this->postRoutes[$path] = $webRoute;
            }
        }
        foreach ($routesConfig['api'] as $path => $apiRoute) {
            if ($apiRoute['http_method'] === 'GET') {
                $this->apiGetRoutes['api/' . $path] = $apiRoute;
            } elseif ($apiRoute['http_method'] === 'POST') {
                $this->apiPostRoutes['api/' . $path] = $apiRoute;
            }
        }
    }
}
