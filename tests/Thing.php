<?php

namespace SomeoneFamous\FindBy\Tests;

use Illuminate\Database\Eloquent\Model;
use SomeoneFamous\FindBy\Traits\FindBy;

class Thing extends Model
{
    use FindBy;

    protected $fillable = [
        'some_field',
        'other_field',
        'field_3_is_a_field_with_a_number_in_it'
    ];
}
