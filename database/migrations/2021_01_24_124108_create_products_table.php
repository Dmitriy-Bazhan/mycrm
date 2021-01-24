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
            $table->unsignedInteger('category_id')->unsigned();
            $table->string('alias');
            $table->string('filter_string')->nullable()->default(null);  //строчка с фильтрами, фильтры писать через _

            $table->float('price_usd')->default(0.00);
            $table->float('price_hrn')->default(0.00);
            $table->float('wholesale_price_usd')->default(0.00);   //Оптовая цена
            $table->float('wholesale_price_hrn')->default(0.00);
            $table->integer('wholesale_dimension')->default(10);   //Опт от ...
            $table->integer('remainder')->default(10);             //Остаток
            $table->boolean('enabled')->default(true);
            $table->integer('popular')->default(0);
            $table->string('images')->nullable();

            $table->string('color')->nullable()->default(null);
            $table->boolean('color_enabled')->default(true);
            $table->string('weight')->nullable()->default(null);
            $table->boolean('weight_enabled')->default(true);

            $table->string('name_dimensions')->nullable()->default(null);
            $table->string('dimensions')->nullable()->default(null);
            $table->boolean('dimensions_enabled')->default(true);

            $table->string('sku')->nullable()->default('111');  //артикул
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
