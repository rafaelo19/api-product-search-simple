<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Product;
use App\Sql\SelectProduct;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityRepository;
use Exception;

class ProductRepository extends EntityRepository
{
    /**
     * @var ResultSetMapping
     */
    private $resultSetMapping;

    private function setInstance()
    {
        $this->resultSetMapping = new ResultSetMapping();
    }

    /**
     * @param int $productId
     * @return Product|null|object
     * @throws Exception
     */
    public function getById(int $productId): ?Product
    {
        try {
            return $this->findOneBy(["id" => $productId]);
        } catch (Exception $e) {
            throw new Exception("Erro ao tenta buscar produto", 500);
        }
    }

    /**
     * @param int $productId
     * @return array
     * @throws Exception
     */
    public function getByIdSql(int $productId): array
    {
        try {
            $this->setInstance();
            $this->resultSetMapping->addScalarResult("id","id","integer");
            $this->resultSetMapping->addScalarResult("nome","nome","string");
            $this->resultSetMapping->addScalarResult("fornecedor","fornecedor","string");
            $this->resultSetMapping->addScalarResult("marca","marca","string");
            $this->resultSetMapping->addScalarResult("cor","cor","string");
            $this->resultSetMapping->addScalarResult("unidade_medida","unidade_medida","string");
            $this->resultSetMapping->addScalarResult("estoque","estoque","integer");
            $this->resultSetMapping->addScalarResult("preco","preco","float");
            $query = $this->getEntityManager()->createNativeQuery(SelectProduct::SELECT_PRODUCT,
                $this->resultSetMapping);
            $query->setParameter("produto_id", $productId);
            return $query->getResult();
        } catch (Exception $e) {
            throw new Exception("Erro ao tenta buscar produto", 500);
        }
    }
}
