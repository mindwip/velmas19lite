<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserContractsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('user_contracts', function (Blueprint $table){
            $table->bigIncrements('id');
            //FK:
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //FK:
            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->date('payment_date')->nullable();
            $table->float('price', 5, 2)->default(0);
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('user_contracts');
    }
}
