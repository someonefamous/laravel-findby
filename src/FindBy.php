<?php

namespace SomeoneFamous\FindBy;

use Illuminate\Support\Str;

trait FindBy
{
    public static function __callStatic($method, $arguments)
    {
        if (substr($method, 0, 6) == 'findBy') {

            return static::where(Str::snake(substr($method, 6)), $arguments[0])->first();
        }

        if (substr($method, 0, 9) == 'findAllBy') {

            return static::where(Str::snake(substr($method, 9)), $arguments[0])->get();
        }

        return parent::__callStatic($method, $arguments);
    }
}
