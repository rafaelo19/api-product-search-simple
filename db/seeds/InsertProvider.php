<?php


use Phinx\Seed\AbstractSeed;

class InsertProvider extends AbstractSeed
{
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
        $dataFornecedor = [
            [
                "nome"    => "Fornecedor 1",
                "status" => true,
            ],
            [
                "nome"    => "Fornecedor 2",
                "status" => true,
            ],
            [
                "nome"    => "Fornecedor 3",
                "status" => true,
            ],
        ];

        $fornecedor = $this->table("loja.fornecedor");
        $fornecedor->insert($dataFornecedor)->saveData();
    }
}
