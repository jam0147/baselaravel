<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoryCrypto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if(!Schema::hasTable('history_crypto')){ 
        
            Schema::create('history_crypto', function (Blueprint $table) {
                $table->increments('id');        
                $table->decimal('onx_btc', 10,8);
                $table->decimal('btc_usd');
                $table->decimal('onx_eth', 10,8);
                $table->decimal('eth_usd');
                /*agregar estos campos a la bd*/ 
                /*campos */
                $table->decimal('volumen_btc',10);
                $table->decimal('volumen_eth',10);
                $table->timestamp('fecha');
                $table->timestamps();
                $table->softDeletes();
            
            });        
        }
    }
        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_crypto');
    }
}
