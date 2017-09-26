<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFrenchNameAndPriceColumnsToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table(
            'product',
            function ($table) {
                $table->string('french_name')->after('name');
                $table->float('price', 8, 2)->after('unit');
            }
        );

        $products = \App\Models\Product::all();
        foreach ($products as $product) {
            $product->french_name = $product->name;
            $product->update();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function ($table) {
            $table->dropColumn('french_name');
            $table->dropColumn('price');
        });
    }
}
