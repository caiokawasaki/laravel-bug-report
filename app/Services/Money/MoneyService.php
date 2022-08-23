<?php

namespace App\Services\Money;

use NumberFormatter;

class MoneyService
{
    public function format(
        $value
    ): bool|string
    {
        return (new NumberFormatter('pt_BR', NumberFormatter::CURRENCY))
            ->format($value);
    }
}
