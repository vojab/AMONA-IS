<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateColumnToInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table(
            'invoice',
            function ($table) {
                $table->date('date')->after('discount');
            }
        );

        $invoices = \App\Models\Invoice::all();
        foreach ($invoices as $invoice) {
            $invoice->date = $invoice->created_at;
            $invoice->update();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice', function ($table) {
            $table->dropColumn('date');
        });
    }
}
