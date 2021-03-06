<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Exception;

class GetProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $productId
     * @return Product|null
     * @throws Exception
     */
    public function getById(int $productId): ?Product
    {
        return $this->productRepository->getById($productId);
    }

    /**
     * @param int $productId
     * @return array
     * @throws Exception
     */
    public function getByIdSql(int $productId): array
    {
        return $this->productRepository->getByIdSql($productId);
    }

}