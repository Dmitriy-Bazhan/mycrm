<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->boolean('is_filter')->default(true);
            $table->timestamps();

//            $table->unique(['category_id'], 'characteristics_category_id_unique');

            $table->foreign('category_id', 'characteristics_category_id_foreign')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('characteristics');
    }
}
