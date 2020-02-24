<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractBlocksTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('contract_blocks', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            //FK:
            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->integer('position');
            $table->string('father')->nullable();
            $table->text('block')->nullable();
            $table->integer('state')->default(1);
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
        Schema::dropIfExists('contract_blocks');
    }
}
