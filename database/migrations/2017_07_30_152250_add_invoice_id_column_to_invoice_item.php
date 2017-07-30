<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoiceIdColumnToInvoiceItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table(
            'invoice_item',
            function ($table) {
                $table->integer('invoice_id')->after('uuid');
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
        Schema::table('invoice_item', function ($table) {
            $table->dropColumn('invoice_id');
        });
    }
}
