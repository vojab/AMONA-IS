<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create(
            'tax',
            function ($table) {
                $table->increments('id');
                $table->string('name', 32);
                $table->string('description', 256)->nullable();
                $table->float('percentage', 8, 2);
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('tax');
    }
}
