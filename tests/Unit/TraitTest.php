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
                'field_3' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'XXX',
                'field_3' => 'YYY',
            ],
            [
                'some_field' => '123',
                'other_field' => '666',
                'field_3' => '999',
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
                'field_3' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'XXX',
                'field_3' => 'YYY',
            ],
            [
                'some_field' => '123',
                'other_field' => '666',
                'field_3' => '999',
            ]
        ]);

        $things_1 = Thing::where('some_field', 'abc')->get()->toArray();

        $things_2 = Thing::findAllBySomeField('abc')->toArray();

        $this->assertCount(2, $things_1);
        $this->assertEquals($things_1, $things_2);
    }

    /** @test */
    function laravel_find_method_available()
    {
        Thing::insert([
            [
                'some_field' => 'abc',
                'other_field' => 'def',
                'field_3' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'other string',
                'field_3' => 'YYY',
            ]
        ]);

        $thing = Thing::find(2);

        $this->assertNotNull($thing);
    }

    /** @test */
    function trait_works_with_forced_underscore_for_numbers()
    {
        Thing::insert([
            [
                'some_field' => 'abc',
                'other_field' => 'def',
                'field_3' => 'ghi',
            ],
            [
                'some_field' => 'abc',
                'other_field' => 'XXX',
                'field_3' => 'YYY',
            ],
            [
                'some_field' => '123',
                'other_field' => '666',
                'field_3' => '999',
            ]
        ]);

        $thing_1 = Thing::where('field_3', '999')->first();

        $thing_2 = Thing::findByField3('999');
        // Illuminate's snake function converts Field3 to field3
        $this->assertNull($thing_2);

        //Force an underscore:
        $thing_3 = Thing::findByField_3('999');

        $this->assertTrue($thing_3->is($thing_1));
    }
}
