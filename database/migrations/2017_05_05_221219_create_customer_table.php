<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create(
            'customer',
            function ($table) {
                $table->increments('id');
                $table->string('uuid', 36);
                $table->string('name', 64);
                $table->string('oib', 11)->nullable();
                $table->string('address', 256)->nullable();
                $table->string('city', 256)->nullable();
                $table->string('post_code', 16)->nullable();
                $table->string('state', 256)->nullable();
                $table->string('country', 256)->nullable();
                $table->string('phone_number_1', 18)->nullable();
                $table->string('phone_number_2', 18)->nullable();
                $table->string('fax', 18)->nullable();
                $table->string('email_1', 128)->nullable();
                $table->string('email_2', 128)->nullable();
                $table->string('web_address', 128)->nullable();
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
        \Schema::dropIfExists('customer');
    }
}
