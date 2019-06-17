<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCemailCompidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cemail_compid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cemail_id')->unsigned();
            $table->foreign('cemail_id')->references('id')->on('cemails');
            $table->integer('compid_id')->unsigned();
            $table->foreign('compid_id')->references('id')->on('compids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cemail_compid');
    }
}
