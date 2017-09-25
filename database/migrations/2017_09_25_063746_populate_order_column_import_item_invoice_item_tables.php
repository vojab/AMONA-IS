<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateOrderColumnImportItemInvoiceItemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $invoices = \App\Models\Invoice::all();

        foreach ($invoices as $invoice) {

            $invoiceItems = \App\Models\InvoiceItem::where('invoice_id', $invoice->id)->get();
            foreach ($invoiceItems as $key => $invoiceItem) {

                $invoiceItem->order = ++$key;
                $invoiceItem->update();
            }
        }

        $imports = \App\Models\Import::all();

        foreach ($imports as $import) {

            $importItems = \App\Models\ImportItem::where('import_id', $import->id)->get();
            foreach ($importItems as $key => $importItem) {

                $importItem->order = ++$key;
                $importItem->update();
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('invoice_item')
            ->update(['order' => 0]);

        DB::table('import_item')
            ->update(['order' => 0]);
    }
}
