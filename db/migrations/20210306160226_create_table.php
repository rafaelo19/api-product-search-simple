<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function up(): void
    {
        $this->execute("create schema loja;");

        $fornecedor = $this->table("loja.fornecedor");
        $fornecedor->addColumn("nome", 'string')
            ->addColumn("status", 'boolean')
            ->create();

        $tipo_movimentos = $this->table("loja.produto");
        $tipo_movimentos->addColumn("fornecedor_id","integer")
            ->addColumn("nome","string")
            ->addColumn("marca","string")
            ->addColumn("cor","string")
            ->addColumn("unidade_medida","string")
            ->addColumn("estoque","integer")
            ->addColumn("preco","decimal")
            ->addForeignKey("fornecedor_id", "loja.fornecedor", ["id"], ['constraint' => 'fk_fornecedor_id'])
            ->create();

    }

    public function down(): void
    {
        $this->table("loja.produto")->drop()->save();
        $this->table("loja.fornecedor")->drop()->save();
        $this->execute("drop schema loja;");
    }
}
