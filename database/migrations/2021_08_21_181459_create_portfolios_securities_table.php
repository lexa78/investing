<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios_securities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('portfolio_id')->unsigned()->comment('id портфеля');
            $table->bigInteger('security_id')->unsigned()->comment('id ценной бумаги');
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('portfolios_securities');
    }
}
