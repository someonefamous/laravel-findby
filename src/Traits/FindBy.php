<?php

namespace SomeoneFamous\FindBy\Traits;

use Illuminate\Support\Str;

trait FindBy
{
    public static function __callStatic($method, $arguments)
    {
        if (Str::startsWith($method, 'findBy')) {

            echo Str::snake(Str::after($method, 'findBy')) . "\n";


            return static::where(Str::snake(Str::after($method, 'findBy')), $arguments[0])->first();
        }

        if (Str::startsWith($method, 'findAllBy')) {

            return static::where(Str::snake(Str::after($method, 'findAllBy')), $arguments[0])->get();
        }

        return parent::__callStatic($method, $arguments);
    }
}
