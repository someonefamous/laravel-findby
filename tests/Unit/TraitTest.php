<?php

namespace SomeoneFamous\Wallets\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use SomeoneFamous\FindBy\Tests\TestCase;
use SomeoneFamous\FindBy\Tests\Thing;

class TraitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function trait_finds_one_record_with_findby()
    {
        Thing::insert([
            [
                'some_field' => 'abc',
                'other_field' => 'def',
                'field_3_is_a_field_with_a_number_in_it' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'XXXXXXXXXXX',
                'field_3_is_a_field_with_a_number_in_it' => 'YYYYYYYYYYYYYY',
            ],
            [
                'some_field' => '123',
                'other_field' => '66666666666',
                'field_3_is_a_field_with_a_number_in_it' => '9999999999999',
            ]
        ]);

        $thing_1 = Thing::where('some_field', 'abc')->first();

        $thing_2 = Thing::findBySomeField('abc');

        $this->assertTrue($thing_2->is($thing_1));
    }

    /** @test */
    function trait_finds_many_records_with_findallby()
    {
        Thing::insert([
            [
                'some_field' => 'abc',
                'other_field' => 'def',
                'field_3_is_a_field_with_a_number_in_it' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'XXXXXXXXXXX',
                'field_3_is_a_field_with_a_number_in_it' => 'YYYYYYYYYYYYYY',
            ],
            [
                'some_field' => '123',
                'other_field' => '66666666666',
                'field_3_is_a_field_with_a_number_in_it' => '9999999999999',
            ]
        ]);

        $things_1 = Thing::where('some_field', 'abc')->get()->toArray();

        $things_2 = Thing::findAllBySomeField('abc')->toArray();

        $this->assertEquals($things_1, $things_2);
    }

    /** @test */
    function laravel_find_method_available()
    {
        Thing::insert([
            [
                'some_field' => 'abc',
                'other_field' => 'def',
                'field_3_is_a_field_with_a_number_in_it' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'other string',
                'field_3_is_a_field_with_a_number_in_it' => 'YYYYYYYYYYYYYY',
            ]
        ]);

        $thing = Thing::find(2);

        $this->assertNotNull($thing);
    }
}
