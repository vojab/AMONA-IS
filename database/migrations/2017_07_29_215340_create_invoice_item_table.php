<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create(
            'invoice_item',
            function ($table) {
                $table->increments('id');
                $table->string('uuid', 36);
                $table->integer('product_id');
                $table->integer('quantity')->nullable();
                $table->float('price', 8, 2);
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
        \Schema::dropIfExists('invoice_item');
    }
}
