<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotConsistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_consists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('security_id')->unsigned()->comment('id ценной бумаги');
            $table->mediumInteger('security_amount')->unsigned()->comment('количество ценных бумаг в лоте');
            $table->timestamps();
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
        Schema::dropIfExists('lot_consists');
    }
}
