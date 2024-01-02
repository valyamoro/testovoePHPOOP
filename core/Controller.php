<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';

    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public static function render(string $view, array $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

}
