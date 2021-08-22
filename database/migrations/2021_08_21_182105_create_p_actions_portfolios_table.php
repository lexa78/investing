<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePActionsPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_actions_portfolios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('portfolio_id')->unsigned()->comment('id портфеля');
            $table->bigInteger('action_id')->unsigned()->comment('id действия с портфелем');
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('p_actions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_actions_portfolios');
    }
}
