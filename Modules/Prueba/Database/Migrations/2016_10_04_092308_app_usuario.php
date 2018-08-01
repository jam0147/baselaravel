<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if(!Schema::hasTable('app_pais')){ 
            Schema::create('app_pais', function(Blueprint $table){
                $table->increments('id');
                $table->string('nombre', 50);
                $table->string('lenguaje', 5)->default('en');

                $table->timestamps();
                $table->softDeletes();
            });
        }
        if(!Schema::hasTable('app_usuario')){

            Schema::create('app_usuario', function(Blueprint $table){
                $table->increments('id');
                
                $table->string('usuario', 50)->unique();
                $table->string('password', 60);

                $table->integer('dni')->unsigned()->unique()->nullable();
                $table->string('nombre', 50);
                $table->string('apellido', 100)->nullable();
                
                $table->string('correo', 50)->nullable()->unique();
                $table->string('telefono', 15)->nullable();
                $table->string('foto')->default('user.png');
                $table->boolean('confirmacion')->default(0);
                $table->string('codigo_confirmacion')->nullable();
                $table->integer('perfil_id')->unsigned()->nullable();

                $table->char('autenticacion', 1)->default('l');

                $table->char('super', 1)->default('n');

                $table->string('sexo', 1)->nullable();
                $table->string('edo_civil',2)->nullable();  
                $table->string('direccion', 200)->nullable();    
                $table->string('facebook', 200)->nullable(); 
                $table->string('instagram', 200)->nullable();    
                $table->string('twitter', 200)->nullable();
                $table->string('wallet', 34)->nullable();
                $table->integer('app_pais_id')->unsigned()->nullable();
                $table->boolean('terminos')->nullable();
                $table->boolean('dec_jurada')->nullable();
                
                $table->rememberToken();
                
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('perfil_id')
                    ->references('id')->on('app_perfil')
                    ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('app_pais_id')
                    ->references('id')->on('app_pais')
                    ->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('app_usuario');
        Schema::dropIfExists('app_pais');
    }
}
