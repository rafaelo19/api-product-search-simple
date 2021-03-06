<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

/**
 * @ORM\Table(schema="loja", name="produto")
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     * @Type("int")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="dw.conta_id_seq", allocationSize=1, initialValue=1)
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    protected $id;

    /**
     * @var int
     * @Type("int")
     * @ORM\Column(name="fornecedor_id", type="integer", nullable=false)
     */
    protected $fornecedorId;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="nome", type="text", nullable=false)
     */
    protected $nome;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="marca", type="text", nullable=false)
     */
    protected $marca;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="cor", type="text", nullable=false)
     */
    protected $cor;

    /**
     * @var string
     * @Type("string")
     * @ORM\Column(name="unidade_medida", type="text", nullable=false)
     */
    protected $unidadeMedida;

    /**
     * @var int
     * @Type("int")
     * @ORM\Column(name="estoque", type="integer", nullable=false)
     */
    protected $estoque;

    /**
     * @var float
     * @Type("float")
     * @ORM\Column(name="preco", type="float", nullable=false)
     */
    protected $preco;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getFornecedorId(): int
    {
        return $this->fornecedorId;
    }

    /**
     * @param int $fornecedorId
     */
    public function setFornecedorId(int $fornecedorId): void
    {
        $this->fornecedorId = $fornecedorId;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return string
     */
    public function getCor(): string
    {
        return $this->cor;
    }

    /**
     * @param string $cor
     */
    public function setCor(string $cor): void
    {
        $this->cor = $cor;
    }

    /**
     * @return string
     */
    public function getUnidadeMedida(): string
    {
        return $this->unidadeMedida;
    }

    /**
     * @param string $unidadeMedida
     */
    public function setUnidadeMedida(string $unidadeMedida): void
    {
        $this->unidadeMedida = $unidadeMedida;
    }

    /**
     * @return int
     */
    public function getEstoque(): int
    {
        return $this->estoque;
    }

    /**
     * @param int $estoque
     */
    public function setEstoque(int $estoque): void
    {
        $this->estoque = $estoque;
    }

    /**
     * @return float
     */
    public function getPreco(): float
    {
        return $this->preco;
    }

    /**
     * @param float $preco
     */
    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

}