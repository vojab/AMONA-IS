<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameAndDescriptionToImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table(
            'import',
            function ($table) {
                $table->string('name', 35)->after('uuid');
                $table->string('description')->after('name');
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
        Schema::table('import', function ($table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
        });
    }
}
