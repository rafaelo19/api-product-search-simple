<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Service\ValidationProductService;
use Psr\Container\ContainerInterface;

class ValidationProductMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : ValidationProductMiddleware
    {
        $validationProductService = $container->get(ValidationProductService::class);
        return new ValidationProductMiddleware($validationProductService);
    }
}
