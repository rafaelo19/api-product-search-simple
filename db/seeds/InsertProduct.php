<?php


use Phinx\Seed\AbstractSeed;

class InsertProduct extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'InsertProvider'
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $dataProduto = [
            [
                "nome"    => "Tênis Sb",
                "marca" => "Nike",
                "cor" => "preto",
                "unidade_medida" => "400g",
                "estoque" => 10,
                "preco" => 169.68,
                "fornecedor_id" => 1,
            ],
            [
                "nome"    => "Tênis Sb",
                "marca" => "Nike",
                "cor" => "Azul",
                "unidade_medida" => "400g",
                "estoque" => 10,
                "preco" => 159.68,
                "fornecedor_id" => 2,
            ],
        ];
        $produto = $this->table("loja.produto");
        $produto->insert($dataProduto)
            ->saveData();
    }
}
