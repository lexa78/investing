<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('currency_id')->unsigned()->comment('id валюты');
            $table->bigInteger('type_id')->unsigned()->comment('id прибыли (дивиденты / купоны)');
            $table->bigInteger('security_id')->unsigned()->comment('id ценной бумаги');
            $table->decimal('awaiting_sum', $precision = 8, $scale = 2)->nullable()->unsigned()->comment('ожидаемая сумма');
            $table->date('awaiting_date')->nullable()->comment('ожидаемая дата получения выплаты');
            $table->decimal('fact_sum', $precision = 8, $scale = 2)->unsigned()->comment('полученная сумма');
            $table->date('fact_date')->comment('реальная дата получения выплаты');
            $table->timestamps();
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('security_id')->references('id')->on('securities')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomings');
    }
}
