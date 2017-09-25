<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDefaultValueForOrderColumnImportItemInvoiceItemTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE invoice_item ALTER `order` SET DEFAULT 0;");
        DB::statement("ALTER TABLE import_item ALTER `order` SET DEFAULT 0;");
    }
}
