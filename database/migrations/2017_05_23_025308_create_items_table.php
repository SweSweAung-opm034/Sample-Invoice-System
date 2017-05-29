<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->string('item_name');
            $table->integer('no_items');
            $table->integer('price');
            $table->integer('total');
            $table->integer('sub_total');
            $table->integer('tax');
            $table->integer('all_total');
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
        Schema::dropIfExists('items');
    }
}
