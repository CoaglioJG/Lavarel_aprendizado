<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//cria tabela
    {
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('name_fantasia',100);
            $table->string('cnpj', 25)->nullable(); //pode ser vazio
            $table->string('street', 100)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement', 30)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 10)->nullable();
            $table->string('cellphone', 20)->nullable();
            $table->string('site', 20)->nullable();
            $table->string('email', 30)->nullable();
            $table->timestamps();//create_at/update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//exclui a tabela
    {
        Schema::dropIfExists('store');
    }
}
