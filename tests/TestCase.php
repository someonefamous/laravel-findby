<?php

namespace SomeoneFamous\FindBy\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/database/migrations/create_things_table.php';

        (new \CreateThingsTable)->up();
    }
}