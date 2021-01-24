<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('characteristic_id');
            $table->string('lang')->nullable()->default(null);
            $table->string('value')->nullable()->default(null);
            $table->timestamps();

//            $table->unique(['characteristic_id'], 'characteristic_values_characteristic_id_unique');

            $table->foreign('characteristic_id', 'characteristic_values_characteristic_id_foreign')
                ->references('id')
                ->on('characteristics')
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
        Schema::dropIfExists('characteristic_values');
    }
}
