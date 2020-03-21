<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaleToUserContracts extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('user_contracts', function (Blueprint $table) {
            $table->string('sale')->nullable()->after('variables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('user_contracts', function (Blueprint $table) {
            $table->dropColumn(['sale']);    
        });
    }
}
