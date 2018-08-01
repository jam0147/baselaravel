<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoryPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        if(!Schema::hasTable('history_price')){ 
        
            Schema::create('history_price', function (Blueprint $table) {
                $table->increments('id');           
                $table->decimal('btc_bsf', 10,8);

                $table->decimal('btc_usd', 10,8);
                $table->decimal('onx_btc', 10,8);


                /*agregar estos campos a la bd*/            
                    $table->decimal('ltc_usd', 20,8);
                    $table->decimal('eth_usd', 20,8);
                    $table->decimal('onx_ltc', 20,8);
                    $table->decimal('onx_eth', 20,8);
                /*campos */

                $table->decimal('onx_bsf', 20,8);
                $table->decimal('onx_bsf_compra', 20,8);
                $table->decimal('onx_usd', 20,8);
                $table->decimal('volumen', 20,8);
                
                $table->timestamp('fecha');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down(){
        Schema::dropIfExists('history_price');
    }
}
