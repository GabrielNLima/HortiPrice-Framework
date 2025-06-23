<?php

namespace App;

enum ClassificacaoEnum: int
{
    case CUSTO_INDIRETO = 1;
    case CUSTO_FIXO = 2;
    case CUSTO_VARIAVEL = 3;
    case CUSTO_DIRETO = 4;

    public function label(): string
    {
        return match ($this) {
            self::CUSTO_INDIRETO => 'Custo Indireto',
            self::CUSTO_FIXO => 'Custo Fixo',
            self::CUSTO_VARIAVEL => 'Custo Variável',
            self::CUSTO_DIRETO => 'Custo Direto',
        };
    }

    public static function options(): array
    {
        return array_map(
            fn($case) => ['value' => $case->value, 'label' => $case->label()],
            self::cases()
        );
    }
}
