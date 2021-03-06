<?php

declare(strict_types=1);

namespace App\Sql;

class SelectProduct
{
    const SELECT_PRODUCT = "
        select
            p.id,
            p.nome,
            f.nome as fornecedor,
            p.marca,
            p.cor,
            p.unidade_medida,
            p.estoque,
            p.preco
        from loja.produto p
        inner join loja.fornecedor f on f.id = p.fornecedor_id
        where p.id = :produto_id
    ";
}