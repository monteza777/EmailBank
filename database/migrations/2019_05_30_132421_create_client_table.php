<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('client_email')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
        // Schema::table('clients', function (Blueprint, $table){
        //     $table->dropColumn('deleted_at');
        // });
    }
}
