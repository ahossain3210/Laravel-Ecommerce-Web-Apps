<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblNestedCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nested_category', function (Blueprint $table) {
            $table->increments('nested_category_id');
            $table->text('nested_category_name');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('manufacturer_id');
            $table->tinyInteger('publication_status');
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
        Schema::dropIfExists('tbl_nested_category');
    }
}
