<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->text('product_name');
            $table->integer('category_id');
            $table->integer('manufacturer_id');
            $table->integer('sub_category_id');
            $table->text('product_code');
            $table->float('product_price',10,2);
            $table->float('product_p_price', 10, 2);
            $table->integer('product_quantity');
            $table->text('product_description');
            $table->text('product_image');
            $table->tinyInteger('feature_status');
            $table->tinyInteger('reorder_level');
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
        Schema::dropIfExists('tbl_product');
    }
}
