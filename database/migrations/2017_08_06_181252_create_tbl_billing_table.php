<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_billing', function (Blueprint $table) {
            $table->increments('billing_id');
            $table->string('company_name',100);
            $table->string('customer_name',50);
            $table->string('customer_email',50);
            $table->string('mobile_number',20);
            $table->text('customer_address');
            $table->string('city',50);
            $table->string('country',50);
            $table->string('zip_code',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_billing');
    }
}
