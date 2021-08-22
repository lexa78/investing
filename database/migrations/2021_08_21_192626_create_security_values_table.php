<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('currency_id')->unsigned()->comment('id валюты');
            $table->bigInteger('security_id')->unsigned()->comment('id ценной бумаги');
            $table->date('val_date')->comment('дата цены ценной бумаги (конец дня)');
            $table->decimal('value', $precision = 8, $scale = 4)->unsigned()->comment('цена ценной бумаги');
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('security_values');
    }
}
