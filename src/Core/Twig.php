<?php

namespace MVC\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{
    /**
     * @param string $path
     * @param array $params
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    static function render(string $path, array $params = [])
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates/');
        $twig = new Environment($loader);

        echo $twig->render($path, $params);
    }
}