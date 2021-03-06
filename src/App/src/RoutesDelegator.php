<?php

declare(strict_types=1);

namespace App;

use App\Handler\GetProductHandler;
use App\Middleware\ValidationProductMiddleware;
use Mezzio\Application;
use Psr\Container\ContainerInterface;

class RoutesDelegator
{
    public function __invoke(ContainerInterface $container, string $serviceName, callable $callback): Application
    {
        /**
         * @var Application $app
         */
        $app = $callback();

        $app->get("/produtos/{id:\d+}", [
            ValidationProductMiddleware::class,
            GetProductHandler::class
        ], "get.products");

        return $app;
    }
}
