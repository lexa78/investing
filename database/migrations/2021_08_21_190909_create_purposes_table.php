<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurposesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purposes', function (Blueprint $table) {
            $table->id();
            $table->mediumInteger('amount')->unsigned()->comment('Количество ценных бумаг для покупки');
            $table->bigInteger('owner_id')->unsigned()->comment('id того, кто дал эту цель');
//            $table->bigInteger('security_id')->unsigned()->comment('id ценной бумаги');
//            $table->bigInteger('currency_id')->unsigned()->comment('id валюты');
//            $table->dateTime('create_date', $precision = 0)->comment('дата и время назначения цели');
            $table->decimal('await_price', $precision = 9, $scale = 2)->unsigned()->comment('ожидаемая цена одной единицы ценной бумаги');
            $table->dateTime('achievement_date', $precision = 0)->comment('дата и время достяжения цели');
            $table->decimal('fact_price', $precision = 11, $scale = 4)->unsigned()->comment('полученная цена одной единицы ценной бумаги');
            $table->decimal('current_price', $precision = 11, $scale = 4)->unsigned()->comment('цена одной единицы ценной бумаги на момент покупки бумаги для цели');
            $table->bigInteger('s_action_id')->unsigned()->comment('id сводной таблицы s_actions_securities');
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('owners')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('security_id')->references('id')->on('securities')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('s_action_id')->references('id')->on('s_actions_securities')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purposes');
    }
}
