<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSActionsSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_actions_securities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('security_id')->unsigned()->comment('id ценной бумаги');
            $table->bigInteger('action_id')->unsigned()->comment('id действия с ценной бумагой');
            $table->foreign('security_id')->references('id')->on('securities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('s_actions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_actions_securities');
    }
}
