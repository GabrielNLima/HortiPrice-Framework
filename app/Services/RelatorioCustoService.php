<?php 

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RelatorioCustoService
{
    public function consultar(array $dados)
    {
        $tipo = $dados['tipo'];

        return DB::table('componente')
            ->join('tipo', 'componente.componente_fk_tipo', '=', 'tipo.tipo_id')
            ->join('produtividade', 'produtividade.produtividade_fk_tipo', '=', 'tipo.tipo_id')
            ->join('unidade', 'componente.componente_fk_unidade', '=', 'unidade.unidade_id')
            ->select(
                'componente_descricao',
                'componente_quantidade',
                DB::raw('ROUND(componente_valor_unitario, 2) as componente_valor_unitario'),
                DB::raw('ROUND(componente_quantidade * componente_valor_unitario, 2) as total'),
                'unidade_descricao'
            )
            ->where('componente_fk_tipo', $tipo)
            ->get();
    }

    public function listarTipos()
    {
        return DB::table('tipo')->get();
    }

    public function paginar(array $dados, int $porPagina = 5)
    {
        $tipo = $dados['tipo'];

        return DB::table('componente')
            ->join('tipo', 'componente.componente_fk_tipo', '=', 'tipo.tipo_id')
            ->join('produtividade', 'produtividade.produtividade_fk_tipo', '=', 'tipo.tipo_id')
            ->join('unidade', 'componente.componente_fk_unidade', '=', 'unidade.unidade_id')
            ->select(
                'componente_descricao',
                'componente_quantidade',
                DB::raw('ROUND(componente_valor_unitario, 2) as componente_valor_unitario'),
                DB::raw('ROUND(componente_quantidade * componente_valor_unitario, 2) as total'),
                'unidade_descricao'
            )
            ->where('componente_fk_tipo', $tipo)
            ->paginate($porPagina);
    }
}
