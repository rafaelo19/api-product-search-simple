<?php

declare(strict_types=1);

namespace App\Service;

use Exception;

class ValidationProductService
{
    /**
     * @var GetProductService
     */
    private $getProductService;

    public function __construct(GetProductService $getProductService)
    {
        $this->getProductService = $getProductService;
    }

    /**
     * @param int $productId
     * @throws Exception
     */
    public function validationProductExist(int $productId): void
    {
        if (!$this->getProductService->getById($productId)) {
           throw new Exception("Procuto não encontrado!", 404);
        }
    }

}