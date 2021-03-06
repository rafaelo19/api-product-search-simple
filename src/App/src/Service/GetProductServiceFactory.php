<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class GetProductServiceFactory
{
    public function __invoke(ContainerInterface $container): GetProductService
    {
        $entityManager = $container->get(EntityManager::class);
        $productRepository = $entityManager->getRepository(Product::class);
        return new GetProductService($productRepository);
    }

}