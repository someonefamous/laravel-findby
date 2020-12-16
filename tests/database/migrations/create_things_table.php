<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThingsTable extends Migration
{
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->id();
            $table->string('some_field');
            $table->string('other_field');
            $table->string('field_3_is_a_field_with_a_number_in_it');
            $table->timestamps();
        });
    }
}
