<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create(
            'invoice',
            function ($table) {
                $table->increments('id');
                $table->string('uuid', 36);
                $table->string('name', 32);
                $table->string('description', 256)->nullable();
                $table->integer('customer_id');
                $table->integer('tax_id');
                $table->float('discount', 8, 2);
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
        \Schema::dropIfExists('invoice');
    }
}
