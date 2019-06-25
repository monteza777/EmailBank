<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCemailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('cemails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_email')->nullable();
            $table->timestamps();
            $table->SoftDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cemails');
        // Schema::table('clients', function (Blueprint, $table){
        //     $table->dropColumn('deleted_at');
        // });
    }
}
