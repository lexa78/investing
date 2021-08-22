<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_actions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('action_id')->unsigned()->comment('id действия с портфелем (пополнение / вывод)');
            $table->bigInteger('currency_id')->unsigned()->comment('id валюты');
            $table->dateTime('action_date', $precision = 0)->comment('дата и время совершения действия');
            $table->decimal('sum', $precision = 9, $scale = 2)->unsigned()->comment('сумма пополнения / вывода');
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
        Schema::dropIfExists('p_actions');
    }
}
