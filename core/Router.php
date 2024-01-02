<?php

namespace app\core;

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

    public function get(string $path, mixed $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, mixed $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(): mixed
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if (\is_string($callback)) {
            return $this->renderView($callback);
        }

        if (\is_array($callback)) {
            $callback[0] = Application::$app->controller = new $callback[0]();
        }

        return \call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = []): string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return \str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent): string
    {
        $layoutContent = $this->layoutContent();
        return \str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent(): string
    {
        $layout = Application::$app->controller->layout;
        \ob_start();
        include_once Application::$rootDir . "/views/layouts/{$layout}.php";
        return \ob_get_clean();
    }

    public function renderOnlyView(string $view, array $params): string
    {
        \extract($params);
        \ob_start();
        include_once Application::$rootDir . "/views/{$view}.php";
        return \ob_get_clean();
    }
}