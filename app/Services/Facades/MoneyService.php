<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool format($value)
 */
class MoneyService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\Money\MoneyService::class;
    }
}
