<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_actions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_id')->unsigned()->comment('id действия с ценной бумагой (покупка / продажа)');
            $table->integer('security_amount')->unsigned()->comment('количество ценных бумаг');
            $table->decimal('price', $precision = 11, $scale = 4)->unsigned()->comment('цена одной единицы ценной бумаги');
            $table->dateTime('action_date', $precision = 0)->comment('дата и время совершения действия');
            $table->decimal('commission', $precision = 8, $scale = 4)->unsigned()->comment('коммиссия, которая платится брокеру');
            $table->decimal('nkd', $precision = 11, $scale = 4)->unsigned()->nullable()->comment('НКД заполняется при покупке / продаже облигаций');
            $table->bigInteger('currency_id')->unsigned()->comment('id валюты');
            $table->timestamps();
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('actions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_actions');
    }
}
