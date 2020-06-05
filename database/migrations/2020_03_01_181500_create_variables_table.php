<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('variables', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('values')->nullable();
            $table->string('type');
            //FK:
            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('variables');
    }
}
