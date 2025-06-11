<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        DB::statement("
            CREATE OR REPLACE VIEW relatorio_custo_unitario_view AS
            SELECT
                tipo.tipo_descricao,
                ROUND(produtividade.produtividade_valor, 2) AS produtividade,
                ROUND(SUM(componente.componente_quantidade * componente.componente_valor_unitario), 2) AS total,
                ROUND(SUM(componente.componente_quantidade * componente.componente_valor_unitario) / produtividade.produtividade_valor, 2) AS unitario,
                unidade.unidade_descricao AS unidade,
                tipo.tipo_id AS tipo_id
            FROM componente
            JOIN tipo ON componente.componente_fk_tipo = tipo.tipo_id
            JOIN produtividade ON produtividade.produtividade_fk_tipo = tipo.tipo_id
            JOIN unidade ON unidade.unidade_id = produtividade.produtividade_fk_unidade
            GROUP BY tipo.tipo_id, tipo.tipo_descricao, produtividade.produtividade_valor, unidade.unidade_descricao
        ");
    }

    public function down(): void {
        DB::statement("DROP VIEW IF EXISTS relatorio_custo_unitario_view");
    }
};
