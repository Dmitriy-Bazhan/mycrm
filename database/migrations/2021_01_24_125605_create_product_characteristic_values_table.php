<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCharacteristicValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_characteristic_values', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('characteristic_id');
            $table->timestamps();

//            $table->unique(['product_id'], 'product_characteristic_values_product_id_unique');

            $table->foreign('product_id', 'product_characteristic_values_product_id_foreign')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_characteristic_values');
    }
}
