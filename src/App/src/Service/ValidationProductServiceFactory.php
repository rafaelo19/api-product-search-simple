<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Container\ContainerInterface;

class ValidationProductServiceFactory
{
    public function __invoke(ContainerInterface $container): ValidationProductService
    {
        $getProductService = $container->get(GetProductService::class);
        return new ValidationProductService($getProductService);
    }

}