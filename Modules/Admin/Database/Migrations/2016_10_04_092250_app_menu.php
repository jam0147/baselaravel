<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(!Schema::hasTable('app_menu')){ 
            Schema::create('app_menu', function(Blueprint $table){
                $table->increments('id');
                
                $table->string('nombre', 50);
                $table->integer('padre')->unsigned(); //->nullable();
                $table->integer('posicion')->unsigned(); //->nullable();
                $table->string('direccion', 50)->unique();
                $table->string('icono', 50);
                
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
        Schema::dropIfExists('app_menu');
    }
}
