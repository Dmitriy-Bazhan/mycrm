<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('characteristic_id');
            $table->string('lang', 5);
            $table->string('name')->nullable()->default(null);
            $table->timestamps();

//            $table->unique(['characteristic_id'], 'characteristic_data_characteristic_id_unique');

            $table->foreign('characteristic_id', 'characteristic_data_characteristic_id_foreign')
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
        Schema::dropIfExists('characteristic_data');
    }
}
