<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCustomerColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement('ALTER TABLE `customer` MODIFY `oib` VARCHAR(13) NOT NULL;');
        \DB::statement('ALTER TABLE `customer` MODIFY `phone_number_1` VARCHAR(256) DEFAULT NULL;');
        \DB::statement('ALTER TABLE `customer` MODIFY `phone_number_2` VARCHAR(256) DEFAULT NULL;');
        \DB::statement('ALTER TABLE `customer` MODIFY `fax` VARCHAR(256) DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement('ALTER TABLE `customer` MODIFY `oib` VARCHAR(11) NOT NULL;');
        \DB::statement('ALTER TABLE `customer` MODIFY `phone_number_1` VARCHAR(18) DEFAULT NULL;');
        \DB::statement('ALTER TABLE `customer` MODIFY `phone_number_2` VARCHAR(18) DEFAULT NULL;');
        \DB::statement('ALTER TABLE `customer` MODIFY `fax` VARCHAR(18) DEFAULT NULL;');
    }
}
