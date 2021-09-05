<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('observation');
            $table->enum('size', ['S','M','L']);
            $table->integer('stock');
            $table->integer('price')->unsigned();
            $table->date('shipping_date');
            $table->integer('trademark_id')->unsigned();
            $table->foreign('trademark_id')->references('id')->on('trademarks')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
